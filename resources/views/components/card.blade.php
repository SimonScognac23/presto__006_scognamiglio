<div class="background-container d-flex justify-content-center align-items-center py-5">
  <div class="card custom-card shadow">
    <div class="card-body d-flex flex-column justify-content-between h-100">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="card-title mb-0">{{ $article->title }}</h5>
        <p class="card-text text-white fw-semibold mb-0">€ {{ $article->price }}</p>
        
      </div>
      <div class="d-flex gap-2">

        {{-- Link al dettaglio dell'articolo usando la route named 'article.show', passando l'articolo come parametro --}}
        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">Dettaglio</a>

        {{-- Controllo se l'articolo ha una categoria associata --}}
        @if ($article->category)
            {{-- Se l'articolo ha una categoria, crea un link che porta alla lista degli articoli filtrati per quella categoria --}}
            <a href="{{ route('byCategory', ['category' => $article->category->id]) }}"
               class="btn btn-outline-info">{{ $article->category->name }}</a>
        @else
            {{-- Se l'articolo non ha una categoria, mostra un bottone disabilitato con scritto "Nessuna categoria" --}}
            <span class="btn btn-outline-secondary disabled">Nessuna categoria</span>
        @endif

      </div>
    </div>
  </div>
</div>
