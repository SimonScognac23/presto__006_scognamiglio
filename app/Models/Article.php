<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;





class Article extends Model
{
    use HasFactory;
    use Searchable;


    protected $fillable = [
        'title', 'description', 'price', 'category_id', 'user_id'
    ];



//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


      /**
     * Get the user that owns the article.
     * user() --> perche riguarda solo UN utente
     * usiamo il metodo belongsTo per recuperare degli utenti
     * IMPORTANTE----->questa istruzione fornita ci da accesso a 2 entità: il metodo user e la proprietà user!! quindi io posso accedere all'utente collegato non con il metodo user ma con la proprietà che ha lo stesso nome di quella relazione
     * IPORTANTE ------> quindi io posso accedere all utente collegato non con il metodo user ma con la proprietà user, questa capacità si chiama traversal model ossia attraversamento del modello
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);  //questo metodo mi ritorna un oggetto di classe belongsTo
          // Questo metodo ci indica che, quando richiamiamo il metodo user, 
          // ci ritorna l'utente collegato al prodotto
    }

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



    public function category(): BelongsTo
    {

        return $this->belongsTo(Category::class);

    }


//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function setAccepted($value)
     {
        //  del singolo articolo prendiamo l’attributo is_accepted e lo valorizziamo con il valore in ingresso.
        
        $this->is_accepted = $value;
        $this->save();
        return true;
     }


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



     public static function toBeRevisedCount()
     {

        return Article::where('is_accepted', null)->count();

        //   toBeRevisedCount() è un metodo statico: sarà invocato a partire dalla classe stessa Article


        //  Facciamo una query al database: della tabella  articles prendiamo solo gli articoli che nella colonna is_accepted hanno il dato null.
        //  Questa query restituirà una collezione
        
        //  A partire da questa collezione facciamo partire il metodo count() per contare gli
        //  articoli non ancora revisionati e restituire il conteggio come valore di output della funzione


        // !!!!  Ricorda: questo metodo count() e' un metodo delle collezioni. Non confonderlo con la built-in function count() di PHP. 
        // !!!!  Quando  lavoriamo su Laravel, preferiamo sempre utilizzare i suoi metodi ed helpers.
          
 


     }



//----------------------------------USER STORY 10----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



public function toSearchableArray()
{
   return [
      'id'=>$this->id,
      'title'=>$this->title,
         'description'=>$this->description,
           'category'=>$this->category

   ];

}


//  !!!!! Con $this->category stiamo richiamando la funzione di relazione con Category , non il nome di una colonna nella tabella.

// Il metodo toSearchableArray() lo uso per dire a Laravel Scout (o TNTSearch) 
// quali campi del mio modello voglio indicizzare per la ricerca.

// Se non definisco questo metodo, Laravel indicizzerebbe automaticamente tutti gli attributi,
// ma preferisco specificare solo quelli più importanti per migliorare prestazioni e precisione.

// Se voglio, posso anche aggiungere dati da relazioni, come il nome della categoria 
// da un altro modello collegato.


//----------------------------------USER STORY 10 FINE----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------







}
