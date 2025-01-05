<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Versenyek és Fordulók</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .tall {
            min-height: 80vh;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
        background-color: #ffffff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .table thead {
        background-color: #007bff;
        color: #ffffff;
    }

    .table th, .table td {
        padding: 12px 15px;
        text-align: left;
        border: 1px solid #dee2e6;
    }

    .table th {
        font-size: 16px;
        text-transform: uppercase;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #e9ecef;
    }

    input#search {
        max-width: 400px;
        border: 1px solid #007bff;
        box-shadow: 0 2px 4px rgba(0, 123, 255, 0.2);
    }

    h1 {
        color: #333333;
    }

    ul {
        padding-left: 15px;
    }

    ul li {
        list-style-type: square;
    }
</style>

</head>
<body>
@include('navbar')
    <div class="container mt-5 tall">
        <h1 class="mb-4">Versenyek és Fordulók</h1>

        <input 
            type="text" 
            id="search" 
            class="form-control mb-4" 
            placeholder="Keresés verseny neve alapján..."
        />

        <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Verseny</th>
            <th>Fordulók</th>
        </tr>
    </thead>
    <tbody id="versenyek-table">
    @foreach ($versenyek as $verseny)
    <tr class="verseny-row">
        <td><h4>{{ $verseny->nev }}, {{$verseny->ev}}</h4></td>
        <td>
        @foreach ($verseny->fordulok as $fordulo)
            @if ($fordulo->verseny_ev == $verseny->ev) 
                <div class="mb-3">
                    <h5>{{ $fordulo->nev }}</h5>
                    <p class="text-muted">{{ $fordulo->kezdes_idopont }} - {{ $fordulo->zaras_idopont }}</p>

                    <table class="table table-sm table-bordered">
                        <thead>
                            <tr>
                                <th>Felhasználók</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fordulo->versenyzok as $versenyzo)
                                <tr>
                                    <td><strong>{{ $versenyzo->nev }}</strong> <span class="text-muted">({{ $versenyzo->email }})</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @endforeach
        </td>
    </tr>
    @endforeach

    </tbody>
</table>

    </div>
    @include('footer')
    <script>
        $(document).ready(function () {
            // Keresés név alapján
            $('#search').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('.verseny-row').filter(function () {
                    $(this).toggle($(this).find('td:first').text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</body>
</html>
