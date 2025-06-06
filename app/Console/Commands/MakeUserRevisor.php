<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;


class MakeUserRevisor extends Command



/// USER STORY 3 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////                        CREAZIONE DEL RUOLO REVISORE

// MIGRAZIONE

// 0     START lanciamo prima di tutto il comando   php artisan make:migration add_is_revisor_column_to_users_table


//------------------------------------------------------------------------------------------------------------------------------------------------------------

// CREAZIONE DI UN COMANDO DI AUTOMAZIONE

// 1   Lanciamo il comando   php artisan make:command MakeUserRevisor 

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 2   All’interno di questo file (ovvero MakeUserRevisor.php) per prima cosa dobbiamo modificare l’attributo 
//     $$signature , che consente di definire nome, parametri e opzioni del 
//     comando vero e proprio appena creato.

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 3   Nel nostro caso scriviamo:
//     protected $signature = 'app:make-user-revisor {email}';
//     In questa maniera stiamo dicendo che per far partire questo comando, di cui ora specificheremo la funzionalità, andrà scritto nel terminale 
//     questa riga 
//     php artisan app:make-user-revisor seguita dal parametro email 
//     Nell’attributo $description scriviamo una breve descrizione di ciò che farà il comando.

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------


// 4    Per controllare che le nostre modifiche siano andate a buon fine e il comando sia stato registrato correttamente tra quelli del nostro 
//      applicativo, possiamo lanciare sul terminale:
//      1 php artisan
//      In questa maniera vedremo l’elenco di tutti i comandi disponibili, compreso il nostro, in questa maniera:
// ------->  app:  make-user-revisor  <----------------

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 5
//       Infine, modifichiamo il metodo handle() , ovvero la funzione che partirà quando questo comando verrà richiamato.

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// 6     per testare possiamo lanciare nel terminale ------>   php artisan app:make-user-revisor <emailUtente>    
//      “emailUtente” è solo un segnaposto, testate con delle mail presenti nel vostro database

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------

//  GESTIONE DELLO STATO DEGLI ARTICOLI

// 7   Avendo ora la logica per rendere un utente revisore, dobbiamo effettuare delle modifiche che riguardano, invece, l’entità degli articoli. Il 
//     revisore, dovrà, infatti, accettare o rifiutare gli articoli: dovremo quindi aggiungere una colonna alla tabella 
//     articles in cui salvare lo stato di accettazione del singolo articolo. Per fare ciò creiamo quindi una nuova migrazione:
//     ---------> php artisan make:migration add_is_accepted_column_to_articles_table   <---------

//  L’idea e' che nel campo 
//                         is_accepted nonché la logica per dropparla in caso di rollback.
//                         is_accepted ci possano essere solo tre valori:
//                                              null , se l’articolo è ancora da revisionare;
//                                              true , se l’articolo è stato accettato;
//                                              false , se l’articolo è stato rifiutato.

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 8     Andiamo in ---->add_is_accepted_column_to_articles_table.php <---- e modifichiamo il file

//----------------------------------------------------------------------------------------------------------------------------------------------------------


// 9   lanciamo ----------->php artisan migrate<----------------

//-----------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------


//   ███████╗██╗███╗   ███╗ ██████╗ ███╗   ██╗███████╗    
//   ██╔════╝██║████╗ ████║██╔═══██╗████╗  ██║██╔════╝
//   ███████╗██║██╔████╔██║██║   ██║██╔██╗ ██║█████╗  
//   ╚════██║██║██║╚██╔╝██║██║   ██║██║╚██╗██║██╔══╝  
//   ███████║██║██║ ╚═╝ ██║╚██████╔╝██║ ╚████║███████╗
//   ╚══════╝╚═╝╚═╝     ╚═╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝


//                               DASHBOARD DEI REVISORI

// 1   CREAZIONE DELLA DASHBOARD

//     Siccome nel corso del progetto svilupperemo molta logica riguardante i revisori, ha quindi senso avere un controller dedicato. 
//     Creiamolo nel terminale:
//     ----> php artisan make:controller RevisorController  <-------
//     Il revisore avrà bisogno di un’area riservata dove poter vedere gli articoli da revisionare e da qui accettarli o rifiutarli.
//     Partiamo da web.php creando un apposita rotta

//---------------------------------------------------------------------------------------------------------------------------------------------------------------

// 2   Creiamo la funzione in RevisorController chiamata public function index()

//--------------------------------------------------------------------------------------------------------------------------------------------------------------

// 3   Nella cartella views impostiamo una sottocartella revisor , con all’interno un file chiamato index.blade.php 
//     in view/revisor/index.blade.php 

//----------------------------------------------------------------------------------------------------------------------------------------------

//  LOGICA DI VALUTAZIONE ARTICOLI

// 4   Strutturiamo la logica di accettazione o rifiuto degli articoli. Quindi andiamo in Article.php e creiamo la funzione setAccepted()

//-------------------------------------------------------------------------------------------------------------------------------------------------------------

//  LOGICA DI ACCETTAZIONE ARTICOLO

// 5    In web.php costruiamo le rotte per permettere al revisore di accettare o rifiutare un articolo (usando la rotta PATCH)

//------------------------------------------------------------------------------------------------------------------------------------------------------

// 6    Andiamo quindi in RevisorController.php per creare la funzione accept() appena richiamata 
 
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//     LOGICA DI RIFIUTO ARTICOLI

// 7    Dobbiamo adesso creare la stessa logica per permettere al revisore di rifiutare l’articolo. Partiamo da web.php   ---> reject()

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// 8    creiamo la funzione relativa in RevisorController chiamata appunto reject()

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 9    DARE LA POSSIBILITA' AL REVISORE DI ACCETTARE O RIFIUTARE UNO SPECIFICO ARTICOLO

//      Modifichiamo, quindi, revisor/index.blade.php , aggiornando i form con le rotte appena create aggiungendo @@@METHOD('PATCH')

//      Sempre in @method  revisor/index.blade.php aggiungiamo anche lo snippet di codice per poter vedere il messaggio di avvenuta accettazione o rifiuto dell’articolo   ---> session ('message')


//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 10    A questo punto aggiungiamo nella navbar il collegamento per arrivare all’area del revisore

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 11    A questo punto aggiungiamo nella navbar il collegamento per arrivare all’area del revisore

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//  12    CONTEGGIO DEGLI ARTICOLI DA REVISIONARE

//   Ora vogliamo far visualizzare al revisore una notifica con il numero degli articoli da revisionare. 
//   Creiamo quindi una funzione che conti gli articoli non ancora revisionati. 
//    Quindi in Article.php creiamo -->  toBeRevisedCount()

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 13   Vogliamo far visualizzare questo numero a mo' di notifica sulla navbar. Andiamo quindi a modificare quanto impostato in precedenza

// Abbiamo quindi aggiunto uno span (nella navbar) contenente il numero restituito dalla funzione appena creata, che sarà visibile in alto a destra 
//  sull' anchor che porta alla zona revisore.

// Possiamo facilmente notare(sempre sulla navbar), però, che, tramite l’uri, anche un utente non revisore può accedere alla dashboard. Dobbiamo quindi 
// proteggerla tramite un MIDDLEWARE

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 15    IMPEDIRE L'ACCESSO A UTENTI NON REVISORI

//   Creiamo un middleware custom con il comando nel terminale:
//    php artisan make:middleware IsRevisor
//   Il middleware appena generato si troverà all’interno del percorso app\Http\Middleware .
//   Andiamo quindi a modificarlo

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 16   

//  Aggiungiamo quindi nella welcome.blade.php lo snippet per vedere il flash message che abbiamo creato in IsRevisor.php

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 17  Perché il middleware funzioni, però, dobbiamo registrarlo in bootstrap/app.php 

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 18   Infine, specifichiamo alla rotta (web.php) della dashboard del revisore che deve essere protetta dal middleware con alias isRevisor :

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------    


           
// ███╗   ███╗███████╗████████╗ █████╗ ██╗         
// ████╗ ████║██╔════╝╚══██╔══╝██╔══██╗██║          
// ██╔████╔██║█████╗     ██║   ███████║██║            
// ██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║      
// ██║ ╚═╝ ██║███████╗   ██║   ██║  ██║███████╗    
// ╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝╚══════╝   

                                           //  ██████╗  ███████╗  █████╗  ██████╗ 
                                           // ██╔═══    ██╔════╝ ██╔══██╗ ██╔══██╗
                                           // ██║  ███╗ █████╗   ███████║ ██████╔╝
                                           // ██║   ██║ ██╔══╝   ██╔══██║ ██╔═══╝ 
                                           // ╚██████╔╝ ███████╗ ██║  ██║ ██║  ██╗
                                           //  ╚═════╝  ╚══════╝ ╚═╝  ╚═╝ ╚═╝  ╚═╝



//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//  19    RICHIESTA PER DIVENTARE REVISORI

//  CREAZIONE DEL MAILABLE

// Adesso diamo la possibilità a un utente autenticato di fare domanda per diventare revisore

//  L’idea è avere nel footer, o dove preferiamo, un bottone che faccia partire una mail all’amministratore del sito con i dati dell’utente che ha 
//  fatto richiesta. Da questa mail l’amministratore potrà decidere se rendere l’utente revisore o no

            //Creiamo, dunque, questa mail:
             // php artisan make:mail BecomeRevisor

             //Come sappiamo, questo comando crea una classe figlia della Mailable , che troveremo nel percorso 
             // app\Mail .  Dunque, in app\Mail\BecomeRevisor 

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 20 Apriamo il file BecomeRevisor.php

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 21 
// Dopo aver impostato il file BecomeRevisor.php
// Dobbiamo ora quindi creare in views una sottocartella 
// chiamata mail e al suo interno la vista  become-revisor.blade.php .


//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// 22

//Per poter successivamente testare questa mail, ricordiamoci 
// di copiare le nostre credenziali di Mailtrap e inserirle nel .env in questa maniera:

                        // MAIL_MALER=smtp
                        // MAIL_HOST=sandbox.smtp.mailtrap.io
                        // MAIL_PORT=2525
                        // MAIL_USERNAME=codiceDiMailTrap
                        // MAIL_PASSWORD=codiceDiMailTrap

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//  23

//                LOGICA DI INVIO MAIL
// Creiamo ora la logica per far partire questa mail e, quindi,
//  la richiesta dell’utente di diventare revisor.
//Partiamo dalla rotta in web.php   -->becomeRevisor in web.php 

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// 24

// Scriviamo, quindi, la funzione becomeRevisor() in 
// RevisorController.

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 25 

// Ricordiamoci di importare le classi in RevisorController.php

//use App\Mail\BecomeRevisor;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Mail;

//  E di impostare nella welcome lo snippet per visualizzare il flash message --> if (session()->has('message'))

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 26

//  Per testare aggiungiamo nel footer il bottone per far partire questa logica.


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 27

//   CREAZIONE DELLA ACTION NELLA MAIL

//  in become-revisor.blade.php . abbiamo inserito il richiamo a una rotta 
// ake.revisor che non abbiamo ancora creato. Questa rotta servirà a rendere 
//effettivamente un utente revisore. Creiamola adesso in 
//web.php 

//Quindi andiamo in web.php e creiamo la rotta

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 28

// In RevisorController.php scriviamo quindi la funzione collegata:
//  Ricordiamoci di importare le classi:

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 29

// Modifichiamo, infine, become-revisor.blade.php aggiungendo il collegamento alla rotta appena creata {{make.revisor}}

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//   VISUALIZZAZIONE LIMITATA AGLI ARTICOLI ACCETTATI

// 30

//  Infine, dato che ora abbiamo articoli che possono essere accettati o meno, facciamo in modo che in piattaforma siano visibili solo gli articoli 
//  già accettati da un revisore.


//  Andiamo dunque a modificare le varie queries.

//   Partiamo dagli articoli presenti in homepage, modificando quindi la funzione

//   a) homepage() in PublicController.php 

//   b) Modifichiamo anche la funzione index() in ArticleController.php :

//   c) E, infine, la funzione byCategory() in ArticleController.php 

//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//FINE USER STORY 3



//   ███████╗██╗███╗   ███╗ ██████╗ ███╗   ██╗███████╗    
//   ██╔════╝██║████╗ ████║██╔═══██╗████╗  ██║██╔════╝
//   ███████╗██║██╔████╔██║██║   ██║██╔██╗ ██║█████╗  
//   ╚════██║██║██║╚██╔╝██║██║   ██║██║╚██╗██║██╔══╝  
//   ███████║██║██║ ╚═╝ ██║╚██████╔╝██║ ╚████║███████╗
//   ╚══════╝╚═╝╚═╝     ╚═╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝




/// USER STORY 10 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////              INSTALLAZIONE LARAVEL SCOUT & TNTSEARCH

//// 1   La User Story 10 ci richiede di implementare la ricerca full-text all’interno del nostro progetto.
//           Per fare ciò iniziamo installando laravel scout con il seguente comando sul terminale:
//     ------ composer require laravel/scout-------------

// Laravel Scout è un pacchetto che permette di aggiungere la funzionalità di ricerca 
// full-text alle applicazioni Laravel che utilizzano modelli
// Eloquent. In altre parole, aiuta a rendere i tuoi dati ricercabili.

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//  2   Pubblichiamo ora il file di configurazione di scout tramite il seguente comando:

//  ------php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"---------------


//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


//3

//Scout per funzionare ha bisogno di un driver: noi utilizzeremo TNTsearch.
//Installiamolo:

//   composer require teamtnt/laravel-scout-tntsearch-driver

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


//4

//  Una volta finito il processo di installazione iniziato da questo comando, specifichiamo
//  nel file di configurazione di scout prima pubblicato che
//  utilizzeremo TNTsearch e le caratteristiche di cui ha bisogno per funzionare.
//  In config/scout.php :

//  !!!!!!!  Lascia il codice originario di scout.php dove nello screen c'è scritto "resto del codice". Fai attenzione alle chiusure dei vari array.



//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


//4   Aggiungiamo in .env e in .env.example questa riga di codice:


//  SCOUT_DRIVER=tntsearch

//  In questa maniera stiamo specificando che utilizzeremo Scout con il driver tntsearch.
//  TNTsearch per funzionare fa una indicizzazione degli oggetti presenti nel database relativi al modello 
// che vogliamo rendere ricercabile


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//  INDICIZZARE GLI ARTICOLI

// 5 Dobbiamo quindi specificare a laravel quale modello vogliamo utilizzare,
//  grazie al trait di Scout Searchable.

//    Andiamo in Article.php :

//     ------use Searchable;----------

//  Sempre nel modello aggiungiamo la funzione ---> toSearchableArray() <--- fornitaci dal trait Searchable.
//  Questa funzione è utilizzata per
//  convertire un'istanza di modello Eloquent in un array che può essere indicizzato da un motore di ricerca
//  full-text.


//----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


// 6  Per creare questo indice dobbiamo lanciare questi comando nel terminale:

//  1 php artisan scout:flush "Percorso\Del\Modello"
//  2 php artisan scout:import"Percorso\Del\Modello"

//   Nel nostro caso quindi:
//   ------1 php artisan scout:flush "App\Models\Article"-------
//   ------2 php artisan scout:import "App\Models\Article"-------

// Il comando php artisan scout:flush rimuove tutti i record di un modello da un indice di ricerca; 
// il comando php artisan scout:import invece importa tutti i record di un modello in un indice di ricerca.

//   !!!!!!  Se effettui delle modifiche al modello indicizzato con scout, ricordati di lanciare in sequenza questi due comandi.

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 7  Per verificare lo stato di indicizzazione possiamo utilizzare questo comando:

    //  -------php artisan scout:status-------

    //  Tramite questi comandi abbiamo quindi costruito l’indice che 
    // ci servirà a fare la ricerca nel sito.
    //Dato che stiamo operando con i nostri database in locale, 
    // per evitare problemi con gli altri membri del team, ricordiamoci di aggiungere nel
    //   file ----.gitignore---- questa riga di codice:

    //  ---------->  /storage/*.index     <----------------------

    //   !!!!!  Questo passaggio e' FONDAMENTALE: dimenticarsene vuol dire affrontare merge su merge per tutto il resto del progetto

    //  serire /storage/*.index all’interno del file .gitignore
    //  e' anche una forma di protezione: all’interno degli indici, infatti,
    //  potrebbero esserci dei dati sensibili.


 //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 
 // 8 

 //   Creiamo, dunque, nella --navbar-- un FORM per consentire la ricerca:

    //  Per far sì che Scout funzioni, il name associato all’input deve essere necessariamente query

 
    

//-------------------------LOGICA DI RICERCA DEGLI ARTICOLI---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



// 9  Creiamo ora la rotta per effettuare la ricerca:  
// quindi in web.php creiamo la rotta con la funzione searchArticles



//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



//  10    E la sua funzione:  searchArticles()   ----> in PublicController.php <---------------


//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//  11  Creiamo, quindi, article/searched.blade.php 


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// 12   Infine, aggiungiamo l' action al form di ricerca nella navbar:  article.search

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// COSÌ FACENDO ABBIAMO FINITO TUTTA LA LOGICA NECESSARIA AL FUNZIONAMENTO DELLA RICERCA FULL-TEXT NEL PROGETTO.




//
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣀⣀⣀⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡠⢄⡲⠖⠛⠉⠉⠉⠉⠉⠙⠛⠿⣿⣶⣦⣄⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⠔⣡⠖⠉⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠘⣿⣿⣿⣿⣷⣦⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⠔⣡⠞⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⣿⣿⣿⣿⣿⣆⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡔⢡⣶⠏⠀⠀⠀⠀⠀⠀⣠⣴⣶⣶⣶⣶⣶⣶⣦⣄⣸⣿⣿⣿⣿⣿⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⠌⢀⣿⠏⠀⠀⠀⠀⠀⠀⠸⠿⠋⠙⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡞⠀⡼⢿⣦⣄⠠⠤⠐⠒⠒⠒⠢⠤⣄⣠⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣸⠀⠀⠀⣸⠋⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠻⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⢠⠞⠁⠀⠀⠠⠇⣀⣀⣀⣀⣀⠀⠀⠀⠀⠀⠀⠀⠀⢀⠈⠙⠛⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⢀⣴⣁⠀⣀⣤⣴⣾⣿⣿⣿⣿⡿⢿⣿⣶⣄⠀⠀⠀⠀⠀⣿⣷⠀⠀⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⣿⣿⣿⣿⣿⣿⡇⠀⢸⣿⣿⣿⡇⠘⠟⣻⣿⣧⠀⠀⠀⠀⢿⣿⣤⣼⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⣿⣿⣿⣿⣿⡿⠀⠀⠸⣿⠿⠋⠉⠁⠛⠻⠿⢿⣧⠀⠀⠀⢸⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⣿⣿⣿⡿⠋⠁⠀⢀⣄⡀⠀⠀⠀⢀⣀⣤⣴⣿⣿⣧⠀⢀⠀⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣇⠀⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⣿⣿⠏⢀⠀⢀⡴⠿⣿⣿⣷⣶⣾⣿⣿⣿⣿⣿⣿⣿⣇⠀⢷⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡄⠀⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⣿⣿⣤⣿⣷⡈⠀⠀⠀⠙⠻⣿⣿⣿⣿⠿⠛⠛⣻⣿⣿⡄⠈⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡄⠀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⢸⣿⣿⣿⣿⣿⣄⠀⠀⠀⠀⠈⠋⢉⣠⣴⣾⣿⣿⣿⣿⣷⠀⢸⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⡀⠀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⢸⣿⣿⢻⡏⢹⠙⡆⠀⠀⠀⠒⠚⢛⣉⣉⣿⣿⣿⣿⣿⣿⡇⠀⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⡀⠀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⢀⡞⠁⠉⠀⠁⠀⣄⣀⣠⣴⣶⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⣤⣈⡛⢻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⡀⠀⠀⠀⠀
//⠀⠀⠀⠀⠛⠋⠉⠉⠉⠙⠻⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⡀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠙⠻⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡷⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠉⣻⠿⠿⢿⣿⠿⠿⠋⠁⠀⠙⣿⡁⠈⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡟⠛⠋⠉⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣠⠴⠞⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣈⣹⣦⣴⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⣤⡀⠀⠀⠀⠀
//⠀⠀⠀⠀⠀⠀⠀⢀⣀⣀⣀⣀⣀⣀⣀⣀⣼⣿⣄⣀⣀⡄⠀⣀⣀⣠⣤⣶⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣦⡀⠀⠀
//⠀⠀⠀⠀⠀⢰⠿⠿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠟⠉⠀⠀⣰⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣦⡀
//⠀⠀⠀⢀⣤⣤⣤⣶⣿⣿⣿⣿⠿⠿⠟⠋⢹⠇⠀⠀⢀⣼⣿⣿⣿⣿⣿⡿⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡇
//⠀⢀⣴⣿⣿⣿⣿⣿⣿⣿⡟⠁⠀⠀⠀⢀⡏⠀⠀⢀⣾⠋⣹⣿⣿⣿⡟⠀⠀⣸⡟⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡇
//⢠⣿⣿⣿⣿⣿⣿⣿⣿⡟⠀⠀⠀⠀⠀⡼⠀⠀⢀⣾⠏⢀⣿⣿⣿⠋⠀⠀⣰⣿⣧⡀⠹⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡇

                











{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-user-revisor {email}';




    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rende un utente revisore';




    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();  // effettuiamo la ricerca dell'utente associato all'email specificata tramite il parametro 
 
        if (!$user) {   //    in caso di mancata corrispondenza nella tabella users , la funzione termina con un messaggio di errore.
            $this->error('Utente non trovato');
            return;
        }

        $user->is_revisor = true;   //  se l'utente viene trovato, il suo record viene aggiornato conferendogli lo stato di revisore.
        $user->save();
        $this->info("L'utente {$this->name} è ora revisore");


    }


}



 