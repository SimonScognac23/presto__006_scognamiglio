<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\IsRevisor; 
use App\Http\Middleware\SetLocaleMiddleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    //--------------------------------------   USER STORY 3--------------------------------------------------------------------------------------------------------------------------------    
    ->withMiddleware(function (Middleware $middleware) {
        
        //   Perché il middleware funzioni, però, dobbiamo registrarlo in bootstrap/app.php in questa maniera
        
        $middleware->alias([
            'isRevisor' => IsRevisor::class
        ]);
        
    })






    //----------------------------------------USER STORY 4--------------------------------------------------------------------------------------------------------------------------------------------------------------------

    ->withMiddleware(function (Middleware $middleware){
        $middleware->web(append: [SetLocaleMiddleware::class]);
        $middleware->alias([
            'isRevisor' => IsRevisor::class
        ]);
    })

    //Mentre in precedenza abbiamo utilizzato il metodo alias per il middleware IsRevisor ,
    //  per questo middleware abbiamo bisogno di
    // richiamare il metodo web().

    /**
     * Questo metodo si occupa specificatamente del gruppo middleware "web".
     * 
     * Il gruppo middleware "web" è una raccolta predefinita di middleware comunemente usati
     * per le rotte dell'applicazione web in Laravel, come la gestione della sessione, CSRF, ecc.
     * 
     * Il metodo "web" viene utilizzato con l'opzione "append". Questa opzione ci consente
     * di aggiungere il nostro middleware personalizzato al gruppo middleware "web" esistente,
     * per la rotta o il gruppo di rotte in cui viene applicato questo codice.
     * 
     * In questa maniera non dovremo specificare una o più rotte a cui associare il middleware appena creato,
     * ma esso verrà eseguito automaticamente per tutte le rotte che usano il gruppo "web".
     */

    //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------




    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
