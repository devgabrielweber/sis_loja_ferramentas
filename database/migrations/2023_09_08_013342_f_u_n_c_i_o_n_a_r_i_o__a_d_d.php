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
        Schema::create('funcionarios',function (Blueprint $table){
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->string('salario');
            $table->string('cargo');
            $table->string('telefone');
            $table->string('email');
            $table->string('endereco');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
