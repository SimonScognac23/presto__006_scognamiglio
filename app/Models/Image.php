<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



//-------------------------------------USER STORY 5----------------------------------------------------------------------------------------------------




class Image extends Model
{
    use HasFactory;

    protected $fillable = [

        'path'

    ];


    public function article(): BelongsTo

    {

        return $this->belongsTo(Article::class);

    }


    //  Le immagini saranno caratterizzate dal loro path e saranno legate
    //  agli articoli da una relazione 1-N: un articolo può avere tante immagini

    //  una immagine è relazionata ad un unico articolo, salvato in article_id .


    // Abbiamo quindi creato la funzione di relazione article() , in cui specifichiamo che una singola immagine appartiene a un singolo oggetto di classe Article.

    // !!! Ricordiamoci di importare le classi



}
