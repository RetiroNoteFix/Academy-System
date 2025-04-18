<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_pessoa', 'senha', 'tipo_usuario'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    public static function autenticar($nomeusuario, $senhausuario)
    {
    
        $pessoa = Pessoa::where('nome', $nomeusuario)->first();
    
        if (!$pessoa || !$pessoa->usuario) {
            return [
                'status' => 'error',
                'tipo' => 'usuario',
                'message' => 'ERRO: Usuário não encontrado!'
            ];
        }
    
        $usuario = $pessoa->usuario;
    
        if (!Hash::check($senhausuario, $usuario->senha)) {
            return [
                'status' => 'error',
                'tipo' => 'senha', 
                'message' => 'ERRO: Senha incorreta!'
            ];
        }
    
        Session::put('usuario_id', $pessoa->id);
        Session::put('usuario_nome', $pessoa->nome);
        Session::put('usuario_tipo', $usuario->tipo_usuario);
    
        return [
            'status' => 'success',
            'redirect' => route('inicio.index')
        ];
    }
}
