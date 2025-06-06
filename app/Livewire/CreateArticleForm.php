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

#[Validate('nullable|image')]
public $img;


     // Nella funzione store richiamiamo il metodo validate per verificare che le regole che abbiamo settato siano rispettate prima di proseguire
     public function store()
{

  

     $this->user_id = Auth::user()->id;       
        //Associo l'attributo pubblico user_id a l'id dell'utente autenticato

        if ($this->img) {         
            //L'utente sta inserendo un immagine?

            $this->validate(['img' => 'image']);  
            //Se si, allora img oltre che ad essere stato inserito deve essere appunto di tipo image

        } else {
            $this->validate();   
            // Faccio partire le regole impostate precedentemente
        } 


        //Creo un nuovo oggetto di classe Article
        //Richiamo la classe Article con il metodo create

    // Creazione dell'articolo (con o senza immagine personalizzata)
     $article = Article::create([
        'title' => $this->title,
        'description' => $this->description,
        'price' => $this->price,
        'category_id' => $this->category,
        'user_id' => Auth::id(),

 'img' => $this->img ? $this->img->store('img', 'public') : null
       

    ]);



    // Reset del form
    $this->clearForm();

      return redirect()->route('homepage')->with('message', 'Articolo creato');


 
}

  protected function clearForm(){  //incapsulo la mia logica dentro un altro metodo 
        //ora la funzione clearform non è accessibile all esterno IMPORTANTE!!!

           $this->title = ""; // per far ritornare la stringa vuota
       $this->description = "";
        $this->category = "";
 $this->price = "";
 $this->img = null;

    }
    

    public function render()
    {
        return view('livewire.create-article-form');
    }
}