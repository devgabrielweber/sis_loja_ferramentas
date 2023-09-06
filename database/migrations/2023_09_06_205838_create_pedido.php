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
            $table->foreignId('cliente_id')->nullable()
            ->constrained('clientes')->default(null);
            $table->float('total');
            $table->string('data');
            $table->timestamps();
        });

        Schema::create('pedido_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->nullable()->constrained('pedido')->default(null);
            $table->foreignId('ferramenta_id')->nullable()->constrained('ferramentas')->default(null);
            $table->integer('qtd');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
