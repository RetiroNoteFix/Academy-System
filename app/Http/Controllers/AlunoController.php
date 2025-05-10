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
        $idPessoa = $aluno->id_pessoa;
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
            'data_nascimento' => $aluno->pessoa->data_nascimento ?? "Sem dados",

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
            'data_pagamento' => Carbon::parse($pagamentos->data_pagamento)->format('Y-m-d') ?? "Sem dados",
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