<?php

namespace App\Mail;

use App\Models\User;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BecomeRevisor extends Mailable
{
    use Queueable, SerializesModels;



    public $user;  // abbiamo l'unico attributo, $user , ovvero l’utente 
                   // che ha fatto richiesta di diventare revisore. Questa variabile sarà 
                   //  automaticamente disponibile sulla vista della mail inviata all’admin


//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user= $user;
    }


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
// la funzione envelope , letteralmente “busta”, viene utilizzata per impostare le
//  informazioni sull'intestazione di posta elettronica 
// per la mail da inviare. Queste informazioni includono il mittente, 
// il destinatario e, nel nostro caso, l'oggetto della mail 

        return new Envelope(

            subject: "Rendi revisore l'utente" . $this->user->name,

        );
    }

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    /**
     * Get the message content definition.
     */
    
// Nella funzione content(), stabiliamo il contenuto della mail, quindi che vista,
//  deve essere materialmente spedita all’admin. 


// Dobbiamo ora quindi creare in views una sottocartella 
// chiamata mail e al suo interno la vista  become-revisor.blade.php .

    public function content(): Content
    {
        return new Content(
            view: 'mail.become-revisor',
        );
    }



//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}



//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



