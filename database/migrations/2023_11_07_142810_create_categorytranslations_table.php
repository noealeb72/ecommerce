<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorytranslationsTable extends Migration
{

    public function up()
    {
        Schema::create('category_translation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('language_code'); //'en', 'es', 'br'
            $table->string('name');
            $table->string('slug');
            $table->boolean('estado')->default(true);
            $table->timestamps();

            // Establece la clave foránea para relacionarla con la tabla de categorías
            $table->foreign('category_id')->references('id')->on('categories');

            // Define una restricción única para evitar duplicados
            $table->unique(['category_id', 'language_code']);
        });
    }


    public function down()
    {
        Schema::dropIfExists('category_translation');
    }
}
