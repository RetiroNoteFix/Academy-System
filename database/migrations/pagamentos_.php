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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_aluno')->nullable();
            $table->foreign('id_aluno')->references('id')->on('alunos')->onDelete('cascade');
            $table->date('data_pagamento')->nullable();
            $table->string('plano_aluno', 50)->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->date('data_vencimento')->nullable();
            $table->enum('situacao', ['pago', 'pendente', 'pausado', 'ignorado'])->default('pendente');
            $table->date('pausado_em')->nullable();
            $table->string('ativado_em', 50)->nullable();
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        
    }
};
