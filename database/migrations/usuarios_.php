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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->unsignedBigInteger('idPessoa')->nullable();
            $table->foreign('idPessoa')->references('idPessoa')->on('pessoas')->onDelete('cascade');
            $table->string('senha', 255);
            $table->enum('tipo_usuario', ['admin', 'funcionario'])->nullable();
    
            $table->timestamps();
        });
    
       
        DB::table('usuarios')->insert([
            'idUsuario' => 1,
            'idPessoa' => 1,
            'senha' => '$2y$10$72Aun8rRTuTKjkcxGfjXSumJglXD4VmFXk55xiRldHFLzqPHtaVXa',  
            'tipo_usuario' => 'admin',
            'fotoPerfil' => null,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
