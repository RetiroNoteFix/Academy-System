<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'alunos';

    /**
     * Nome da chave primária.
     *
     * @var string
     */
    protected $primaryKey = 'idAluno';

    /**
     * Indica se os IDs são autoincrementáveis.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Atributos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'idPessoa',
        'profissao',
        'escolaridade',
        'estadoCivil',
        'tipoSanguineo',
        'modalidade',
        'comoSoubeAcademia',
        'objetivo',
        'idade',
        'peso',
        'altura',
        'fuma',
        'fazDieta',
        'usaBebidaAlcoolica',
        'sedentario',
        'modalidadeAnterior',
        'temVarizes',
        'pressaoArterial',
        'cirurgia',
        'dormeBem',
        'lesaoArticular',
        'problemaColuna',
        'tempoMedico',
        'medicamento',
        'problemaSaude',
        'parqProblemaCoracao',
        'parqDorPeitoComAtividade',
        'parqDorPeitoSemAtividade',
        'parqEquilibrio',
        'parqProblemaOsseo',
        'parqReceitaMedica',
        'parqRazao',
        'obesidade',
        'diabetes',
        'colesterolElevado',
        'infarto',
        'doencaCardiaca',
        'derrame',
        'pressaoAlta',
        'medidaTorax',
        'medidaCintura',
        'medidaAbdome',
        'medidaQuadril',
        'medidaBracos',
        'medidaAntebracos',
        'medidaPanturrilha',
        'medidaPernas',
        'observacoes',
        'percentualGordura',
        'imc',
        'valor',
        'data_pagamento',
        'situacao',
        'plano'
    ];

    /**
     * Atributos que devem ser convertidos para tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'valor' => 'decimal:2',
        'data_pagamento' => 'date',
        'situacao' => 'string',
        'plano' => 'string'
    ];

    /**
     * Relacionamento com a tabela pessoas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa', 'idPessoa');
    }

    /**
     * Escopo para alunos ativos.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAtivos($query)
    {
        return $query->where('situacao', 'Ativo');
    }

    /**
     * Escopo para alunos inativos.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInativos($query)
    {
        return $query->where('situacao', 'Inativo');
    }

    /**
     * Calcula o IMC do aluno.
     *
     * @return float|null
     */
    public function calcularIMC()
    {
        if (!$this->peso || !$this->altura) {
            return null;
        }

        $alturaMetros = str_replace(',', '.', $this->altura);
        $pesoKg = str_replace(',', '.', $this->peso);

        return round($pesoKg / ($alturaMetros * $alturaMetros), 2);
    }

    /**
     * Verifica se o aluno está com pagamento em dia.
     *
     * @return bool
     */
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