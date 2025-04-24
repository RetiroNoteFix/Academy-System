<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// objeto com os parametros
class Pagamento extends Model
{
    use HasFactory;

    protected $table = 'pagamentos'; //define a tabela
    protected $primaryKey = 'id'; // define chave primária
    public $incrementing = true; // auto_increment true

    // colunas do db que podem ser preenchidas em massa
    protected $fillable = [
        'id_aluno',
        'data_pagamento',
        'plano_aluno',
        'valor',
        'data_vencimento',
        'situacao',
        'pausado_em',
        'ativado_em',
    ];
// relacionamento com aluno (id_aluno) é estrangeiro em pagamentos
    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    public static function pagamentoPendente($id){

    return Pagamento::where('id_aluno', $id)->
    firstOrFail();

    }
// o Eloquent converte esses campos automaticamente em tipos php específicos (date, datetime, etc)
    protected $casts = [
        'data_pagamento' => 'datetime',
        'data_vencimento' => 'datetime',
        'pausado_em' => 'datetime',
        'ativado_em' => 'datetime',
    ];
}