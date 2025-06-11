<x-layout>
  <div class="container carousel-container d-flex justify-content-center align-items-center">
    <div id="carouselExample" class="carousel slide w-100" style="max-width: 800px;" data-bs-ride="carousel">
      
      <div class="carousel-inner carousel-inner-custom">
        <div class="carousel-item active">
          <div class="carousel-item-content">
            
            <div class="carousel-text">
              <h5>{{ __('ui.title') }} {{ $article->title }}</h5>
              <p class="price">{{ __('ui.price') }} € {{ $article->price }}</p>

              <img 
                src="{{ $article->img ? Storage::url($article->img) : 'https://picsum.photos/600' }}" 
                alt="Immagine dell'articolo {{ $article->title }}" 
                class="carousel-img"
              >

              <p>{{ __('ui.description') }} {{ $article->description }}</p>
            </div>
          </div>
        </div>
      </div>

    </div> 
  </div>
</x-layout>



{{-- In questa vista avremo a disposizione la variabile article contenente il singolo articolo di questa pagina. 
    Possiamo quindi sfruttarla per visualizzare tutte le sue informazioni. Per arrivare a questa vista modifichiamo 
    l'attributo href dell anchor nel card.blade.php --}}


      