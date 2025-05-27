<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

      /**
     * Istruiamo gli utenti per recuperare gli articoli ad essi collegati
     * Get the articles for the user. 
     * COPIATO DAL SITO LARAVEL
     * L'obiettivo di questo metodo è prendere tutti gli articles per l'user
     * LOCAL --> ELOQUENT ORM --> RELATIONSHIP 1:N
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);  
        // Qui gestiamo il metodo hasMany che deve ritornare degli articoli
        // Questo metodo ci indica che, quando richiamiamo il metodo articles, 
        // ci vengono restituiti tutti gli articoli collegati all'utente
        // L'importazione di Article non è necessaria perché i modelli si trovano nello stesso namespace
    }
}
