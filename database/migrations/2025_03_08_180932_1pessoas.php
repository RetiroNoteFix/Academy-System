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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id('idPessoa');
            $table->string('nome', 100);
            $table->string('cpf', 15)->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('telefone_familiar', 50)->nullable();
            $table->date('dataNascimento')->nullable();
            $table->dateTime('dataCadastro')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('endereco', 255)->nullable();
        
            $table->timestamps();
        });

        DB::table('pessoas')->insert([
            'idPessoa' => 1,
            'nome' => 'SUPORTE'
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
