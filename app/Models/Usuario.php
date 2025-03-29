<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    public $timestamps = false;

    protected $fillable = [
        'idPessoa', 'senha', 'tipo_usuario'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'idPessoa', 'idPessoa');
    }

    public static function autenticar($nomeusuario, $senhausuario)
    {
        // Verifica se a pessoa existe
        $pessoa = Pessoa::where('nome', $nomeusuario)->first();
    
        if (!$pessoa || !$pessoa->usuario) {
            return [
                'status' => 'error',
                'tipo' => 'usuario', // Tipo de erro
                'message' => 'ERRO: Usuário não encontrado!'
            ];
        }
    
        $usuario = $pessoa->usuario;
    
        // Verifica a senha
        if (!Hash::check($senhausuario, $usuario->senha)) {
            return [
                'status' => 'error',
                'tipo' => 'senha', 
                'message' => 'ERRO: Senha incorreta!'
            ];
        }
    
        // Autenticação bem-sucedida
        Session::put('usuario_id', $pessoa->idPessoa);
        Session::put('usuario_nome', $pessoa->nome);
        Session::put('usuario_tipo', $usuario->tipo_usuario);
    
        return [
            'status' => 'success',
            'redirect' => route('inicio.index')
        ];
    }
}
