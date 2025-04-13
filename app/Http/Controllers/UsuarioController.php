<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Aluno;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function cadastrar(Request $request)
    {
        DB::beginTransaction();
        try {
            // Validação dos dados
            $validated = $request->validate([
                // Dados Pessoa
                'nome' => 'required|string|max:255',
                'senhausuario' => 'required|string|max:30',
                'tipousuario' => 'required|string|max:30',
            ]);
    
            $pessoa = Pessoa::create([
                'nome' => $request->nome,
            ]);
    
            $aluno = Usuario::create([
                'idPessoa' => $pessoa->idPessoa,
                'nome' => $request->nome,
                'senha' => bcrypt($request->senhausuario), // Hash da senha
                'tipo_usuario' => $request->tipousuario,
            ]);
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'pessoa_id' => $pessoa->idPessoa,
                'aluno_id' => $aluno->idUsuario,
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
        $usuarios = Usuario::get();
        return view('usuarios.index', compact('usuarios'));
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
        $usuario = Usuario::with('pessoa')->findOrFail($id);  // A relação 'pessoa' deve estar definida no modelo Aluno
        
        // Retornar os dados combinados de Aluno e Pessoa
        return response()->json([
            // dados pessoa
            'idUsuario' => $usuario->idUsuario,
            'nome' => $usuario->pessoa->nome,
            'tipoUsuario' => $usuario->tipo_usuario,
           
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