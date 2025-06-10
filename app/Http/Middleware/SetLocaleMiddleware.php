<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    /**
     *   -----------------------------USER STORY 4---------------------------------------------------------------
     * Cosa abbiamo fatto:
     *
     * All'interno del metodo handle, a riga 38, il codice recupera la lingua preferita
     * dalla sessione dell'utente utilizzando session('locale', 'it').
     *
     * La parte session('locale') tenta di ottenere il valore associato alla chiave "locale"
     * dallo storage della sessione. Se non esiste alcun valore per "locale" nella sessione,
     * viene utilizzato il valore predefinito "it" (italiano).
     *
     * A riga 39, la lingua recuperata ($localeLanguage) viene quindi passata al metodo App::setLocale.
     * Questo metodo imposta la lingua corrente dell'applicazione sulla lingua scelta.
     *
     * Infine, il middleware chiama la closure $next. Ciò consente essenzialmente alla richiesta di
     * continuare l'elaborazione attraverso la catena del middleware e raggiungere la rotta o
     * il controller previsti.
     *
     * In sostanza, questo middleware controlla la sessione dell'utente per trovare una lingua
     * preferita e imposta di conseguenza la lingua dell'applicazione per ogni richiesta.
     * Questo garantirà che gli utenti vedano contenuti e messaggi nella loro lingua preferita
     * in base ai dati della sessione.
     */

    public function handle(Request $request, Closure $next): Response
    {
        $localeLanguage = session('locale', 'it');
        App::setLocale($localeLanguage);

        return $next($request);
    }
}
