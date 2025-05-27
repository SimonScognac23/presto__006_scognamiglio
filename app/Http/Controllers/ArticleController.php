<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;


class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }


    //Stiamo richiamando il metodo statico middleware che restituisce un array contentente tutti i middleware che vogliamo applicare alle funzioni di questo controller, siccome per il momento vogliamo proteggere solo la funzione create lo specifichiamo qui. dobbiamo ricordarci che il controller implementa l'interfaccia hasmiddleware e di impotare le classi per farlo funzionare

    public static function middleware():array
    {
        return[
            new Middleware('auth', only: ['create']),
        ];
    }
}
