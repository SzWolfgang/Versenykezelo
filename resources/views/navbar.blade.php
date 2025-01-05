<style>
    .navbar-nav {
        list-style: none; 
        padding-left: 0; 
        margin: 0; 
    }

    .navbar-nav .nav-item {
        margin-left: 10px; 
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Versenykezelő</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('felhasznalo.index') }}">Felhasználók</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('verseny.index') }}">Versenyek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('versenyek.create') }}">Új verseny</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('versenyzo.index') }}">Versenyzők kezelése</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fordulo.create') }}">Új fordulók</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
