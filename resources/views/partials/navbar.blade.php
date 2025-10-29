<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/" style="color:#777"><span style="font-size:15pt">&#9820;</span> Student</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if(true || Auth::check())
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('index') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('index') }}">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            Llista d'Estudiants
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('create') }}">
                            <span>&#10010</span> Afegir Estudiant
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>
