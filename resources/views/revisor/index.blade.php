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

            {{--USER STORY 5 PUNTO 15------------------------------------------------------------------------------------ --}} 
            {{-- Sezione immagini associate all'articolo --}}
            <div class="container my-5">
                <div class="row justify-content-center gy-4">
                    @if ($article_to_check->images->count())
                        @foreach ($article_to_check->images as $key => $image)
                            <div class="col-6 col-md-4 mb-4">
                                <img src="{{ Storage::url($image->path) }}" class="img-fluid rounded shadow"
                                    alt="Immagine {{ $key + 1 }} dell’articolo ‘{{ $article_to_check->title }}’">
                            </div>
                        @endforeach
                    @else
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 mb-4 text-center">
                                <img src="https://picsum.photos/300" alt="immagine segnaposto"
                                    class="img-fluid rounded shadow">
                            </div>
                        @endfor
                    @endif
                </div>
            </div>

            {{-- Cosa stiamo facendo:
                *  Se l’articolo $article_to_check ha delle immagini (ovvero se il count() della collezione restituisce un numero maggiore di 0), per
                ognuna delle immagini creiamo una colonna e un tag img .
                
                *  Se non c'è nessuna immagine, vedremo sempre l’immagine segnaposto.--}}

            {{--USER STORY 5 PUNTO 15 FINE------------------------------------------------------------------------------------ --}}

            {{-- DETTAGLI ARTICOLO --}}
            <div class="bg-dark p-4 rounded shadow text-white">
                <h2 class="mb-3">{{ $article_to_check->title }}</h2>

                {{-- Autore --}}
                @if($article_to_check->user)
                    <h4 class="text-light mb-2">{{ __('ui.author') }}: {{ $article_to_check->user->name }}</h4>
                @else
                    <h4 class="text-danger mb-2">{{ __('ui.author_not_available') }}</h4>
                @endif

                {{-- Categoria --}}
                @if($article_to_check->category)
                    <h5 class="fst-italic text-info mb-3">{{ __('ui.category') }}: {{ $article_to_check->category->name }}</h5>
                @else
                    <h5 class="fst-italic text-danger mb-3">{{ __('ui.noCategory') }}</h5>
                @endif

                {{-- Data --}}
                <p class="text-secondary fst-italic mb-4">{{ __('ui.created_at') }}: {{ $article_to_check->created_at->format('d/m/Y H:i') }}</p>

                {{-- Descrizione --}}
                <p class="lh-lg">{{ $article_to_check->description }}</p>

                {{-- Altri dettagli opzionali --}}
                @if($article_to_check->updated_at && $article_to_check->updated_at != $article_to_check->created_at)
                    <p class="text-secondary fst-italic mt-3">{{ __('ui.last_modified') }}: {{ $article_to_check->updated_at->format('d/m/Y H:i') }}</p>
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
