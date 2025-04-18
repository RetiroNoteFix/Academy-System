<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $table = 'pagamentos';
    protected $primaryKey = 'id';
    public $incrementing = true;

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

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    protected $casts = [
        'data_pagamento' => 'datetime',
        'data_vencimento' => 'datetime',
        'pausado_em' => 'datetime',
        'ativado_em' => 'datetime',
    ];
}