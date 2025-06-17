<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;






//--------------------------------------------USER STORY 5-----------------------------------------------------------------------------------------------------------------------------

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();

            $table->string('path')->nullable();  //  Aggiunta
            $table->unsignedBigInteger('article_id')->nullable();  // Aggiunta --> Chiave esterna
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade'); // Aggiunta


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};


// Abbiamo creato:
//                   una colonna path che accetta come tipo di dato string
//                   una colonna article_id che accetterà la foreign key relativa alla tabella articles

