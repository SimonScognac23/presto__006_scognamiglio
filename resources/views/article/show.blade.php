<x-layout>

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
  
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 rounded p-3">
          <h5 class="text-white">Titolo: {{ $article->title }}</h5>
          <p class="text-white">Descrizione: {{ $article->description }}</p>
          <p class="text-white">Prezzo: {{ $article->price }} €</p>
        </div>
      </div>

  </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


</x-layout>

{{-- In questa vista avremo a disposizione la variabile article contenente il singolo articolo di questa pagina. 
    Possiamo quindi sfruttarla per visualizzare tutte le sue informazioni. Per arrivare a questa vista modifichiamo 
    l'attributo href dell anchor nel card.blade.php --}}