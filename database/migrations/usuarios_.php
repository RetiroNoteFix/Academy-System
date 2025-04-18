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
            $table->id('id');
            $table->unsignedBigInteger('id_pessoa')->nullable();
            $table->foreign('id_pessoa')->references('id')->on('pessoas')->onDelete('cascade');
            $table->string('senha', 255);
            $table->enum('tipo_usuario', ['admin', 'funcionario'])->nullable();
            $table->timestamps();
        });
    
       
        DB::table('usuarios')->insert([
            'id' => 1,
            'id_pessoa' => 1,
            'senha' => '$2y$10$72Aun8rRTuTKjkcxGfjXSumJglXD4VmFXk55xiRldHFLzqPHtaVXa',  
            'tipo_usuario' => 'admin',
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
