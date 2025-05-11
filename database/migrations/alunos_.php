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
            $table->string('tipo_sanguineo', 255)->nullable();
            $table->string('modalidade', 255)->nullable();
            $table->string('como_soube_da_academia', 255)->nullable();
            $table->string('objetivo', 255)->nullable();
            // Informações físicas e hábitos
            $table->string('peso', 255)->nullable();
            $table->string('altura', 255)->nullable();
            $table->string('fuma', 255)->nullable();
            $table->string('faz_dieta', 255)->nullable();
            $table->string('usa_bebida_alcoolica', 255)->nullable();
            $table->string('sedentario', 255)->nullable();
            $table->string('modalidade_anterior', 255)->nullable();
            // Condições médicas e saúde geral
            $table->string('tem_varizes', 255)->nullable();
            $table->string('pressao_arterial', 50)->nullable();
            $table->string('cirurgia', 255)->nullable();
            $table->string('dorme_bem', 255)->nullable();
            $table->string('lesao_articular', 255)->nullable();
            $table->string('problema_coluna', 255)->nullable();
            $table->string('tempo_medico', 255)->nullable();
            $table->string('medicamento', 255)->nullable();
            $table->string('problema_saude', 255)->nullable();
            //parq
            $table->string('parq_problema_coracao', 255)->nullable();
            $table->string('parq_dor_peito_com_atividade', 255)->nullable();
            $table->string('parq_dor_peito_sem_atividade', 255)->nullable();
            $table->string('parq_equilibrio', 255)->nullable();
            $table->string('parq_problema_osseo', 255)->nullable();
            $table->string('parq_receita_medica', 255)->nullable();
            $table->string('parq_razao', 255)->nullable();
            // histórico familiar e doença
            $table->string('obesidade', 255)->nullable();
            $table->string('diabetes', 255)->nullable();
            $table->string('colesterol_elevado', 255)->nullable();
            $table->string('infarto', 255)->nullable();
            $table->string('doenca_cardiaca', 255)->nullable();
            $table->string('derrame', 255)->nullable();
            // medidas
            $table->string('medida_torax', 255)->nullable();
            $table->string('medida_cintura', 255)->nullable();
            $table->string('medida_abdome', 255)->nullable();
            $table->string('medida_quadril', 255)->nullable();
            $table->string('medida_bracos', 255)->nullable();
            $table->string('medida_antebracos', 255)->nullable();
            $table->string('medida_panturrilha', 255)->nullable();
            $table->string('medida_pernas', 255)->nullable();
            // obs
            $table->string('observacoes', 255)->nullable();
            // pagamento
            $table->enum('situacao', ['ativo', 'inativo'])->default('ativo');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
       
    }
};
