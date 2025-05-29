<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\User;

use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;








class RevisorController extends Controller
{


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------


    public function index()
    {

        $article_to_check = Article::where('is_accepted', null)->first();
        return view ('revisor.index', compact('article_to_check'));

    }

    //  In $article_to_check stiamo salvando il primo articolo che corrisponde a questa richiesta:
    //  avere nella colonna null , e passiamo questo dato alla vista che ora creiamo.




//-----------------------------------------------------------------------------------------------------------------------------------------------------


     public function accept(Article $article)
    {

       $article->setAccepted(true);
       return redirect()
            ->back()
            ->with('message', "Hai accettato l'articolo $article->title");

    }

 

   // La funzione accept accetta in ingresso il parametro  article che con Dependency Injection 
   // sarà necessariamente un oggetto di classe Article;

   //  invochiamo il metodo setAccepted creato pocanzi, passando come argomento reale true 
   //  Infine salviamo le modifiche appena apportate all’articolo

// Stiamo quindi modificando il singolo articolo in revisione segnandolo come accettato    

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


      public function reject(Article $article)
    {

       $article->setAccepted(false);
       return redirect()
            ->back()
            ->with('message', "Hai rifiutato l'articolo $article->title");

            //   Come vediamo la logica è uguale alla funzione precedente, 
            // con la differenza che stiamo passando false come parametro alla funzione setAccepted() 

    }


 //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------   


public function becomeRevisor(){

    Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
    return redirect()->route('homepage')->with('message', 'Complimenti, Hai richiesto di diventare revisor');

}


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

public function makeRevisor(User $user)

{

    Artisan::call('app:make-user-revisor', ['email' => $user->email]);
    return redirect()->back();

    //Tramite la classe Artisan stiamo facendo partire il comando MakeUserRevisor creato precedentemente, 
    // a cui passiamo la mail dell'utente
 

}


//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


}




