<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlunoController extends Controller
{
    public function cadastrar(Request $request)
    {
            DB::beginTransaction();
            try {
                // Validação dos dados
                $validated = $request->validate([
                    // Dados Pessoa
                    'nome' => 'required|string|max:255',
                    'cpf' => 'nullable|string|max:14',
                    'rg' => 'nullable|string|max:14',
                    'email' => 'nullable|email',
                    'telefone' => 'nullable|string|max:20',
                    'telefone_familia' => 'nullable|string|max:20',
                    'data_nascimento' => 'nullable|date',
                    'rua' => 'nullable|string|max:50',
                    'numero' => 'nullable|string|max:50',
                    'complemento' => 'nullable|string|max:50',
                    'bairro' => 'nullable|string|max:50',
                    'cidade' => 'nullable|string|max:50',
                    'estado' => 'nullable|string|max:50',
                    'cep' => 'nullable|string|max:50',
                    // Dados aluno
                    'tipo_sanguineo' => 'nullable|string|max:50',
                    'modalidade_atual' => 'nullable|string|max:50',
                    'soubeDa_academia' => 'nullable|string|max:50',
                    'objetivo' => 'nullable|string|max:50',
                    'idade' => 'nullable|string|max:50',
                    'peso' => 'nullable|string|max:50',
                    'altura' => 'nullable|string|max:50',
                    'fumar' => 'nullable|string|max:50',
                    'faz_dieta' => 'nullable|string|max:50',
                    'bebida_alcoolica' => 'nullable|string|max:50',
                    'sedentario' => 'nullable|string|max:50',
                    'jaFez_modalidade' => 'nullable|string|max:50',
                    'varizes' => 'nullable|string|max:50',
                    'pressao_arterial' => 'nullable|string|max:50',
                    'cirurgia' => 'nullable|string|max:50',
                    'dorme_bem' => 'nullable|string|max:50',
                    'lesao_articular' => 'nullable|string|max:50',
                    'lesao_detalhes' => 'nullable|string|max:50',
                    'problema_coluna' => 'nullable|string|max:50',
                    'coluna_detalhes' => 'nullable|string|max:50',
                    'tempo_sem_medico' => 'nullable|string|max:50',
                    'uso_medicamento' => 'nullable|string|max:50',
                    'problema_saude' => 'nullable|string|max:50',
                    'par_q1' => 'nullable|string|max:50',
                    'par_q2' => 'nullable|string|max:50',
                    'par_q3' => 'nullable|string|max:50',
                    'par_q4' => 'nullable|string|max:50',
                    'par_q5' => 'nullable|string|max:50',
                    'par_q6' => 'nullable|string|max:50',
                    'par_q7' => 'nullable|string|max:50',
                    'obesidade' => 'nullable|string|max:50',
                    'diabetes' => 'nullable|string|max:50',
                    'colesterol_elevado' => 'nullable|string|max:50',
                    'infarto' => 'nullable|string|max:50',
                    'doenca_cardiaca' => 'nullable|string|max:50',
                    'doenca_detalhes' => 'nullable|string|max:50',
                    'derrame' => 'nullable|string|max:50',
                    'torax' => 'nullable|string|max:50',
                    'cintura' => 'nullable|string|max:50',
                    'abdome' => 'nullable|string|max:50',
                    'quadril' => 'nullable|string|max:50',
                    'bracos' => 'nullable|string|max:50',
                    'antebracos' => 'nullable|string|max:50',
                    'panturrilha' => 'nullable|string|max:50',
                    'pernas' => 'nullable|string|max:50',
                    'obsmedida' => 'nullable|string|max:50',
                    'valor' => 'required|string|max:50',
                    'dataPagamento' => 'required|string|max:50',
                    'situacao' => 'nullable|string|max:50',
                    'plano' => 'required|in:Mensal,Trimestral,Anual',
                ]);

                //formatando o endereço
                $endereco = implode(', ', array_filter([
                    $request->rua, 
                    $request->numero, 
                    $request->complemento, 
                    $request->bairro, 
                    $request->cidade . '-' . $request->estado, 
                    $request->cep
                ]));
                // 1. Cadastro da Pessoa
                $pessoa = Pessoa::create([
                    'nome' => $request->nome,
                    'cpf' => $request->cpf,
                    'rg' => $request->rg,
                    'email' => $request->email,
                    'telefone' => $request->telefone,
                    'telefone_familiar' => $request->telefone_familia,
                    'dataNascimento' => $request->data_nascimento,
                    'endereco' => $endereco, 
                ]);
                
                // 2. Cadastro do Aluno
                $aluno = Aluno::create([

                    'idPessoa' => $pessoa->idPessoa,
    'fuma' => $request->fumar,
    'fazDieta' => $request->faz_dieta,
    'usaBebidaAlcoolica' => $request->bebida_alcoolica,
    'sedentario' => $request->sedentario,
    'modalidadeAnterior' => $request->jaFez_modalidade,
    'temVarizes' => $request->varizes,
    'pressaoArterial' => $request->pressao_arterial,
    'cirurgia' => $request->cirurgia,
    'dormeBem' => $request->dorme_bem,
    'lesaoArticular' => $request->lesao_articular . ' ' . $request->lesao_detalhes,
    'problemaColuna' => $request->problema_coluna . ' ' . $request->coluna_detalhes,
    'tempoMedico' => $request->tempo_sem_medico,
    'medicamento' => $request->uso_medicamento,
    'problemaSaude' => $request->problema_saude,
    'parqProblemaCoracao' => $request->par_q1,
    'parqDorPeitoComAtividade' => $request->par_q2,
    'parqDorPeitoSemAtividade' => $request->par_q3,
    'parqEquilibrio' => $request->par_q4,
    'parqProblemaOsseo' => $request->par_q5,
    'parqReceitaMedica' => $request->par_q6,
    'parqRazao' => $request->par_q7,
    'obesidade' => $request->obesidade,
    'diabetes' => $request->diabetes,
    'colesterolElevado' => $request->colesterol_elevado,
    'infarto' => $request->infarto,
    'doencaCardiaca' => $request->doenca_cardiaca . ' ' . $request->doenca_detalhes,
    'derrame' => $request->derrame,
    'medidaTorax' => $request->torax,
    'medidaCintura' => $request->cintura,
    'medidaAbdome' => $request->abdome,
    'medidaQuadril' => $request->quadril,
    'medidaBracos' => $request->bracos,
    'medidaAntebracos' => $request->antebracos,
    'medidaPanturrilha' => $request->panturrilha,
    'medidaPernas' => $request->pernas,
    'tipoSanguineo' => $request->tipo_sanguineo,
    'modalidade' => $request->modalidade_atual,
    'comoSoubeAcademia' => $request->soubeDa_academia,
    'objetivo' => $request->objetivo_atividade_fisica,
    'idade' => $request->idade,
    'peso' => $request->peso,
    'altura' => $request->altura,
    'observacoes' => $request->obsmedida, 
    // convertendo valor para decimal
    $valor = $request->valor,
    $valor = str_replace(['R$', ' '], '', $valor),
    $valor = str_replace(',', '.', $valor), 
    'valor' => floatval($valor),
 'data_pagamento' => Carbon::parse($request->dataPagamento)->format('Y-m-d'),
    'situacao' => "ativo",
    'plano' => $request->plano,
                      
                ]);
                
                DB::commit();
                
                return response()->json([
                    'success' => true,
                    'pessoa_id' => $pessoa->idPessoa,
                    'aluno_id' => $aluno->idAluno,
                    'message' => 'Cadastro realizado com sucesso!'
                ]);
                
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'error' => 'Erro no cadastro: ' . $e->getMessage()
                ], 500);
            }
    }

    public function listar()
    {
        $alunos = Aluno::with('pessoa')->where('situacao', 'ativo')->get();
        $alunosoff = Aluno::with('pessoa')->where('situacao', 'inativo')->get();
        return view('alunos.index', compact('alunos', 'alunosoff'));
}

public function pessoa()
{
    return $this->belongsTo(Pessoa::class, 'idPessoa', 'idPessoa');
}

public function desativar($id)
{
    try {
        $aluno = Aluno::findOrFail($id);
        $aluno->situacao = "Inativo"; 
        $aluno->save();

        return response()->json(['message' => 'Aluno desativado com sucesso.']);
    } catch (\Exception $e) {
        \Log::error('Erro ao desativar aluno: ' . $e->getMessage());
        return response()->json(['error' => 'Erro ao desativar aluno.'], 500);
    }
}

public function ativar($id)
{
    try {
        $aluno = Aluno::findOrFail($id);
        $aluno->situacao = "Ativo"; 
        $aluno->save();

        return response()->json(['message' => 'Aluno ativado com sucesso.']);
    } catch (\Exception $e) {
        \Log::error('Erro ao ativar aluno: ' . $e->getMessage());
        return response()->json(['error' => 'Erro ao ativar aluno.'], 500);
    }
}


}