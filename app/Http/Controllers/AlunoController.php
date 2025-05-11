<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Aluno;
use App\Models\Pagamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
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
                    'valor' => 'required|string|max:50',
                    'data_pagamento' => 'required|date|max:50',
                    'plano' => 'required|in:mensal,semestral,anual',
                ]);

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
    'cpf' => encrypt($request->cpf),
    'rg' => encrypt($request->rg),
    'email' => encrypt($request->email),
    'telefone' => encrypt($request->telefone),
    'telefone_familiar' => encrypt($request->telefone_familia),
    'data_nascimento' => $request->data_nascimento,
    'endereco' => encrypt($endereco),
]);
                
                // 2. Cadastro do Aluno
                $aluno = Aluno::create([

                    'id_pessoa' => $pessoa->id,
                    'tipo_sanguineo' => $request->tipo_sanguineo,
                    'modalidade' => $request->modalidade_atual,
                    'como_soube_da_academia' => $request->como_soube_da_academia,
                    'objetivo' => $request->objetivo_atividade_fisica,
                    'peso' => $request->peso,
                    'altura' => $request->altura,
                    'fuma' => $request->fuma,
                    'faz_dieta' => $request->faz_dieta,
                    'usa_bebida_alcoolica' => $request->usa_bebida_alcoolica,
                    'sedentario' => $request->sedentario,
                    'modalidade_anterior' => $request->modalidade_anterior,
                    'tem_varizes' => $request->varizes,
                    'pressao_arterial' => $request->pressao_arterial,
                    'cirurgia' => $request->cirurgia,
                    'dorme_bem' => $request->dorme_bem,
                    'lesao_articular' => empty($request->lesao_articular) && empty($request->lesao_detalhes)
    ? null
    : trim(($request->lesao_articular ?? '') . ' ' . ($request->lesao_detalhes ?? '')),
                    'problema_coluna' => empty($request->problema_coluna) && empty($request->coluna_detalhes)
    ? null
    : trim(($request->problema_coluna ?? '') . ' ' . ($request->coluna_detalhes ?? '')),
                    'tempo_medico' => $request->tempo_sem_medico,
                    'medicamento' => $request->uso_medicamento,
                    'problema_saude' => $request->problema_saude,
                    'parq_problema_coracao' => $request->par_q1,
                    'parq_dor_peito_com_atividade' => $request->par_q2,
                    'parq_dor_peito_sem_atividade' => $request->par_q3,
                    'parq_equilibrio' => $request->par_q4,
                    'parq_problema_osseo' => $request->par_q5,
                    'parq_receita_medica' => $request->par_q6,
                    'parq_razao' => $request->par_q7,
                    'obesidade' => $request->obesidade,
                    'diabetes' => $request->diabetes,
                    'colesterol_elevado' => $request->colesterol_elevado,
                    'infarto' => $request->infarto,
                    'doenca_cardiaca' => empty($request->doenca_cardiaca) && empty($request->doenca_detalhes)
    ? null
    : trim(($request->doenca_cardiaca ?? '') . ' ' . ($request->doenca_detalhes ?? '')),
                    'derrame' => $request->derrame,
                    'medida-torax' => $request->torax,
                    'medida-cintura' => $request->cintura,
                    'medida-abdome' => $request->abdome,
                    'medida-quadril' => $request->quadril,
                    'medida-bracos' => $request->bracos,
                    'medida-antebracos' => $request->antebracos,
                    'medida-panturrilha' => $request->panturrilha,
                    'medida-pernas' => $request->pernas,
                    'observacoes' => $request->obs, 
                    'situacao' => "ativo",    
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


public function buscar(Request $request)
{
    $termo = $request->query('termo', '');
    $situacao = $request->query('situacao', 'ativo'); // padrão é ativo

    // Corrige o erro de ordenação e carrega os dados corretamente
    $alunos = Aluno::where('situacao', $situacao)
        ->join('pessoas', 'alunos.id_pessoa', '=', 'pessoas.id')
        ->where(function($query) use ($termo) {
            $query->where('pessoas.nome', 'LIKE', "$termo%");
        })
        ->orderBy('pessoas.nome', 'asc')
        ->select('alunos.*', 'pessoas.nome as pessoa_nome', 'pessoas.telefone as pessoa_telefone', 'pessoas.endereco as pessoa_endereco')
        ->get();

    return response()->json($alunos);
}

public function buscarInativo(Request $request)
{
    $termo = $request->query('termo', '');
    $situacao = $request->query('situacao', 'ativo'); // padrão é ativo

    // Corrige o erro de ordenação e carrega os dados corretamente
    $alunos = Aluno::where('situacao', 'inativo')
        ->join('pessoas', 'alunos.id_pessoa', '=', 'pessoas.id')
        ->where(function($query) use ($termo) {
            $query->where('pessoas.nome', 'LIKE', "$termo%");
        })
        ->orderBy('pessoas.nome', 'asc')
        ->select('alunos.*', 'pessoas.nome as pessoa_nome', 'pessoas.telefone as pessoa_telefone', 'pessoas.endereco as pessoa_endereco')
        ->get();

    return response()->json($alunos);
}

public function listar()
{
    $usuarioNome = Session::get('usuario_nome');

    
    $alunos = Aluno::select('alunos.*')
        ->join('pessoas', 'alunos.id_pessoa', '=', 'pessoas.id')
        ->where('situacao', 'ativo')
        ->orderBy('pessoas.nome', 'asc')
        ->paginate(100);

    $alunosoff = Aluno::select('alunos.*')
        ->join('pessoas', 'alunos.id_pessoa', '=', 'pessoas.id')
        ->where('situacao', 'inativo')
        ->orderBy('pessoas.nome', 'asc')
        ->paginate(100);

    return view('alunos.index', compact('alunos', 'alunosoff', 'usuarioNome'));
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
        // Inicia a transação para garantir consistência
        \DB::beginTransaction();

        // Busca o aluno pelo ID
        $aluno = Aluno::findOrFail($id);
        $idPessoa = $aluno->id_pessoa;
        
        // Apaga o aluno
        $aluno->delete();
        
        // Apaga a pessoa associada
        $pessoa = Pessoa::findOrFail($idPessoa);
        $pessoa->delete();

        // Confirma a transação
        \DB::commit();

        return response()->json(['message' => 'Apagado com sucesso']);
    } catch (\Exception $e) {
        // Reverte a transação em caso de erro
        \DB::rollBack();
        
        // Loga o erro para análise futura
        \Log::error('Erro ao apagar aluno: ' . $e->getMessage());

        // Retorna a mensagem de erro para o frontend
        return response()->json(['error' => 'Erro ao apagar aluno.'], 500);
    }
}



public function visualizar(Request $request, $id)
{
    try {
        $aluno = Aluno::with('pessoa')->findOrFail($id);  
        $pagamentos = Pagamento::where('id_aluno', $id)->firstOrFail();
       

        // Trata a descriptografia dos dados pessoais
        function safeDecrypt($value, $default = "Sem dados") {
            try {
                return Crypt::decryptString($value);
            } catch (\Exception $e) {
                return $default;
            }
        }

        // Descriptografa os dados, usando "Sem dados" para valores ausentes ou inválidos
        $nome = $aluno->pessoa->nome ?? "Sem dados";
        $cpf = safeDecrypt($aluno->pessoa->cpf);
        $rg = safeDecrypt($aluno->pessoa->rg);
        $email = safeDecrypt($aluno->pessoa->email);
        $telefone = safeDecrypt($aluno->pessoa->telefone);
        $telefone_familiar = safeDecrypt($aluno->pessoa->telefone_familiar);

        // Trata o endereço, considerando possíveis falhas na descriptografia
        $endereco = safeDecrypt($aluno->pessoa->endereco, "Sem dados, Sem dados, Sem dados, Sem dados, Sem dados, Sem dados");
        $enderecos = explode(",", $endereco);

        // Garante que todos os 6 campos estejam preenchidos
        for ($i = 0; $i < 6; $i++) {
            if (!isset($enderecos[$i]) || trim($enderecos[$i]) === "") {
                $enderecos[$i] = "Sem dados";
            }
        }

        return response()->json([
            // Dados da pessoa
            'idaluno' => $aluno->id,
            'nome' => $nome,
            'cpf' => $cpf,
            'rg' => $rg,
            'email' => $email,
            'telefone' => $telefone,
            'telefone_familia' => $telefone_familiar,
            'rua' => $enderecos[0],
            'numero' => $enderecos[1],
            'complemento' => $enderecos[2],
            'bairro' => $enderecos[3],
            'cidade' => $enderecos[4],
            'cep' => $enderecos[5],
            'data_nascimento' => $aluno->pessoa->data_nascimento ?? '',

            // Dados do aluno
            'tipo_sanguineo' => $aluno->tipo_sanguineo ?? "Sem dados",
            'modalidade_atual' => $aluno->modalidade ?? "Sem dados",
            'como_soube_da_academia' => $aluno->como_soube_da_academia ?? "Sem dados",
            'objetivo_atividade_fisica' => $aluno->objetivo ?? "Sem dados",
            'peso' => $aluno->peso ?? "Sem dados",
            'altura' => $aluno->altura ?? "Sem dados",
            'fumar' => $aluno->fuma ?? "Sem dados",
            'faz_dieta' => $aluno->faz_dieta ?? "Sem dados",
            'usa_bebida_alcoolica' => $aluno->usa_bebida_alcoolica ?? "Sem dados",
            'sedentario' => $aluno->sedentario ?? "Sem dados",
            'modalidade_anterior' => $aluno->modalidade_anterior ?? "Sem dados",
            'varizes' => $aluno->tem_varizes ?? "Sem dados",
            'pressao_arterial' => $aluno->pressao_arterial ?? "Sem dados",
            'cirurgia' => $aluno->cirurgia ?? "Sem dados",
            'dorme_bem' => $aluno->dorme_bem ?? "Sem dados",
            'lesao_detalhes_input' => $aluno->lesao_articular ?? "Sem dados",
            'coluna_detalhes_input' => $aluno->problema_coluna ?? "Sem dados",
            'tempo_sem_medico' => $aluno->tempo_medico ?? "Sem dados",
            'uso_medicamento' => $aluno->medicamento ?? "Sem dados",
            'problema_saude' => $aluno->problema_saude ?? "Sem dados",
            'input_sim1' => $aluno->parq_problema_coracao ?? "Sem dados",
            'input_sim2' => $aluno->parq_dor_peito_com_atividade ?? "Sem dados",
            'input_sim3' => $aluno->parq_dor_peito_sem_atividade ?? "Sem dados",
            'input_sim4' => $aluno->parq_equilibrio ?? "Sem dados",
            'input_sim5' => $aluno->parq_problema_osseo ?? "Sem dados",
            'input_sim6' => $aluno->parq_receita_medica ?? "Sem dados",
            'input_sim7' => $aluno->parq_razao ?? "Sem dados",
            'obesidade' => $aluno->obesidade ?? "Sem dados",
            'diabetes' => $aluno->diabetes ?? "Sem dados",
            'colesterol_elevado' => $aluno->colesterol_elevado ?? "Sem dados",
            'infarto' => $aluno->infarto ?? "Sem dados",
            'doenca_detalhes_input' => $aluno->doenca_cardiaca ?? "Sem dados",
            'derrame' => $aluno->derrame ?? "Sem dados",
            'torax' => $aluno->medida_torax ?? "Sem dados",
            'cintura' => $aluno->medida_cintura ?? "Sem dados",
            'abdome' => $aluno->medida_abdome ?? "Sem dados",
            'quadril' => $aluno->medida_quadril ?? "Sem dados",
            'bracos' => $aluno->medida_bracos ?? "Sem dados",
            'antebracos' => $aluno->medida_antebracos ?? "Sem dados",
            'panturrilha' => $aluno->medida_panturrilha ?? "Sem dados",
            'pernas' => $aluno->medida_pernas ?? "Sem dados",
            'observacoes' => $aluno->observacoes ?? "Sem dados",
            'situacao' => $aluno->situacao ?? "Sem dados",
            
            // Dados de pagamento
            'valor' => $pagamentos->valor ?? "Sem dados",
            'data_pagamento' => $pagamentos->data_pagamento ? Carbon::parse($pagamentos->data_pagamento)->format('Y-m-d') : '',
            'plano_aluno' => strtoupper($pagamentos->plano_aluno ?? "Sem dados"),
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Aluno não encontrado: ' . $e->getMessage()], 404);
    }
}



public function editar(Request $request, $id)
{
    // Monta o endereço com campos padrão para dados ausentes
    $endereco = implode(',', array_map(fn($value) => $value ?? 'Sem dados', [
        $request->rua,
        $request->numero,
        $request->complemento,
        $request->bairro,
        $request->cidade,
        $request->cep
    ]));

    try {
        // Busca o aluno e a pessoa associada
        $aluno = Aluno::with('pessoa')->findOrFail($id);
        $pessoa = $aluno->pessoa;
        $pagamentos = Pagamento::where('id_aluno', $id)->firstOrFail(); 

        // Atualiza a pessoa
        $pessoa->update([
            'nome' => $request->nome,
            'cpf' => Crypt::encryptString($request->cpf),
            'rg' => Crypt::encryptString($request->rg),
            'email' => Crypt::encryptString($request->email),
            'telefone' => Crypt::encryptString($request->telefone),
            'telefone_familiar' => Crypt::encryptString($request->telefone_familiar),
            'endereco' => Crypt::encryptString($endereco),
            'data_nascimento' => $request->data_nascimento,
        ]);

        // Atualiza os dados específicos do aluno
        $aluno->update([
            'tipo_sanguineo' => $request->tipo_sanguineo,
            'modalidade' => $request->modalidade_atual,
            'como_soube_academia' => $request->como_soube_da_academia,
            'objetivo' => $request->objetivo_atividade_fisica,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'fuma' => $request->fuma,
            'faz_dieta' => $request->faz_dieta,
            'usa_bebida_alcoolica' => $request->usa_bebida_alcoolica,
            'sedentario' => $request->sedentario,
            'modalidade_anterior' => $request->modalidade_anterior,
            'tem_varizes' => $request->varizes,
            'pressao_arterial' => $request->pressao_arterial,
            'cirurgia' => $request->cirurgia,
            'dorme_bem' => $request->dorme_bem,
            'lesao_articular' => $request->lesao_detalhes,
            'problema_coluna' => $request->coluna_detalhes,
            'tempo_medico' => $request->tempo_sem_medico,
            'medicamento' => $request->uso_medicamento,
            'problema_saude' => $request->problema_saude,
            'parq_problema_coracao' => $request->par_q1,
            'parq_dor_peito_com_atividade' => $request->par_q2,
            'parq_dor_peito_sem_atividade' => $request->par_q3,
            'parq_equilibrio' => $request->par_q4,
            'parq_problema_osseo' => $request->par_q5,
            'parq_receita_medica' => $request->par_q6,
            'parq_razao' => $request->par_q7,
            'obesidade' => $request->obesidade,
            'diabetes' => $request->diabetes,
            'colesterol_elevado' => $request->colesterol_elevado,
            'infarto' => $request->infarto,
            'doenca_cardiaca' => $request->doenca_detalhes,
            'derrame' => $request->derrame,
            'medida_torax' => $request->torax,
            'medida_cintura' => $request->cintura,
            'medida_abdome' => $request->abdome,
            'medida_quadril' => $request->quadril,
            'medida_bracos' => $request->bracos,
            'medida_antebracos' => $request->antebracos,
            'medida_panturrilha' => $request->panturrilha,
            'medida_pernas' => $request->pernas,
            'observacoes' => $request->obs,
            'updated_at' => now()
          
        ]);
$valor = trim($request->valor, "R$");
          // dados pagamento
           $pagamentos->update([
                'valor' => $valor,
                'data_pagamento' => Carbon::parse($request->data_pagamento)->format('Y-m-d'),
                'plano_aluno' => $request->plano,
            ]);
              
        return response()->json(['success' => 'Editado com sucesso!']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erro ao editar: ' . $e->getMessage()], 500);
    }
}



}