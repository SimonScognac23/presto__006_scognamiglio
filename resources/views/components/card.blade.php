<div class="card custom-card shadow w-100 position-relative">
 
  
  <div class="card-body d-flex flex-column justify-content-between h-100">
    
    <div class="img-wrapper">
      <img
        src="{{ $article->images->isNotEmpty() 
                ? Storage::url($article->images->first()->path) 
                : 'https://picsum.photos/200' }}"
        alt="Immagine articolo"
      >
    </div>

    <div class="text-center mb-3">
      <h5 class="card-title mb-1">{{ $article->title }}</h5>
      <p class="card-text fw-semibold mb-0">€ {{ $article->price }}</p>
    </div>

    <div class="d-flex gap-2 justify-content-center">
      <a href="{{ route('article.show', compact('article')) }}" 
         class="btn btn-primary">
         {{ __('ui.detail') }}
      </a>
      
                <!-- Controllo se l'articolo ha una categoria -->
        @if ($article->category)
          <!-- Bottone link alla categoria, con stile outline info -->
          <a href="{{ route('byCategory', ['category' => $article->category->id]) }}" class="btn btn-outline-info">{{ __("ui." . strtolower($article->category->name)) }}</a>
        @else
          <!-- Bottone disabilitato se non c'è categoria -->
          <span class="btn btn-outline-secondary disabled">{{ __('ui.noCategory') }}</span>
        @endif
      
    </div>
  </div>
</div>

  <!-- Immagine dinamica con fallback -->
       