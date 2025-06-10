<form action="{{ route('setLocale', $lang) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn">
        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" width="32" height="32" />
    </button>
</form>

{{-- 
    -----USER STORY 4-------

    Analizziamo il codice:
    come vediamo il componente è costituito da un form: l’utente cliccando la bandiera renderizzata da questo componente in realtà starà
    facendo una richiesta POST, che dobbiamo ancora sviluppare, equivalente al cambio lingua. Ricordiamoci di lasciare vuoto il campo
    dell’action.
    Nel form, come sempre, è presente il @csrf token e il bottone di submit.
    Nel bottone innestiamo un tag img che come source richiama il percorso interno al progetto per vedere l’immagine della bandiera. Il
    metodo asset(), che vediamo a riga 4, svolge un ruolo fondamentale nella gestione delle risorse statiche, come immagini, fogli di
    stile e file JavaScript. La sua funzione principale è generare URL completi per queste risorse, permettendo all'applicazione di
    accedervi e renderle correttamente nel browser dell'utente.
    Vediamo che stiamo richiamando una variabile $lang: passeremo questo dato al componente al momento del suo richiamo.
--}}



{{-- 
    -----USER STORY 4-------

  Come da punto 11..

  Abbiamo aggiunto all’attributo action la rotta appena creata, passando il dato che si aspetta $lang ,
   ovvero la lingua selezionata dall’utente.
--}}

