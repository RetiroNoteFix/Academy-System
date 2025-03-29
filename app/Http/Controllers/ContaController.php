<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class ContaController extends Controller
{
    public function logar(Request $request)
    {
        $request->validate([
            'nomeusuario' => 'required|string',
            'senhausuario' => 'required|string'
        ]);
    
        $resultado = Usuario::autenticar($request->nomeusuario, $request->senhausuario);
    
        // Se sucesso, redireciona
        if ($resultado['status'] === 'success') {
            return redirect($resultado['redirect']);
        }
    
        // Se erro, retorna mensagem específica
        if ($resultado['tipo'] === 'usuario') {
            return back()->withErrors([
                'nomeusuario' => $resultado['message'], // Erro no usuário
            ])->withInput();
        }
    
        return back()->withErrors([
            'senhausuario' => $resultado['message'], // Erro na senha
        ])->withInput();
    }
}
