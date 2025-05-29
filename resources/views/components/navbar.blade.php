<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm py-3">
    <div class="container-fluid">

        <!-- Logo e link alla homepage -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('homepage') }}">
            <img src="https://s1.qwant.com/thumbr/474x474/2/b/d77af1c290d20aaa0e12b8a5150b93d0e9eba985e668e2d2ec50eda84824d1/th.jpg?u=https%3A%2F%2Ftse.mm.bing.net%2Fth%3Fid%3DOIP.4-41y33sDZ1BAWEjAYQaSwHaHa%26pid%3DApi&q=0&b=1&p=0&a=0.jpg" 
                 alt="Logo" style="width: 40px; height: auto; margin-right: 10px;">
            Presto.it
        </a>

        <!-- Bottone per aprire/chiudere il menu su dispositivi mobili -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenuto principale della navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto align-items-center gap-3">

                <!-- Link alla homepage -->
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('homepage') }}">Home</a>
                </li>

                <!-- Elementi visibili solo all'utente autenticato -->
                @auth
                    <!-- Link per creare un nuovo articolo -->
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('create.article') }}">Crea Articolo</a>
                    </li>

                    <!-- Link per il logout (attiva il form nascosto) -->
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                            Logout
                        </a>

                        <!-- Form nascosto per eseguire il logout -->
                        <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                        <!-- Stiamo controllando se l’utente autenticato abbia il ruolo revisor -->
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a href="{{ route('revisor.index') }}" class="nav-link btn btn-outline-success btn-sm position-relative-w-sm-25">
                                Zona Revisore
                            </a>
                        </li>
                    @endif

                @endauth


                <!-- Elementi visibili solo agli utenti ospiti (non autenticati) -->
                @guest
                    <!-- Link per registrarsi -->
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('register') }}">Registrati</a>
                    </li>

                    <!-- Link per accedere -->
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('login') }}">Accedi</a>
                    </li>

                    <!-- Link per vedere tutti gli articoli -->
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('article.index') }}">Tutti gli articoli</a>
                    </li>

                    <!-- Dropdown con elenco delle categorie -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorie
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li>
                                    <a class="dropdown-item text-capitalize" href="{{ route('byCategory', ['category' => $category->id]) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @if (!$loop->last)
                                    <hr class="dropdown-divider">
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>


{{--  
 Questo codice crea un menu a discesa (dropdown) per la navbar con l'elenco delle categorie,
 e aggiunge un divisore hr tra gli elementi tranne che dopo l ultimo, grazie alla direttiva @if (!$loop->last)
 di Blade. Stiamo usando !$loop.->last. per inserire il divisore del dropdown
 in ogni iterazione del ciclo tranne l'ultima 
--}}
