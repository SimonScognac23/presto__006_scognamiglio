<x-layout>
  <div class="container min-vh-100 d-flex justify-content-center align-items-center bg-secondary bg-gradient py-5">
    <div id="carouselExample" class="carousel slide w-100" style="max-width: 800px;" data-bs-ride="carousel">
      <div class="carousel-inner rounded shadow-lg overflow-hidden">
        <div class="carousel-item active">
          <div class="d-flex flex-column align-items-center bg-dark bg-opacity-75 p-4">
          
            <div class="text-center text-white">
              <h5 class="fw-bold mb-2">Titolo: {{ $article->title }}</h5>
              <p class="mb-2">Descrizione: {{ $article->description }}</p>
              <p class="fw-semibold">Prezzo: € {{ $article->price }}</p>
                 <img 
                    src="{{ $article->img ? Storage::url($article->img) : 'https://picsum.photos/600' }}" 
                    alt="Immagine dell'articolo {{ $article->title }}" 
                    class="img-fluid rounded mt-4"
                >
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


      