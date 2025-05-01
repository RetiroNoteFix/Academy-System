<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PagamentoController;

Route::get('/check-session', [SessionController::class, 'checkSession'])->name('check-session');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');



Route::get('/', function () {
    return view('login');
})->name("login");

Route::get('/alunos', function () {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login')->with('error', 'Você precisa estar logado.');
    }

    $controller = app(AlunoController::class);
    return $controller->listar();
})->name('alunos.index');


Route::get('/alunos/criar', function () {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login')->with('error', 'Você precisa estar logado.');
    }
    $usuarioNome = Session::get('usuario_nome');
    return view('alunos/create', compact('usuarioNome'));
})->name("alunos.criar");

Route::get('/usuarios/criar', function () {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login')->with('error', 'Você precisa estar logado.');
    }
    $usuarioNome = Session::get('usuario_nome');
    return view('usuarios/create', compact('usuarioNome'));
})->name("usuarios.criar");

Route::get('/pagamentos', function () {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login')->with('error', 'Você precisa estar logado.');
    }
    $usuarioNome = Session::get('usuario_nome');
    return view('pagamentos/index', compact('usuarioNome'));
})->name("pagamentos.index");

Route::get('/usuarios', function () {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login')->with('error', 'Você precisa estar logado.');
    }

    $controller = app(UsuarioController::class);
    return $controller->listar();
})->name("usuarios.index");

Route::get('/inicio', function () {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login')->with('error', 'Você precisa estar logado.');
    }
    $usuarioNome = Session::get('usuario_nome');
    return view('inicio.index', compact('usuarioNome'));
})->name('inicio.index');


Route::get('/inicio', function () {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login')->with('error', 'Você precisa estar logado.');
    }
    $controller = app(PagamentoController::class);
    return $controller->listarPendentes();
})->name('inicio.index');

Route::post('/login', [ContaController::class, 'logar'])->name('login.autenticar');
Route::post('/alunos/criar/store', [AlunoController::class, 'cadastrar'])->name('alunos.cadastrar');
Route::post('/usuarios/criar/store', [UsuarioController::class, 'cadastrar'])->name('usuarios.cadastrar');
Route::post('/alunos/desativar/{id}', [AlunoController::class, 'desativar'])->name('alunos.desativar');
Route::post('/alunos/ativar/{id}', [AlunoController::class, 'ativar'])->name('alunos.ativar');
Route::post('/alunos/apagar/{id}', [AlunoController::class, 'apagar'])->name('alunos.apagar');
Route::post('/alunos/editar/', [AlunoController::class, 'editar'])->name('alunos.editar');
Route::post('/alunos/visualizar/{id}', [AlunoController::class, 'visualizar'])->name('alunos.visualizar');
Route::post('/inicio/pendentes/{id}/{idaluno}', [PagamentoController::class, 'visualizarNotificacao'])->name('inicio.pendentes');
Route::post('/inicio/pendentes/atualizar/', [PagamentoController::class, 'atualizarPendente'])->name('inicio.pendentes.atualizar');
Route::post('/inicio/ignorar/{id}', [PagamentoController::class, 'ignorarPendente'])->name('inicio.ignorar');
Route::get('/usuarios/visualizar/{id}', [UsuarioController::class, 'visualizar'])->name('usuarios.visualizar');
