<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Új verseny</title>
</head>
<body>
@include('navbar')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Verseny hozzáadása</h5>
                </div>
                <div class="card-body">
                    <form id="versenyForm" action="{{ route('versenyek.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nev" class="form-label">Verseny neve:</label>
                            <input type="text" class="form-control" name="nev" id="nev" placeholder="Adja meg a verseny nevét" required>
                        </div>
                        <div class="mb-3">
                            <label for="ev" class="form-label">Év:</label>
                            <input type="number" class="form-control" name="ev" id="ev" placeholder="Adja meg az évet" required>
                        </div>
                        <div class="mb-3">
                            <label for="elerheto_nyelvek" class="form-label">Elérhető nyelvek:</label>
                            <input type="text" class="form-control" name="elerheto_nyelvek" id="elerheto_nyelvek" placeholder="Pl.: magyar, angol" required>
                        </div>
                        <div class="mb-3">
                            <label for="pontko_jo" class="form-label">Pontok jó válaszra:</label>
                            <input type="number" class="form-control" name="pontko_jo" id="pontko_jo" placeholder="Adja meg a pontszámot">
                        </div>
                        <div class="mb-3">
                            <label for="pontok_rossz" class="form-label">Pontok rossz válaszra:</label>
                            <input type="number" class="form-control" name="pontok_rossz" id="pontok_rossz" placeholder="Adja meg a pontszámot">
                        </div>
                        <div class="mb-3">
                            <label for="pontok_ures" class="form-label">Pontok üres válaszra:</label>
                            <input type="number" class="form-control" name="pontok_ures" id="pontok_ures" placeholder="Adja meg a pontszámot">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Verseny hozzáadása</button>
                    </form>
                </div>
            </div>
            <div id="responseMessage" class="mt-3"></div>
        </div>
    </div>
</div>
@include('footer')
<script>
    $('#versenyForm').submit(function(event) {
        event.preventDefault(); 
        let formData = $(this).serialize();
        $.ajax({
            url: "{{ route('versenyek.store') }}",
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#responseMessage').html('<div class="alert alert-success">' + response.success + '</div>');
                $('#versenyForm')[0].reset();
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