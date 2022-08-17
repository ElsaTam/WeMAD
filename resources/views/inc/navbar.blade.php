<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow rounded-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="nav-item nav-link" href="{{ url('/') }}">Accueil</a>
                <a class="nav-item nav-link disabled" href="{{ url('news/') }}">Actualités</a>
                <a class="nav-item nav-link" href="{{ url('wanteds/10-most-wanted-fugitives') }}">Personnes recherchées</a>
                <a class="nav-item nav-link" href="{{ url('database/') }}">Bases de données</a>
                <a class="nav-item nav-link" href="{{ url('ressources/') }}">Ressources</a>
                <a class="nav-item nav-link" href="{{ url('offices/') }}">Agences</a>
                <a class="nav-item nav-link" href="{{ url('links/') }}">Liens utiles</a>
                <a class="nav-item nav-link" href="{{ url('contact/') }}">Contact</a>
            </div>
        </div>
    </div>
</nav>