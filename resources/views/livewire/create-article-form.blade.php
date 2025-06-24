{{-- <!-- FORM 
   Assegniamo al form un comportamento di submit tramite wire:submit.
   Al posto della classica action che richiama una rotta, utilizziamo wire:submit,
   che collega il form a una funzione (in questo caso store) nel componente Livewire.

   La direttiva wire:model viene utilizzata per associare un tag input a un attributo pubblico
   del componente Livewire. Quando l’utente inserisce un valore nell’input, Livewire lo sincronizza 
   con l’attributo specificato nel file CreateArticle.php.
--> 


<!-- USER STORY 5 ---PUNTO 8-----

 * Analizziamo quanto abbiamo scritto:
   Abbiamo un input di tipo file:
   collegato da data binding con la proprietà temporary_images
   con attributo HTML multiple, per permettere la selezione di più immagini
   con direttiva @error per dare riscontro visivo in caso di errori
   

 *  Successivamente facciamo un controllo: se l’array $images non è vuoto, allora vedremo un’altra porzione, dedicata alla PREVIEW DELLE IMMAGINI:


 * per ognuna delle immagini salvate nell’array, generiamo un div vuoto, con background-image l’url temporaneo dell’immagine,
   recuperato dal metodo di livewire temporaryUrl() . Utilizziamo un div con background-image per
   simulare anche in fase di preview ’effetto del crop dell’immagine.

   !!! La classe  ---img-preview--- non è una classe di bootstrap: poiché i div assumono la dimensione del proprio contenuto, per fare in
modo di visualizzare le preview delle immagini è necessario dare a questa classe una dimensione predefinita.

--> 


<!-- USER STORY 5 PUNTO 11
  Per ogni immagine, oltre alla preview stiamo generando anche un bottone.
  Questo bottone, una volta cliccato, grazie all’attributo Livewire `wire:click`,
  farà partire il metodo `removeImage()` appena creato, passandogli come parametro
  la chiave reale dell’immagine ciclata in quel momento.
-->
--}}

<div class="row nba-form-section mt-4">
    <div class="col-12 col-md-8 col-lg-6 mx-auto p-4 shadow rounded bg-white ">

        <!-- Messaggio di conferma se presente nella session -->
        @if (session('message'))
            <div class="alert alert-success text-center fw-bold">
                {{ session('message') }}
            </div>
        @endif

        <!-- Inizio form -->
        <form class="nba-form" enctype="multipart/form-data" wire:submit.prevent="store">

            <!-- wire:submit fa scattare la funzione store al submit del form -->
            <!-- Con wire:model colleghiamo gli input agli attributi Livewire -->

            <!-- CAMPO TITOLO -->
            <div class="mb-3">
                <label for="title" class="form-label fw-bold text-black">{{ __('ui.title') }}</label>
                <input 
                    wire:model.blur="title"
                    name="title" 
                    type="text" 
                    class="form-control border-primary"
                    id="title"
                    placeholder="{{ __('ui.title_placeholder') }}"
                >     
                <!-- div sotto i campi input che controllano se ci sono errori, 
                     ovviamente devo valorizzarli con la direttiva error , 
                     un po' simile alla validation error di laravel -->
                <div class="text-danger">@error('title') {{ $message }} @enderror</div>
            </div>

            <!-- CAMPO DESCRIZIONE -->
            <div class="mb-3">
                <label for="description" class="form-label fw-bold text-black">{{ __('ui.description') }}</label>
                <textarea 
                    wire:model.blur="description"
                    name="description" 
                    cols="30"
                    rows="4"
                    class="form-control border-primary" 
                    id="description"
                    placeholder="{{ __('ui.description_placeholder') }}"
                ></textarea> 
                <div class="text-danger">@error('description') {{ $message }} @enderror</div>
            </div>

            <!-- CAMPO PREZZO -->
            <div class="mb-3">
                <label for="price" class="form-label fw-bold text-black">{{ __('ui.price') }}</label>
                <input 
                    wire:model.blur="price"
                    name="price" 
                    type="number" 
                    step="0.01"
                    class="form-control border-primary"
                    id="price"
                    placeholder="{{ __('ui.price_placeholder') }}"
                >
                <div class="text-danger">@error('price') {{ $message }} @enderror</div>
            </div>

            <!-- CAMPO CATEGORIA -->
            <div class="mb-3">
                <label for="category" class="form-label fw-bold text-black">{{ __('ui.category') }}</label>
                <select 
                    wire:model.blur="category"
                    name="category" 
                    class="form-control border-primary" 
                    id="category"
                >
                    <option value="" disabled selected>{{ __('ui.select_category') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ __("ui." . strtolower($category->name)) }}</option>
                    @endforeach
                </select>
                <div class="text-danger">@error('category') {{ $message }} @enderror</div>
            </div>
            


            <!-- USER STORY 5 PUNTO 8-->
            <div class="mb-3">
                <input type="file" wire:model.live="temporary_images" multiple
                    class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
                @error('temporary_images.*')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
                @error('temporary_images')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- USER STORY 5 PUNTO 11-->
            @if (!empty($images))
                <p>Photo preview:</p>
                <div class="row border border-4 border-success rounded shadow py-4">
                    @foreach ($images as $key => $image)
                        <div class="col d-flex flex-column align-items-center my-3">
                            <div 
                                class="img-preview mx-auto shadow rounded"
                                style="background-image: url({{ $image->temporaryUrl() }});">
                            </div>
                            <button type="button" class="btn btn-sm btn-danger mt-1 px-2 py-0" wire:click="removeImage({{ $key }})" aria-label="Remove image">×</button>
                        </div>
                    @endforeach
                </div>
            @endif


            <!-- FINE USER STORY 5 PUNTO 11-->



            <!-- FINE USER STORY 5 PUNTO 8 -->



            <!-- SPINNER DI CARICAMENTO LIVEWIRE

                 Questo blocco viene mostrato automaticamente da Livewire quando l'utente seleziona un'immagine da caricare.

                 - wire:loading -> indica a Livewire di mostrare il contenuto solo durante un'operazione asincrona (es. upload).
                 - wire:target="img" -> specifica che il caricamento è legato all'input con wire:model="img". 
                   Così il caricamento non si attiva su tutto il form, ma solo durante l'upload del file immagine.

                 In questo caso, viene visualizzato uno spinner Bootstrap con un messaggio testuale durante il caricamento.
            -->
            <div wire:loading wire:target="temporary_images" class="text-info mt-2">
                <div class="spinner-border text-primary" role="status" aria-hidden="true"></div>
                <span class="ms-2">{{ __('ui.loading_image') }}</span>
            </div>


            <!-- BOTTONE INVIO -->
            <button 
                type="submit" 
                class="btn btn-dark text-white w-100 fw-bold text-black"
                wire:loading.attr="disabled"
            >   
                {{ __('ui.submit_data') }}
            </button>
        </form>
        <!-- Fine form -->
    </div>
</div>  
