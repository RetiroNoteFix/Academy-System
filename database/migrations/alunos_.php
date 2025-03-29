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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id('idAluno');
            $table->unsignedBigInteger('idPessoa')->nullable(); // Usando unsignedBigInteger para referência
            $table->string('profissao', 100)->nullable();
            $table->string('escolaridade', 100)->nullable();
            $table->string('estadoCivil', 50)->nullable();
            $table->string('tipoSanguineo', 15)->nullable();
            $table->string('modalidade', 100)->nullable();
            $table->string('comoSoubeAcademia', 255)->nullable();
            $table->string('objetivo', 255)->nullable();
            $table->string('idade', 15)->nullable();
            $table->string('peso', 15)->nullable();
            $table->string('altura', 15)->nullable();
            $table->string('fuma', 15)->nullable();
            $table->string('fazDieta', 15)->nullable();
            $table->string('usaBebidaAlcoolica', 15)->nullable();
            $table->string('sedentario', 15)->nullable();
            $table->string('modalidadeAnterior', 100)->nullable();
            $table->string('temVarizes', 15)->nullable();
            $table->string('pressaoArterial', 50)->nullable();
            $table->string('cirurgia', 15)->nullable();
            $table->string('dormeBem', 15)->nullable();
            $table->string('lesaoArticular', 15)->nullable();
            $table->string('problemaColuna', 15)->nullable();
            $table->string('tempoMedico', 255)->nullable();
            $table->string('medicamento', 255)->nullable();
            $table->string('problemaSaude', 255)->nullable();
            $table->string('parqProblemaCoracao', 15)->nullable();
            $table->string('parqDorPeitoComAtividade', 15)->nullable();
            $table->string('parqDorPeitoSemAtividade', 15)->nullable();
            $table->string('parqEquilibrio', 15)->nullable();
            $table->string('parqProblemaOsseo', 15)->nullable();
            $table->string('parqReceitaMedica', 15)->nullable();
            $table->string('parqRazao', 255)->nullable();
            $table->string('obesidade', 15)->nullable();
            $table->string('diabetes', 15)->nullable();
            $table->string('colesterolElevado', 15)->nullable();
            $table->string('infarto', 15)->nullable();
            $table->string('doencaCardiaca', 15)->nullable();
            $table->string('derrame', 15)->nullable();
            $table->string('pressaoAlta', 15)->nullable();
            $table->string('medidaTorax', 15)->nullable();
            $table->string('medidaCintura', 15)->nullable();
            $table->string('medidaAbdome', 15)->nullable();
            $table->string('medidaQuadril', 15)->nullable();
            $table->string('medidaBracos', 15)->nullable();
            $table->string('medidaAntebracos', 15)->nullable();
            $table->string('medidaPanturrilha', 15)->nullable();
            $table->string('medidaPernas', 15)->nullable();
            $table->string('observacoes', 255)->nullable();
            $table->string('percentualGordura', 15)->nullable();
            $table->string('imc', 15)->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->string('data_pagamento', 20)->nullable();
            $table->enum('situacao', ['Ativo', 'Inativo'])->default('Ativo');
            $table->enum('plano', ['Mensal', 'Trimestral', 'Anual'])->default('Mensal');
            $table->foreign('idPessoa')->references('idPessoa')->on('pessoas')->onDelete('cascade');
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
