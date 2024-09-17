<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('name'); // Nome do produto
            $table->text('description')->nullable(); // Descrição do produto
            $table->decimal('price', 8, 2); // Preço do produto
            $table->integer('quantity'); // Quantidade em estoque
            $table->timestamps(); // Criado em, atualizado em
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
