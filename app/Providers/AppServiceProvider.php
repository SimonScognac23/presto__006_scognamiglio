<?php

namespace App\Providers;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;


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
        if (Schema::hasTable('categories')) {
            View::share('categories', Category::orderBy('name')->get());

        }
    }
}

// In questa maniera stiamo controllando che esista la tabella categories e, di conseguenza, condividiamo con le viste del nostro progetto una variabile $categories, contenente la collezione delle categorie presenti nel nostro database, riordinate in ordine alfabetico
