<x-layout>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12 pt-5">
                <div class="rounded shadow bg-body-secondary">
                    <h3 class="display5 text-center p-2">
                        Revisore dashboard
                    </h3>
                </div>
            </div>
        </div>


        

<!-- Controllo di avvenuta accettazione o rifiuto dell'articolo -->

        @if  (session()->has('message'))
                <div class="row justify-content-center">
                   <div class="col-5 alert alert-success text-center shadow rounded">
                       {{ session('message') }}
                   </div>
                </div>
        @endif



        @if($article_to_check)  <!-- impostiamo un controllo: c'è un articolo da revisionare?  -->
        <div class="row justify-content-center pt-5">
            <div class="col-12 col-md-8">
                <div class="row justify-content-center">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-12 col-md-4 text-center">
                          <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
        

                        </div>
                    @endfor
                </div>
            </div>
        </div>

         <div>
                <h2>{{ $article_to_check->title }}</h2>
                <h3>{{('Autore: ')}} {{ $article_to_check->user->name }} </h3>
                <h4 class="fst-italic text-muted">{{('Categoria: ')}} {{$article_to_check->category->name }}</h4>
                <p class="fst-italic text-muted">{{$article_to_check->created_at}}</p>
                <p>{{ $article_to_check->description }}</p>
         </div>

            <div class="d-flex justify-content-around">
                <form action="{{ route('reject', ['article'=>$article_to_check]) }}" method="POST">
                    @csrf
                    @METHOD('PATCH')
                    <button class="btn btn-danger px-2 fs-6 fw-bold">Rifiuta</button>  <!--  impostato due form: uno per accettare e l’altro per rifiutare l’articolo, ma come vediamo abbiamo lasciato method e action vuoti -->
                </form>
                <form action="{{ route('accept', ['article'=>$article_to_check]) }}" method="POST">
                    @csrf
                    @METHOD('PATCH')
                    <button class="btn btn-success py-2 px-5 fw-bold">Accetta</button>
                </form>
            </div>
        </div>

        
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h3 class="fst-italic display-4">
                        Nessun articolo da revisionare   <!-- “Nessun articolo da revisionare” e sarà rimandato all’homepage da un bottone -->
                    </h3>
                    <a href="{{ route('homepage') }}" class="btn btn-success">Torna alla homepage</a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
