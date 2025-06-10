<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Article;


class PublicController extends Controller
{
    
    public function homepage()
    {
      //  $articles = Article::take(6)->orderBy('created_at', 'desc')->get();
      //  return view('welcome', compact('articles'));
        //In questa maniera stiamo passando una variabile articles contenente gli ultimi 6 articoli caricati in piattaforma alla vista della homepage
        // Possiamo sfruttare questa collezione per generare dianmicamente delle card, percio ci creiamo un componente card.blade


        // FUNZIONE MODIFICATA VEDI PUNTO 30 U.STORY 3

        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('welcome', compact('articles'));

    }




    
//-------------------------------------USER STORY 10----------------------------------------------------------------------------------------------------------------------------------------------------------------



public function searchArticles(Request $request)
{
    // Recupera il valore dell'input chiamato "query" dalla richiesta HTTP (tipicamente dal form di ricerca)
    $query = $request->input('query');

    // Utilizza Laravel Scout (con TNTSearch o altro driver) per cercare articoli corrispondenti alla query.
    // Applica anche un filtro per mostrare solo gli articoli accettati (is_accepted = true).
    // Infine, applica la paginazione (10 risultati per pagina).
    $articles = Article::search($query)->where('is_accepted', true)->paginate(10);

    // Ritorna la vista "article.searched" passando gli articoli trovati e la query di ricerca originale
    return view('article.searched', [
        'articles' => $articles,
        'query' => $query
    ]);
}



//  La funzione Laravel\Scout\Searchable::search è il metodo principale per eseguire ricerche sui dati indicizzati del modello in Laravel
//  Scout, quindi nel nostro caso sul modello Article . 
//  Consente di interrogare il motore di ricerca e recuperare risultati pertinenti in base al
//  termine di ricerca dell'utente.


// All’interno del metodo search() stiamo passando l’input dell’utente in chiave "query", 
// ovvero il name dell’input del form di ricerca, che
// abbiamo salvato nella variabile $query.
// Filtriamo poi il risultato della search e restituiamo in una collezione solo gli articoli 
// già accettati dal revisore, divisi per pagine.
// Alla vista stiamo passando quindi gli articoli risultanti dalla ricerca e la
// ricerca in sé effettuata dall’utente.


//-------------------------------- USER STORY 4 -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public function setLanguage($lang)
{

    session()->put('locale', $lang);
    return redirect()->back();
}

// Tramite questa funzione, stiamo creando una sessione con chiave locale e come valore $lang , il parametro in ingresso nella funzione.
// Modifichiamo quindi il componente in _locale.blade.php

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



}
