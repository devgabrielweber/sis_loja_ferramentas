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

        Schema::disableForeignKeyConstraints();

        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('cliente');
            $table->float('preco');
            $table->timestamps();
        });

        Schema::create('pedido_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedido');
            $table->foreignId('ferramenta_id')->constrained('ferramentas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_pessoas');
    }
};
