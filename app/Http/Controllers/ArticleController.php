<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Models\Article; 

class ArticleController extends Controller implements HasMiddleware
{
    public function create()
    {
        return view('article.create');
    }

///////////////////////////////////////////////////////////////////////////////////////////

    /*
        Alla vista 'article.index' stiamo passando gli articoli della nostra piattaforma,
        ordinati in ordine decrescente di creazione (dal più recente, quindi).
        Stiamo inoltre impostando la paginazione della vista: vedremo 6 articoli per pagina.

        Di default, la paginazione di Laravel utilizza TailwindCSS, ma può funzionare anche con Bootstrap.
        Per poter sfruttare la paginazione con Bootstrap, dobbiamo specificarlo nel file AppServiceProvider.php.
    */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('article.index', compact('articles'));
    }

///////////////////////////////////////////////////////////////////////////////////////////

    /*
        A questa richiesta GET corrisponde una risposta gestita dalla funzione show() 
        in ArticleController.php, che accetta in ingresso un oggetto di classe Article. 
        Questo oggetto viene passato come dato alla vista.
    */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

///////////////////////////////////////////////////////////////////////////////////////////

    /*
        Stiamo richiamando il metodo statico 'middleware' che restituisce un array contenente 
        tutti i middleware che vogliamo applicare alle funzioni di questo controller.

        Siccome per il momento vogliamo proteggere solo la funzione 'create', lo specifichiamo qui.

        Ricorda che il controller deve implementare l'interfaccia HasMiddleware e importare 
        le relative classi per farlo funzionare correttamente.
    */
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create']),
        ];
    }

///////////////////////////////////////////////////////////////////////////////////////////
   

/* 
Alla vista article/bycategory.blade.php. stiamo passando due dati:

    - Gli articoli relazionati alla categoria scelta in una variabile chiamata $$articles
    - La singola categoria, parametro in ingresso nella funzione, in una variabile chiamata $$category
*/

    public function byCategory(Category $category)
    {
        return view('article.byCategory', ['articles' => $category->articles, 'category'=> $category]);


    }

}
