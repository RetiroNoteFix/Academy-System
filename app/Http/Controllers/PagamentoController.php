<?php

namespace App\Http\Controllers;
use App\Models\Aluno;
use App\Models\Pessoa;
use App\Models\Pagamento;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id', 'id_pessoa');
    }

    public function visualizarNotificacao(Request $request, $id)
{
    try {
     
        $aluno = Aluno::with('pessoa')->findOrFail($id); 
        $pagamento = Pagamento::pagamentoPendente($id);
        
        return response()->json([

            'idaluno' => $aluno->id_aluno,
            'nome' => $aluno->pessoa->nome,
            'cpf' => $aluno->pessoa->cpf,
            'rg' => $aluno->pessoa->rg,
            'email' => $aluno->pessoa->email,
            'telefone' => $aluno->pessoa->telefone,
            'telefone_familiar' => $aluno->pessoa->telefone_familiar,
            'data_nascimento' => $dataFormatada = \Carbon\Carbon::parse($aluno->pessoa->data_nascimento)->format('d/m/Y'),
            $enderecos = explode(",", $aluno->pessoa->endereco),
            'rua' => $enderecos[0],
            'numero' => $enderecos[1],
            'complemento' => $enderecos[2],
            'bairro' => $enderecos[3],
            'cidade' => $enderecos[4],
            'cep' => $enderecos[5],
            'data_pagamento' => $diaFormatado = \Carbon\Carbon::parse($pagamento->data_pagamento)->format('d'),
            $pagamento->plano_aluno = strtoupper($pagamento->plano_aluno),
            'plano_aluno' => $pagamento->plano_aluno,
            'valor' => $pagamento->valor,
            'data_vencimento' => $dataFormatada2 = \Carbon\Carbon::parse($pagamento->data_vencimento)->format('d/m/Y'),
            $pagamento->situacao = strtoupper($pagamento->situacao),
            'situacao' => $pagamento->situacao,
          
            
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Aluno não encontrado!'], 404);
    }
}

public function listarPendentes()
{
    $usuarioNome = Session::get('usuario_nome');

    $pagamentos = Pagamento::where('situacao', 'pendente')->get();
    foreach ($pagamentos as $pagamento){

        $pendente = strtoupper($pagamento->situacao);


    }


    return view('inicio.index', compact('pagamentos', 'usuarioNome', 'pendente'));
}

}
