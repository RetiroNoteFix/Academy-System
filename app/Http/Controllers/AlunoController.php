<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Aluno;
use App\Models\Pagamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AlunoController extends Controller
{
    public function cadastrar(Request $request)
    {
        dd($request);
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
                    'telefone_familiar' => 'nullable|string|max:20',
                    'rua' => 'nullable|string|max:50',
                    'numero' => 'nullable|string|max:50',
                    'complemento' => 'nullable|string|max:50',
                    'bairro' => 'nullable|string|max:50',
                    'cidade' => 'nullable|string|max:50',
                    'estado' => 'nullable|string|max:50',
                    'cep' => 'nullable|string|max:50',
                    'data_nascimento' => 'nullable|date',
                  
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
    'lesaoArticular' => empty($request->lesao_articular) && empty($request->lesao_detalhes)
    ? null
    : trim(($request->lesao_articular ?? '') . ' ' . ($request->lesao_detalhes ?? '')),
    'problemaColuna' => empty($request->problema_coluna) && empty($request->coluna_detalhes)
    ? null
    : trim(($request->problema_coluna ?? '') . ' ' . ($request->coluna_detalhes ?? '')),
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
    'doencaCardiaca' => empty($request->doenca_cardiaca) && empty($request->doenca_detalhes)
    ? null
    : trim(($request->doenca_cardiaca ?? '') . ' ' . ($request->doenca_detalhes ?? '')),
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
        $usuarioNome = Session::get('usuario_nome');

        $alunos = Aluno::with('pessoa')->where('situacao', 'ativo')->get();
        $alunosoff = Aluno::with('pessoa')->where('situacao', 'inativo')->get();
        return view('alunos.index', compact('alunos', 'alunosoff', 'usuarioNome'));
}

public function listarPendentes()
{
    $usuarioNome = Session::get('usuario_nome');

    $pagamentos = Pagamento::where('situacao', 'pendente')->get();
    foreach ($pagamentos as $pagamento){

        $pendente = $pagamento->situacao;
        
        if ($pendente === "pendente"){
            $pendente = "PENDENTE";
        }
        else {
            $pendente = $pagamentos->situacao;
        }

    }


    return view('inicio.index', compact('pagamentos', 'usuarioNome', 'pendente'));
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

        return response()->json(['message' => 'Aluno(a) desativado com sucesso.']);
    } catch (\Exception $e) {
        \Log::error('Erro ao desativar Aluno(a): ' . $e->getMessage());
        return response()->json(['error' => 'Erro ao desativar Aluno(a).'], 500);
    }
}

public function ativar($id)
{
    try {
        $aluno = Aluno::findOrFail($id);
        $aluno->situacao = "Ativo"; 
        $aluno->save();

        return response()->json(['message' => 'Aluno(a) ativado com sucesso.']);
    } catch (\Exception $e) {
        \Log::error('Erro ao ativar Aluno(a): ' . $e->getMessage());
        return response()->json(['error' => 'Erro ao ativar Aluno(a).'], 500);
    }
}

public function apagar($id)
{
    try {
        $aluno = Aluno::findOrFail($id);
        $idPessoa = $aluno->idPessoa;
        $aluno->delete();
        Pessoa::findOrFail($idPessoa)->delete();

        return response()->json(['message' => 'Aluno e seus dados foram apagados com sucesso.']);
    } catch (\Exception $e) {
        \Log::error('Erro ao apagar aluno: ' . $e->getMessage());
        return response()->json(['error' => 'Erro ao apagar aluno.'], 500);
    }
}


public function visualizar(Request $request, $id)
{
    try {
        // Buscar aluno pelo ID, incluindo os dados da pessoa relacionada
        $aluno = Aluno::with('pessoa')->findOrFail($id);  // A relação 'pessoa' deve estar definida no modelo Aluno
        
        // Retornar os dados combinados de Aluno e Pessoa
        return response()->json([
            // dados pessoa
            'idaluno' => $aluno->idAluno,
            'nome' => $aluno->pessoa->nome,
            'cpf' => $aluno->pessoa->cpf,
            'rg' => $aluno->pessoa->rg,
            'email' => $aluno->pessoa->email,
            'telefone' => $aluno->pessoa->telefone,
            'telefone_familia' => $aluno->pessoa->telefone_familiar,
            'data_nascimento' => $aluno->pessoa->dataNascimento,
            'endereco' => $aluno->pessoa->endereco,
            'idade' => $aluno->idade,
            'email' => $aluno->pessoa->email,
            // dados aluno
            'cirurgia' => $aluno->cirurgia,
            'dorme_bem' => $aluno->dormeBem,
            'lesao_detalhes_input' => $aluno->lesaoArticular,
            'coluna_detalhes_input' => $aluno->problemaColuna,
            'tempo_sem_medico' => $aluno->tempoMedico,
            'uso_medicamento' => $aluno->medicamento,
            'problema_saude' => $aluno->problemaSaude,
            'varizes' => $aluno->temVarizes,
            'infarto' => $aluno->infarto,
            'doenca_detalhes_input' => $aluno->doencaCardiaca,
            'derrame' => $aluno->derrame,
            'diabetes' => $aluno->diabetes,
            'obesidade' => $aluno->obesidade,
            'colesterol_elevado' => $aluno->colesterolElevado,
            'input_sim1' => $aluno->parqProblemaCoracao,
            'input_sim2' => $aluno->parqDorPeitoComAtividade,
            'input_sim3' => $aluno->parqdorPeitoSemAtividade,
            'input_sim4' => $aluno->parqEquilibrio,
            'input_sim5' => $aluno->parqProblemaOsseo,
            'input_sim6' => $aluno->parqReceitaMedica,
            'input_sim7' => $aluno->parqRazao,
            'modalidade_atual' => $aluno->modalidade,
            'objetivo_atividade_fisica' => $aluno->objetivo,
            'soubeDa_academia' => $aluno->comoSoubeAcademia,
            'peso' => $aluno->peso,
            'tipo_sanguineo' => $aluno->tipoSanguineo,
            'pressao_arterial' => $aluno->pressaoArterial,
            'fumar' => $aluno->fuma,
            'faz_dieta' => $aluno->fazDieta,
            'bebida_alcoolica' => $aluno->usaBebidaAlcoolica,
            'sedentario' => $aluno->sedentario,
            'altura' => $aluno->altura,
            'torax' => $aluno->medidaTorax,
            'cintura' => $aluno->medidaCintura,
            'abdome' => $aluno->medidaAbdome,
            'quadril' => $aluno->medidaQuadril,
            'bracos' => $aluno->medidaBracos,
            'antebracos' => $aluno->medidaAntebracos,
            'pernas' => $aluno->medidaPernas,
            'panturrilha' => $aluno->medidaPanturrilha,
            'observacoes' => $aluno->observacoes,
            'data_pagamento' => $aluno->data_pagamento,
          
            

            

            


            'situacao' => $aluno->situacao,
            
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Aluno não encontrado!'], 404);
    }
}


public function editar(Request $request)
{
    try {
        // Valida os dados
        $validated = $request->validate([
            // Dados Pessoa
            'nome' => 'required|string|max:255',
            'cpf' => 'nullable|string|max:14',
            'rg' => 'nullable|string|max:14',
            'idalunoedit' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'telefone' => 'nullable|string|max:20',
            'telefone_familia' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
            'endereco' => 'nullable|string|max:255',
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

        // Tudo validado com sucesso
        return response()->json([
            'status' => 'success',
            'mensagem' => 'Dados validados com sucesso.',
            'data' => $validated
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'status' => 'error',
            'mensagem' => 'Erro na validação.',
            'erros' => $e->errors()
        ], 422);
    }
}
}