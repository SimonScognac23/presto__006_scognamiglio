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

}
