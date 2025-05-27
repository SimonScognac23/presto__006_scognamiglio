<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

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
