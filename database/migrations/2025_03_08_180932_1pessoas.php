<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome', 255);
            $table->string('cpf', 255)->nullable();
            $table->string('rg', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('telefone', 255)->nullable();
            $table->string('telefone_familiar', 255)->nullable();
            $table->string('endereco', 500)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('impressao_digital', 255)->nullable();
            $table->timestamps();
        });

        DB::table('pessoas')->insert([
            'id' => 1,
            'nome' => 'SUPORTE'
        ]);
        
    }

    public function down(): void
    {
        
    }
};
