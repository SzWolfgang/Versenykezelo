<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új forduló hozzáadása</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .tall {
            min-height: 80vh;
        }
    </style>
</head>
<body>
@include('navbar')
    <div class="container mt-5 tall">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Új forduló hozzáadása</h5>
                    </div>
                    <div class="card-body">
                        <form id="forduloForm">
                            @csrf
                            <div class="mb-3">
                                <label for="verseny_nev" class="form-label">Verseny neve:</label>
                                <select name="verseny_nev" id="verseny_nev" class="form-select" required>
                                    <option value="" selected disabled>Válassz egy versenyt</option>
                                    @foreach($versenyek->groupBy('nev') as $nev => $versenyCsoport)
                                        <option value="{{ $nev }}">{{ $nev }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="verseny_ev" class="form-label">Verseny éve:</label>
                                <select name="verseny_ev" id="verseny_ev" class="form-select" required disabled>
                                    <option value="" selected disabled>Válassz előbb egy versenyt</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nev" class="form-label">Forduló neve:</label>
                                <input type="text" name="nev" id="nev" class="form-control" placeholder="Adja meg a forduló nevét" required>
                            </div>
                            <div class="mb-3">
                                <label for="kezdes_idopont" class="form-label">Kezdés időpontja:</label>
                                <input type="datetime-local" name="kezdes_idopont" id="kezdes_idopont" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="zaras_idopont" class="form-label">Zárás időpontja:</label>
                                <input type="datetime-local" name="zaras_idopont" id="zaras_idopont" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Mentés</button>
                        </form>
                    </div>
                </div>
                <div id="responseMessage" class="mt-3"></div>
            </div>
        </div>
    </div>
    @include('footer')
    <script>
        const versenyek = @json($versenyek);
        const versenyNevSelect = document.getElementById('verseny_nev');
        const versenyEvSelect = document.getElementById('verseny_ev');

        versenyNevSelect.addEventListener('change', function () {
            const selectedNev = this.value;
            const filteredYears = versenyek.filter(verseny => verseny.nev === selectedNev);
            versenyEvSelect.innerHTML = '<option value="" selected disabled>Válassz egy évet</option>';
            filteredYears.forEach(verseny => {
                const option = document.createElement('option');
                option.value = verseny.ev;
                option.textContent = verseny.ev;
                versenyEvSelect.appendChild(option);
            });
            versenyEvSelect.disabled = false;
        });

        // AJAX töltés
        $('#forduloForm').submit(function(event) {
            event.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: "{{ route('fordulo.store') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#responseMessage').html('<div class="alert alert-success">' + response.success + '</div>');
                    $('#forduloForm')[0].reset();
                    $('#verseny_ev').html('<option value="" selected disabled>Válassz előbb egy versenyt</option>').prop('disabled', true);
                },
                error: function(xhr) {
                    let errorMessage = xhr.responseJSON?.error || 'Ismeretlen hiba történt';
                    $('#responseMessage').html('<div class="alert alert-danger">' + errorMessage + '</div>');
                }
            });
        });
    </script>
</body>
</html>
