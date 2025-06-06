<x-layout>
    <div class="container-fluid pt-5">

        {{-- HEADER --}}
        <div class="row">
            <div class="col-12 pt-5">
                <div class="rounded shadow bg-body-secondary">
                    <h3 class="display5 text-center p-2">
                        Revisore dashboard
                    </h3>
                </div>
            </div>
        </div>

        {{-- MESSAGGIO DI CONFERMA (ACCETTAZIONE O RIFIUTO ARTICOLO) --}}
        @if(session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow rounded">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        {{-- CONTROLLO SE C'È UN ARTICOLO DA REVISIONARE --}}
        @if($article_to_check)

            {{-- BLOCCO GRAFICO DI RIEMPIMENTO (per future funzionalità, tipo tag, analisi immagini ecc.) --}}
            <div class="row justify-content-center pt-5">
                <div class="col-12 col-md-8">
                    <div class="row justify-content-center">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-12 col-md-4 text-center">
                                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                                    {{-- Spazio per funzionalità future: ad esempio visualizzare tags, flag, keyword, ecc. --}}
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>

            {{-- SEZIONE IMMAGINE ARTICOLO --}}
            <div class="text-center my-4">
                @if($article_to_check->img)
                    {{-- 
                        - Controlliamo se l'articolo ha un'immagine collegata tramite la proprietà "img".
                        - Se sì, la stampiamo usando l'helper asset() concatenato con il path in 'storage'.
                        - L'immagine è responsiva grazie alla classe Bootstrap "img-fluid".
                        - "rounded" per gli angoli arrotondati.
                        - "shadow" per aggiungere un'ombra.
                        - Alt viene impostato con il titolo dell’articolo per accessibilità.
                    --}}
                    <img 
                        src="{{ asset('storage/' . $article_to_check->img) }}" 
                        class="img-fluid rounded shadow" 
                        alt="{{ $article_to_check->title }}">
                @endif
            </div>

            {{-- DETTAGLI ARTICOLO --}}
            <div>
                {{-- Titolo --}}
                <h2>{{ $article_to_check->title }}</h2>

                {{-- Autore (se presente) --}}
                @if($article_to_check->user)
                    <h3>{{ 'Autore: ' . $article_to_check->user->name }}</h3>
                @else
                    <h3 class="text-danger">Autore non disponibile</h3>
                @endif

                {{-- Categoria (se presente) --}}
                @if($article_to_check->category)
                    <h4 class="fst-italic text-muted">Categoria: {{ $article_to_check->category->name }}</h4>
                @else
                    <h4 class="fst-italic text-muted text-danger">Categoria non disponibile</h4>
                @endif

                {{-- Data creazione articolo --}}
                <p class="fst-italic text-muted">{{ $article_to_check->created_at }}</p>

                {{-- Descrizione articolo --}}
                <p>{{ $article_to_check->description }}</p>
            </div>

            {{-- BOTTONI DI AZIONE (ACCETTA / RIFIUTA) --}}
            <div class="d-flex justify-content-around my-4">
                {{-- FORM PER RIFIUTARE ARTICOLO --}}
                <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-danger px-2 fs-6 fw-bold">Rifiuta</button>
                </form>

                {{-- FORM PER ACCETTARE ARTICOLO --}}
                <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success py-2 px-5 fw-bold">Accetta</button>
                </form>
            </div>

        @else
            {{-- NESSUN ARTICOLO DA REVISIONARE --}}
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h3 class="fst-italic display-4">
                        Nessun articolo da revisionare
                    </h3>
                    <a href="{{ route('homepage') }}" class="btn btn-success">
                        Torna alla homepage
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
