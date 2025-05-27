<x-layout>

  <div class="container-fluid home-bg vh-100 d-flex justify-content-center align-items-center">
    <div class="row justify-content-center align-items-center text-center w-100">
      <div class="col-12 col-md-6 bg-white bg-opacity-75 p-4 rounded shadow home-content">
        
        <h1 class="text-center text-dark display-4">Benvenut* nella Home</h1>

        @auth
        <a class="dropdown-item" href="{{ route('create.article') }}">Crea</a>
        @endauth

      </div>
    </div>
  </div>

</x-layout>
