<!-- FORM 
   Assegniamo al form un comportamento di submit tramite wire:submit.
   Al posto della classica action che richiama una rotta, utilizziamo wire:submit,
   che collega il form a una funzione (in questo caso store) nel componente Livewire.

   La direttiva wire:model viene utilizzata per associare un tag input a un attributo pubblico
   del componente Livewire. Quando l’utente inserisce un valore nell’input, Livewire lo sincronizza 
   con l’attributo specificato nel file CreateArticle.php.
-->

<div class="row nba-form-section mt-5">
    <div class="col-12 col-md-8 col-lg-6 mx-auto p-4 shadow rounded bg-white">
        <!-- Messaggio di conferma se presente nella session -->
        @if (session('message'))
            <div class="alert alert-success text-center fw-bold">
                {{ session('message') }}
            </div>
        @endif

        <!-- Inizio form -->
        <form class="nba-form" wire:submit="store">
            <!-- wire:submit fa scattare la funzione store al submit del form -->
            <!-- Con wire:model colleghiamo gli input agli attributi Livewire -->

            <!-- CAMPO TITOLO -->
            <div class="mb-3">
                <label for="title" class="form-label fw-bold text-primary">Titolo</label>
                <input 
                    wire:model.blur="title"
                    name="title" 
                    value="{{ old('title') }}"
                    type="text" 
                    class="form-control border-primary"
                    id="title"
                    placeholder="Inserisci il titolo"
                >     
                <div>@error('title') {{ $message }} @enderror</div>
            </div>

            <!-- CAMPO DESCRIZIONE -->
            <div class="mb-3">
                <label for="description" class="form-label fw-bold text-primary">Descrizione</label>
                <textarea 
                    wire:model.blur="description"
                    name="description" 
                    cols="30"
                    rows="4"
                    class="form-control border-primary" 
                    id="description"
                    placeholder="Inserisci la descrizione"
                >{{ old('description') }}</textarea> 
                <div>@error('description') {{ $message }} @enderror</div>
            </div>

            <!-- CAMPO PREZZO -->
            <div class="mb-3">
                <label for="price" class="form-label fw-bold text-primary">Prezzo</label>
                <input 
                    wire:model.blur="price"
                    name="price" 
                    value="{{ old('price') }}"
                    type="number" 
                    step="0.01"
                    class="form-control border-primary"
                    id="price"
                    placeholder="Inserisci il prezzo"
                >
                <div>@error('price') {{ $message }} @enderror</div>
            </div>

            <!-- CAMPO CATEGORIA -->
            <div class="mb-3">
                <label for="category" class="form-label fw-bold text-primary">Categoria</label>
                <select 
                    wire:model.blur="category"
                    name="category" 
                    class="form-control border-primary" 
                    id="category"
                >
                    <option label disabled> Seleziona una categoria </option>
                    @foreach ( $categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div>@error('category') {{ $message }} @enderror</div>
            </div>

            <!-- BOTTONE INVIO -->
            <button type="submit" class="btn btn-dark text-white w-100 fw-bold">
                Invia dati
            </button>
        </form>
        <!-- Fine form -->
    </div>
</div>



 <!-- div sotto i campi input che controllano se ci sono errori, ovviamente devo valorizzarli con la direttiva error , un po simile alla validation error di laravel -->   