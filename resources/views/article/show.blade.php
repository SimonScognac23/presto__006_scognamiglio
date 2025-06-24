<x-layout>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">

        <!-- Inizio del carousel Bootstrap -->
        <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

          {{-- Controllo se l'articolo ha almeno un’immagine --}}
@if($article->images->isNotEmpty())

  {{-- Scorro ciascuna immagine dell’articolo --}}
  @foreach($article->images as $key => $image)
    @php
      // 1. Calcolo il percorso su disco del file ritagliato 300×300:
      //    prendo la cartella (dirname) e aggiungo il prefisso “crop_300x300_” al nome del file
      $cropPath = dirname($image->path) . '/crop_300x300_' . basename($image->path);

      // 2. Verifico se quel file “crop” esiste nella disk “public”:
      //    – se sì, chiamo getUrl(300, 300) per ottenere l’URL della versione ritagliata
      //    – altrimenti, chiamo getUrl() per tornare all’immagine originale
      $url = \Illuminate\Support\Facades\Storage::disk('public')->exists($cropPath)
             ? $image->getUrl(300, 300)
             : $image->getUrl();
    @endphp

    {{-- Per ogni immagine, creo una slide del carousel --}}
    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
      {{-- Uso Flexbox per centrare orizzontalmente l’immagine --}}
      <div class="d-flex justify-content-center">
        {{-- Visualizzo l’immagine forzandone dimensioni e ritaglio --}}
        <img
          src="{{ $url }}"
          class="rounded shadow"
          style="width: 300px; height: 300px; object-fit: cover;"
          alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
      </div>
    </div>
  @endforeach

{{-- Se non ci sono immagini, mostro sempre una slide col placeholder --}}
@else
  <div class="carousel-item active">
    <div class="d-flex justify-content-center">
      <img
        src="https://picsum.photos/300"
        class="rounded shadow"
        style="width: 300px; height: 300px; object-fit: cover;"
        alt="Immagine segnaposto dell'articolo">
    </div>
  </div>
@endif


          </div>

          <!-- Aggiungo i controlli Next/Prev se ci sono più di 1 immagine -->
          @if($article->images->count() > 1)
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
        <!-- Fine carousel -->

        <!-- Dettagli dell'articolo sotto il carousel -->
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
      