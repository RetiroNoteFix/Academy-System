<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    protected $primaryKey = 'id';
    public $incrementing = true;
 
    protected $fillable = [
        'nome', 'cpf', 'rg', 'email', 'telefone',
        'telefone_familiar', 'endereco', 'data_nascimento'
    ];

    public $timestamps = true;
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_pessoa', 'id');
    }
}
