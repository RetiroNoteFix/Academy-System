<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Pessoa;
use App\Models\Pagamento;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PagamentoController extends Controller
{
    // Método que retorna a pessoa relacionada ao pagamento
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id', 'id_pessoa');
    }

    // Método para visualizar a notificação de pagamento
    public function visualizarNotificacao(Request $request, $id, $idaluno)
    {
        try {
            // Recupera aluno com dados da pessoa
            $aluno = Aluno::with('pessoa')->findOrFail($idaluno); 
            // Recupera pagamento pendente
            $pagamento = Pagamento::findOrFail($id);
            
            // Quebra o endereço em partes
            $endereco = "";
            if ($aluno->pessoa->endereco === null || " "){
                $endereco = "Sem dados, Sem dados, Sem dados, Sem dados, Sem dados, Sem dados";
             }
             else{
                $endereco = $aluno->pessoa->endereco;
             }
            $enderecos = explode(",", $endereco);
           
            
            // Formatação das datas
            $dataFormatada = Carbon::parse($aluno->pessoa->data_nascimento)->format('d/m/Y');
            $dataFormatada2 = Carbon::parse($pagamento->data_vencimento)->format('d/m/Y');
            $diaFormatado = Carbon::parse($aluno->data_pagamento)->format('d');

            // Formatação de dados
            $pagamento->plano_aluno = strtoupper($pagamento->plano_aluno);
            $pagamento->situacao = strtoupper($pagamento->situacao);

            return response()->json([
                'idaluno' => $aluno->id_aluno,
                'nome' => $aluno->pessoa->nome,
                'cpf' => $aluno->pessoa->cpf,
                'rg' => $aluno->pessoa->rg,
                'email' => $aluno->pessoa->email,
                'telefone' => $aluno->pessoa->telefone,
                'telefone_familiar' => $aluno->pessoa->telefone_familiar,
                'data_nascimento' => $dataFormatada,
                'rua' => $enderecos[0],
                'numero' => $enderecos[1],
                'complemento' => $enderecos[2],
                'bairro' => $enderecos[3],
                'cidade' => $enderecos[4],
                'cep' => $enderecos[5],
                'data_pagamento' => $diaFormatado,
                'plano_aluno' => $pagamento->plano_aluno,
                'valor' => $pagamento->valor,
                'data_vencimento' => $dataFormatada2,
                'situacao' => $pagamento->situacao,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Aluno não encontrado!'], 404);
        }
    }

    // Método para listar pagamentos pendentes
    public function listarPendentes()
    {
        $usuarioNome = Session::get('usuario_nome');
    $pendente = null;
        $pagamentos = Pagamento::where('situacao', 'pendente')->get();
        foreach ($pagamentos as $pagamento){
    
            $pendente = strtoupper($pagamento->situacao);
            
    
    
        }
        return view('inicio.index', compact('pagamentos', 'usuarioNome', 'pendente'));
    }

    // Método para atualizar pagamento pendente
    public function atualizarPendente(Request $request)
    {
        
        try {
            // Validação dos dados
            $validated = $request->validate([
                'data_pagamento' => 'required|string|max:10',
                'plano_aluno' => 'required|string|max:20',
                'valor' => 'required|string|max:30',
            ]);
            $dataFormatada = \Carbon\Carbon::createFromFormat('d/m/Y', $request->data_pagamento)->format('Y-m-d');

           $id = (int)$request->id_pgt;
            
            $pagamento = Pagamento::findOrFail($id);

            if ($pagamento) {
                // Atualiza os dados do pagamento
                $pagamento->update([
                    'data_pagamento' => $dataFormatada,
                    'plano_aluno' => $request->plano_aluno,
                    'valor' => $request->valor, // Aqui usa o valor tratado
                    'situacao' => "pago",
                ]);
                return response()->json(['success' => 'Pagamento atualizado com sucesso!']);
            } else {
                return response()->json(['error' => 'Pagamento não encontrado'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar o pagamento: ' . $e->getMessage()], 500);
        }
    }

    public function ignorarPendente(Request $request, $id)
{
       
        try {
           
            $pagamento = Pagamento::findOrFail($id);

            if ($pagamento) {
              
                $pagamento->update([
                    'situacao' => "ignorado",
                ]);
                return response()->json(['success' => 'Pagamento atualizado com sucesso!']);
            } else {
                return response()->json(['error' => 'Pagamento não encontrado'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar o pagamento: ' . $e->getMessage()], 500);
        }
    }
}
