<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'alunos';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'id',
        //// Dados gerais do aluno (perfil físico e objetivo)
        'tipo_sanguineo',
        'modalidade',
        'como_soube_da_academia',
        'objetivo',
        // Informações físicas e hábitos
        'peso',
        'altura',
        'fuma',
        'faz_dieta',
        'usa_bebida_alcoolica',
        'sedentario',
        'modalidade_anterior',
         // Condições médicas e saúde geral
        'tem_varizes',
        'pressao_arterial',
        'cirurgia',
        'dorme_bem',
        'lesao_articular',
        'problema_coluna',
        'tempo_medico',
        'medicamento',
        'problema_saude',
        //parq
        'parq_problema_coracao',
        'parq_dor_peito_com_atividade',
        'parq_dor_peito_sem_atividade',
        'parq_equilibrio',
        'parq_problema_osseo',
        'parq_receita_medica',
        'parq_razao',
        // histórico familiar e doença
        'obesidade',
        'diabetes',
        'colesterol_elevado',
        'infarto',
        'doenca_cardiaca',
        'derrame',
        // medidas
        'medida_torax',
        'medida_cintura',
        'medida_abdome',
        'medida_quadril',
        'medida_bracos',
        'medida_antebracos',
        'medida_panturrilha',
        'medida_pernas',
        // obs
        'observacoes',
        // pagamento
        'valor',
        'data_pagamento',
        'situacao',
        'plano',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'data_pagamento' => 'date',
        'situacao' => 'string',
        'plano' => 'string'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }
    
    public function scopeAtivos($query)
    {
        return $query->where('situacao', 'ativo');
    }

    public function scopeInativos($query)
    {
        return $query->where('situacao', 'inativo');
    }

    public function pagamentoEmDia()
    {
        if (!$this->data_pagamento) {
            return false;
        }

        $dataPagamento = \Carbon\Carbon::createFromFormat('Y-m-d', $this->data_pagamento);
        $hoje = \Carbon\Carbon::now();

        switch ($this->plano) {
            case 'Mensal':
                return $hoje->diffInMonths($dataPagamento) < 1;
            case 'Trimestral':
                return $hoje->diffInMonths($dataPagamento) < 3;
            case 'Anual':
                return $hoje->diffInYears($dataPagamento) < 1;
            default:
                return false;
        }
    }
}