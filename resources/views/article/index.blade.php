<x-layout>


<div class="container my-5">
    <div class="row justify-content-center gy-4">
      
      @forelse($articles as $article)  
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
          <x-card :article="$article" />
        </div>    
      @empty
        <div class="col-12 text-center">
          <h3> {{ __('ui.noArticlesCreated') }}</h3>
        </div>
      @endforelse

    </div>
  </div>

    <div class="d-flex justify-content-center">
      <div>
        {{ $articles->links() }}
      </div>
    </div>



  </x-layout>

{{-- 
    Passiamo l'articolo al componente x-card.
    Utilizziamo @forelse per controllare se la collezione $articles contiene elementi. 
    In caso affermativo, cicliamo ciascun $article per generare dinamicamente una card.
    Se è vuota, viene mostrato un messaggio alternativo.
--}}

{{-- 
    All'interno del componente x-card passiamo l intero oggetto $article
    tramite l attributo HTML :article="$article", che sarà usato nel componente.
--}}

{{-- 
    Il metodo $articles->links() nella paginazione di Laravel genera un insieme di link HTML 
    che gli utenti possono cliccare per navigare tra diverse pagine dei risultati paginati, 
    fornendo un modo intuitivo per sfogliare set di dati.
--}}



