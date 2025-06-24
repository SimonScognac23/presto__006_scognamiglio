<x-layout>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">

        <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

            @if ($article->images->count() > 0)
              @foreach ($article->images as $key => $image)
                <div class="carousel-item @if ($loop->first) active @endif">
                  <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 rounded shadow" alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                </div>
              @endforeach
            @else
              <div class="carousel-item active">
                <img src="https://picsum.photos/800/400" class="d-block w-100 rounded shadow" alt="Immagine segnaposto dell'articolo">
              </div>
            @endif

          </div>

          @if ($article->images->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Precedente</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Successivo</span>
            </button>
          @endif
        </div>

        {{-- Testo dell'articolo sotto il carousel --}}
        <div class="mt-4 p-4 bg-dark text-white rounded shadow">
          <h5 class="fw-bold text-uppercase border-bottom pb-2 mb-3">{{ __('ui.title') }}: <span class="fw-normal">{{ $article->title }}</span></h5>
          <p class="mb-2"><strong>{{ __('ui.price') }}:</strong> € {{ $article->price }}</p>
          <p><strong>{{ __('ui.description') }}:</strong> {{ $article->description }}</p>
        </div>

      </div>
    </div>
  </div>

</x-layout>



{{-- In questa vista avremo a disposizione la variabile article contenente il singolo articolo di questa pagina. 
    Possiamo quindi sfruttarla per visualizzare tutte le sue informazioni. Per arrivare a questa vista modifichiamo 
    l'attributo href dell anchor nel card.blade.php --}}





    {{--USER STORY 5 PUNTO 17
      
    * Se ci sono delle immagini, viene generato un carosello in cui, per ognuna delle immagini, viene generata una slide
    * Solo se c'è più di una immagine vengono fatti visualizzare i bottoni necessari a cambiare slide
    * Se non ci sono immagini, vediamo quella di default.

--}}
      