<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Specifica che la paginazione di Laravel deve usare Bootstrap
        Paginator::useBootstrap();

        /*
            In questo modo controlliamo che esista la tabella 'categories'.
            Se esiste, condividiamo con tutte le viste del progetto una variabile $categories,
            contenente la collezione delle categorie presenti nel database, ordinate alfabeticamente.
        */
        if (Schema::hasTable('categories')) {
            View::share('categories', Category::orderBy('name')->get());
        }
    }
}

