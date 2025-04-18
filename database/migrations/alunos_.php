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
            //relacionamento com pessoa
            $table->id();
            $table->unsignedBigInteger('id_pessoa')->nullable();
            $table->foreign('id_pessoa')->references('id')->on('pessoas')->onDelete('cascade');
            // Dados gerais do aluno (perfil físico e objetivo)
            $table->string('tipo_sanguineo', 15)->nullable();
            $table->string('modalidade', 100)->nullable();
            $table->string('como_soube_da_academia', 255)->nullable();
            $table->string('objetivo', 255)->nullable();
            // Informações físicas e hábitos
            $table->string('peso', 15)->nullable();
            $table->string('altura', 15)->nullable();
            $table->string('fuma', 15)->nullable();
            $table->string('faz_dieta', 15)->nullable();
            $table->string('usa_bebida_alcoolica', 15)->nullable();
            $table->string('sedentario', 15)->nullable();
            $table->string('modalidade_anterior', 100)->nullable();
            // Condições médicas e saúde geral
            $table->string('tem_varizes', 15)->nullable();
            $table->string('pressao_arterial', 50)->nullable();
            $table->string('cirurgia', 15)->nullable();
            $table->string('dorme_bem', 15)->nullable();
            $table->string('lesao_articular', 15)->nullable();
            $table->string('problema_coluna', 15)->nullable();
            $table->string('tempo_medico', 255)->nullable();
            $table->string('medicamento', 255)->nullable();
            $table->string('problema_saude', 255)->nullable();
            //parq
            $table->string('parq_problema_coracao', 15)->nullable();
            $table->string('parq_dor_peito_com_atividade', 15)->nullable();
            $table->string('parq_dor_peito_sem_atividade', 15)->nullable();
            $table->string('parq_equilibrio', 15)->nullable();
            $table->string('parq_problema_osseo', 15)->nullable();
            $table->string('parq_receita_medica', 15)->nullable();
            $table->string('parq_razao', 255)->nullable();
            // histórico familiar e doença
            $table->string('obesidade', 15)->nullable();
            $table->string('diabetes', 15)->nullable();
            $table->string('colesterol_elevado', 15)->nullable();
            $table->string('infarto', 15)->nullable();
            $table->string('doenca_cardiaca', 15)->nullable();
            $table->string('derrame', 15)->nullable();
            // medidas
            $table->string('medida_torax', 15)->nullable();
            $table->string('medida_cintura', 15)->nullable();
            $table->string('medida_abdome', 15)->nullable();
            $table->string('medida_quadril', 15)->nullable();
            $table->string('medida_bracos', 15)->nullable();
            $table->string('medida_antebracos', 15)->nullable();
            $table->string('medida_panturrilha', 15)->nullable();
            $table->string('medida_pernas', 15)->nullable();
            // obs
            $table->string('observacoes', 255)->nullable();
            // pagamento
            $table->decimal('valor', 10, 2)->nullable();
            $table->date('data_pagamento')->nullable();
            $table->enum('situacao', ['ativo', 'inativo'])->default('ativo');
            $table->enum('plano', ['mensal', 'semestral', 'anual'])->default('mensal');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
       
    }
};
