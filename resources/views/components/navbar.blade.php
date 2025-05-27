<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm py-3">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('homepage') }}">
            <img src="https://s1.qwant.com/thumbr/474x474/2/b/d77af1c290d20aaa0e12b8a5150b93d0e9eba985e668e2d2ec50eda84824d1/th.jpg?u=https%3A%2F%2Ftse.mm.bing.net%2Fth%3Fid%3DOIP.4-41y33sDZ1BAWEjAYQaSwHaHa%26pid%3DApi&q=0&b=1&p=0&a=0.jpg" 
                 alt="Logo" style="width: 40px; height: auto; margin-right: 10px;">
            Presto.it
        </a>

        <!-- Bottone mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenuto navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto align-items-center gap-3">
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('homepage') }}">Home</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('create.article') }}">Crea Articolo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                            Logout
                        </a>
                        <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('register') }}">Registrati</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('login') }}">Accedi</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
