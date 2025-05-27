<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;



Route::get('/' ,  [PublicController::class, 'homepage'] )->name('homepage');

Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article')->middleware('auth');


Route::get('/article/index' ,  [ArticleController::class, 'index'] )->name('article.index');



// Rotta parametrica (per passare il riferimento dell'articolo)
// posso mettere o {article} oppure {id} è la stessa cosa, passerà sempre e comunque id
Route::get('show/article/{article}',  [ArticleController::class, 'show'] )->name('article.show'); // Niente middleware affinche tutti gli utenti che navigano nel sito vedano la pagina


//Rotta parametrica il cui parametro è Category
Route::get('/category/{category}',  [ArticleController::class, 'byCategory'] )->name('byCategory');
