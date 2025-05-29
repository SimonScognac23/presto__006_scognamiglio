<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class IsRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    {

        if (Auth::check() && Auth::user()->is_revisor) {   
    //  Se l’utente è autenticato E ANCHE revisore, potrà proseguire con la richiesta (ovvero visualizzare la dashboard del revisor)
            return $next($request);


        }
        
        return redirect()->route('homepage')->with('errorMessage', 'Zona riservata ai revisori');
        // Qui  diciamo che in tutti gli altri casi sarà reindirizzato alla homepage con un messaggio di errore.

    }

}
