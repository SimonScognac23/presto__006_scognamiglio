<?php

namespace Database\Seeders;

// Importiamo il modello Category
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


// creiamo un attributo pubblico contenente un array con le categorie che vogliamo avere nel nostro sito
class DatabaseSeeder extends Seeder
{
 public $categories = [
    'elettronica',
    'moda',
    'animali domestici',
    'motori',
    'sport',
    'libri e riviste',
    'casa e giardino',
    'giocattoli',
    'informatica',
    'telefonia',
    'salute e bellezza',
    'musica e strumenti musicali',
    'film e serie TV',
    'collezionismo',
    'videogiochi',
    'fai da te',
    'alimentari',
    'arte e artigianato'
];


    public function run(): void
    {
        foreach ($this->categories as $category) {
            // Per ognuna delle categorie elencate nell'array creiamo un oggetto di classe Category,
            // e poi per invocare la funzione run lanciamo il comando php artisan db:seed 
            Category::create([
                'name' => $category
            ]);
        }
    }
}

// per invocare la funzione run dobbiamo lanciare il comando php artisan db:seed
