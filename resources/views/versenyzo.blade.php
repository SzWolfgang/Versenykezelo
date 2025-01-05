<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználók és Fordulók Párosítása</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .tall {
            min-height: 80vh;
    }
    </style>
</head>
<body>
@include('navbar')
    <div class="container tall">
        <h1 class="my-4">Felhasználók és Fordulók Párosítása és Törlése</h1>

        <div id="success-message" class="alert d-none"></div>
        <div id="error-message" class="alert d-none"></div>

        <form id="pairing-form" method="POST">
            @csrf
            <div class="form-group">
                <label for="felhasznalo_id">Felhasználó</label>
                <select class="form-control" id="felhasznalo_id" name="felhasznalo_id" required>
                    @foreach ($felhasznalok as $felhasznalo)
                        <option value="{{ $felhasznalo->email }}">{{ $felhasznalo->email }} - {{ $felhasznalo->nev}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fordulo_id">Forduló</label>
                <select class="form-control" id="fordulo_id" name="fordulo_id" required>
                    @foreach ($fordulok as $fordulo)
                        <option value="{{ $fordulo->id }}">
                            {{ $fordulo->nev }} - 
                            <span style="font-size: 0.9rem; color: #555;">Verseny év: {{ $fordulo->verseny_ev }} | Verseny neve: {{ $fordulo->verseny_nev }}</span>
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Párosítás</button>
            <button type="button" id="delete-pairing" class="btn btn-danger mt-3 ml-2">Törlés</button>
        </form>
    </div>
    @include('footer')
    <script>
        $(document).ready(function() {
            $('#pairing-form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('versenyzo.store') }}", 
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#success-message').removeClass('d-none').addClass('alert-success').text(response.message);
                            $('#error-message').addClass('d-none'); 
                        }
                    },
                    error: function(xhr) {
                        var errorMessage = 'Hiba történt a párosítás során.'; 

                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message; 
                        }

                        $('#error-message').removeClass('d-none').addClass('alert-danger').text(errorMessage);
                        $('#success-message').addClass('d-none');
                    }
                });
            });

            // Törlés gomb
            $('#delete-pairing').click(function() {
                var felhasznaloId = $('#felhasznalo_id').val();
                var forduloId = $('#fordulo_id').val();

                if (!felhasznaloId || !forduloId) {
                    $('#error-message').removeClass('d-none').addClass('alert-danger').text('Kérlek válassz egy felhasználót és egy fordulót!');
                    return;
                }

                $.ajax({
                    url: "{{ route('versenyzo.delete') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        felhasznalo_id: felhasznaloId,
                        fordulo_id: forduloId
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#success-message').removeClass('d-none').addClass('alert-success').text(response.message);
                            $('#error-message').addClass('d-none');
                        } else {
                            $('#error-message').removeClass('d-none').addClass('alert-danger').text(response.message);
                        }
                    },
                    error: function(xhr) {
                        var errorMessage = 'Hiba történt a törlés során.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        $('#error-message').removeClass('d-none').addClass('alert-danger').text(errorMessage);
                        $('#success-message').addClass('d-none');
                    }
                });
            });
        });
    </script>
</body>
</html>
