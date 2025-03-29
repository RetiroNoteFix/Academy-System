<?php

// app/Models/Pessoa.php
// app/Models/Pessoa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    protected $primaryKey = 'idPessoa';
    public $incrementing = true;
    
    protected $fillable = [
        'nome', 'cpf', 'rg', 'email', 'telefone',
        'telefone_familiar', 'dataNascimento', 'endereco'
    ];
    
    // Garanta que os timestamps estão corretos
    public $timestamps = true;
    const CREATED_AT = 'dataCadastro';
    const UPDATED_AT = 'updated_at';


    // Relacionamento com a tabela de usuários
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'idPessoa', 'idPessoa'); // A chave estrangeira é 'idPessoa' em 'usuarios' e a chave local é 'idPessoa' em 'pessoas'
    }
}
