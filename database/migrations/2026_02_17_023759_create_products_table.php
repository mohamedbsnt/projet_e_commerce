<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_products_table.php
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('category');
        $table->text('description'); // Ajout d'une description
        $table->decimal('price', 8, 2);
        $table->string('image_url');
        $table->string('product_url');
        $table->boolean('is_new')->default(false);
        
        // LA COLONNE MAGIQUE POUR L'IA
        // Pour PostgreSQL avec pgvector:
        // $table->vector('embedding', 1536)->nullable(); 
        
        // Pour MySQL ou SQLite, on simule avec TEXT
        $table->text('embedding')->nullable(); 

        $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
