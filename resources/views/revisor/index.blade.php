<x-layout>
    <div class="container my-5">

        {{-- HEADER --}}
        <div class="row">
            <div class="col-12">
                <div class="bg-dark text-white text-center py-3 rounded shadow">
                    <h3 class="display-5 m-0">{{ __('ui.revisor_dashboard') }}</h3>
                </div>
            </div>
        </div>

        {{-- MESSAGGIO DI CONFERMA --}}
        @if(session()->has('message'))
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <div class="alert alert-success text-center shadow rounded">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif

        {{-- CONTROLLO SE C'È UN ARTICOLO --}}
        @if($article_to_check)

      


            {{-- IMMAGINE ARTICOLO --}}
            @if($article_to_check->img)
                <div class="text-center my-4">
                    <img 
                        src="{{ asset('storage/' . $article_to_check->img) }}" 
                        class="img-fluid rounded shadow" 
                        alt="{{ $article_to_check->title }}">
                </div>
            @endif

     {{-- DETTAGLI ARTICOLO --}}
<div class="bg-dark p-4 rounded shadow text-white">
    <h2 class="mb-3">{{ $article_to_check->title }}</h2>

    {{-- Autore --}}
    @if($article_to_check->user)
        <h4 class="text-light mb-2">Autore: {{ $article_to_check->user->name }}</h4>
    @else
        <h4 class="text-danger mb-2">Autore non disponibile</h4>
    @endif

    {{-- Categoria --}}
    @if($article_to_check->category)
        <h5 class="fst-italic text-info mb-3">Categoria: {{ $article_to_check->category->name }}</h5>
    @else
        <h5 class="fst-italic text-danger mb-3">{{ __('ui.noCategory') }}</h5>
    @endif

    {{-- Data --}}
    <p class="text-secondary fst-italic mb-4">Creato il: {{ $article_to_check->created_at->format('d/m/Y H:i') }}</p>

    {{-- Descrizione --}}
    <p class="lh-lg">{{ $article_to_check->description }}</p>

    {{-- Altri dettagli opzionali --}}
    @if($article_to_check->updated_at && $article_to_check->updated_at != $article_to_check->created_at)
        <p class="text-secondary fst-italic mt-3">Ultima modifica: {{ $article_to_check->updated_at->format('d/m/Y H:i') }}</p>
    @endif
</div>

            {{-- BOTTONI AZIONE --}}
            <div class="d-flex justify-content-between my-4">
                <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-outline-danger px-4 fw-bold">{{ __('ui.reject') }}</button>
                </form>

                <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-outline-success px-4 fw-bold">{{ __('ui.accept') }}</button>
                </form>
            </div>

        @else
            {{-- NESSUN ARTICOLO --}}
            <div class="row justify-content-center align-items-center text-center" style="min-height: 300px;">
                <div class="col-md-8">
                    <h3 class="display-6 fst-italic mb-4">
                             {{ __('ui.no_articles_to_review') }}
                    </h3>
                    <a href="{{ route('homepage') }}" class="btn btn-success">
                     Back to Homepage
                    </a>
                </div>
            </div>
        @endif

    </div>
</x-layout>
