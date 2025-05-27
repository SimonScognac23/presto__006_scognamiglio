<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;




class CreateArticleForm extends Component
{

    use WithFileUploads;


#[Validate('required', message: 'Il titolo è obbligatorio.')]  // queste validate funzionano che: finche non superano lo step numero 1 ossia title, le Validate non vanno alla numero 2 ossia subtitle
 // validate accetta questi parametri dove il primo parametro è la regoladi validazione e il secondo è il messaggio con il valore del messaggio tramite la stringa


     // #[Validate('required|min:3')]  // annotation e sono un modo di attribuire ai attributi pubblici delle regole di validazione, prese da livewire sostituiscono le validate() che andavano a essere inserite nella request
    public $title;  //definiamo i 3 campi del form in modo che istruiamo livewire quale operazione logica deve compiere dentro al form, in questo caso è quella di salvare i dati 


#[Validate('required', message: 'Descrizione obbligatoria')] 
#[Validate('min:5', message: 'Descrizione troppo corta')]
  //   #[Validate('required|min:3')]  // attribuisco delle regole di validazione
     public $description;


#[Validate('required|numeric')] 

    public $price;
    // questi tre valori sono immediatamente disponibili nel create-article.blade
    // Li posso passare alla create-article.blade tramite il wire:model

#[Validate('required')] 
     public $category;

     public $article;


     // Nella funzione store richiamiamo il metodo validate per verificare che le regole che abbiamo settato siano rispettate prima di proseguire
     public function store()
{
    // Validazione dei dati
    $this->validate();


    // Creazione dell'articolo (con o senza immagine personalizzata)
    $this->article = Article::create([
        'title' => $this->title,
        'description' => $this->description,
        'price' => $this->price,
        'category' => $this->category,
        'user_id' => Auth::id()
    ]);

    // Reset del form
    $this->clearForm();

    // Messaggio di successo
    session()->flash('message', 'Post inserito con successo!');
}

  protected function clearForm(){  //incapsulo la mia logica dentro un altro metodo 
        //ora la funzione clearform non è accessibile all esterno IMPORTANTE!!!

           $this->title = ""; // per far ritornare la stringa vuota
       $this->description = "";
        $this->category = "";
 $this->price = "";

    }
    

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
