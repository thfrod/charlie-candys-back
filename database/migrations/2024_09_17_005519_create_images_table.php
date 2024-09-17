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
        Schema::create('images', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->unsignedBigInteger('product_id'); // Chave estrangeira para a tabela de produtos
            $table->string('path'); // Caminho da imagem
            $table->string('description')->nullable(); // Descrição da imagem, opcional
            $table->timestamps();

            // Define a relação de chave estrangeira
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
