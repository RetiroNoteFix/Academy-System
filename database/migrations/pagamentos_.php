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
            $table->id('idPagamento');
            $table->unsignedBigInteger('idAluno')->nullable();
            $table->foreign('idAluno')->references('idAluno')->on('alunos')->onDelete('cascade');
            $table->string('planoAluno', 50)->nullable();
            $table->date('dataReferencia')->nullable();
            $table->decimal('valor', 10, 2)->nullable();
            $table->date('dataPagamento')->nullable();
            $table->date('dataVencimento')->nullable();
            $table->string('situacao', 50)->nullable();
        
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
