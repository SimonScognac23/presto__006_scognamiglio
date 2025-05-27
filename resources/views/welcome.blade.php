<x-layout>

  <div class="container-fluid home-bg vh-100 d-flex justify-content-center align-items-center">
    <div class="row justify-content-center align-items-center text-center w-100">
      <div class="col-12 col-md-6 bg-white bg-opacity-75 p-4 rounded shadow home-content">
        <h1 class="text-center text-dark display-4 mb-4">Benvenut* nella Home</h1>

        @auth
          <a class="btn btn-primary" href="{{ route('create.article') }}">Crea un nuovo articolo</a>
        @endauth
      </div>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center gy-4">
      
      @forelse($articles as $article)  
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
          <x-card :article="$article" />
        </div>    
      @empty
        <div class="col-12 text-center">
          <h3>Non sono ancora stati creati articoli</h3>
        </div>
      @endforelse

    </div>
  </div>

  
  </x-layout>


