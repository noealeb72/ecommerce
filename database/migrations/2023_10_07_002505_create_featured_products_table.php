<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedProductsTable extends Migration
{

    public function up()
    { //producto destacado
        Schema::create('featured_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->unique();
            $table->boolean('is_best_seller')->default(false); // Por defecto, no es el más vendido
            $table->boolean('is_new')->default(false); // Por defecto, no es nuevo
            $table->boolean('has_discount')->default(false); // Por defecto, no tiene descuento
            $table->date('start_date')->nullable(); // Fecha de inicio (puede ser nula)
            $table->date('end_date')->nullable();   // Fecha de finalización (puede ser nula)
            $table->timestamps();
            // Establece la clave foránea para relacionarla con la tabla de productos
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('featured_products');
    }
}
