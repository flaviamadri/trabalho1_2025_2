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
        Schema::create('pacientes', function (Blueprint $table) {
             $table->id();
            $table->string('nome', 100);
            $table->string('cpf', 16);
            $table->string('nascimento', 10);
            $table->string('especialidade', 100);
            $table->string('telefone', 20);
            $table->string('endereco', 100)->nullable();//opcional
            $table->string('email', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
