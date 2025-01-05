<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználók Listája</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .tall {
            min-height: 80vh;
        }
        
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        
        }

    </style>
</head>
<body>
@include('navbar')

<div class="container">
    <div class="tall">
    <h1 class="my-4">Felhasználók Listája</h1>
    <input 
        type="text" 
        id="search" 
        class="form-control mb-4" 
        placeholder="Keresés"
    />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Felhasználó Név</th>
                <th>Email</th>
                <th>Telefonszám</th>
                <th>Lakcím</th>
            </tr>
        </thead>
        <tbody>
            @foreach($felhasznalok as $felhasznalo)
                <tr class="user-list">
                    <td>{{ $felhasznalo->nev }}</td>
                    <td>{{ $felhasznalo->email }}</td>
                    <td>{{ $felhasznalo->telefonszam }}</td>
                    <td>{{ $felhasznalo->lakcim }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@include('footer')

<script>
    // Keresés doboz
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            var value = $(this).val().toLowerCase();
            $('.user-list').filter(function () {
                $(this).toggle(
                    $(this).text().toLowerCase().indexOf(value) > -1
                );
            });
        });
    });
</script>
</body>
</html>
