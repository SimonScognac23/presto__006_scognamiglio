<div class="background-container d-flex justify-content-center align-items-center py-5">
  <!-- Card principale con sfondo personalizzato, ombra e dimensioni definite -->
  <div class="card custom-card shadow">
    <!-- Corpo della card con layout verticale e spazio distribuito -->
    <div class="card-body d-flex flex-column justify-content-between h-100">

      <!-- Sezione titolo e prezzo, centrati e con margini adeguati -->
      <div class="mb-3 text-center">
        <!-- Titolo dell'articolo -->
        <h5 class="card-title mb-1">{{ $article->title }}</h5>
        <!-- Prezzo dell'articolo, posizionato sotto il titolo -->
        <p class="card-text fw-semibold mb-0">€ {{ $article->price }}</p>
      </div>

      <!-- Sezione bottoni con distanza tra loro -->
      <div class="d-flex gap-2">
        <!-- Bottone per il dettaglio dell'articolo -->
        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">{{ __('ui.detail') }}</a>

        <!-- Controllo se l'articolo ha una categoria -->
        @if ($article->category)
          <!-- Bottone link alla categoria, con stile outline info -->
          <a href="{{ route('byCategory', ['category' => $article->category->id]) }}" class="btn btn-outline-info">{{ $article->category->name }}</a>
        @else
          <!-- Bottone disabilitato se non c'è categoria -->
          <span class="btn btn-outline-secondary disabled">{{ __('ui.noCategory') }}</span>
        @endif
      </div>

    </div>
  </div>
</div>
