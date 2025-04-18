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
            $table->string('nome', 100);
            $table->string('cpf', 15)->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('telefone_familiar', 50)->nullable();
            $table->string('endereco', 255)->nullable();
            $table->date('data_nascimento')->nullable();
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
