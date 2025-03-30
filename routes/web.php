<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\SessionController;


Route::get('/check-session', [SessionController::class, 'checkSession'])->name('check-session');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');



Route::get('/', function () {
    return view('login');
})->name("login");

Route::get('/alunos', [AlunoController::class, 'listar'])->name("alunos.index");


Route::get('/alunos/criar', function () {
    return view('alunos/create');
})->name("alunos.criar");

Route::get('/pagamentos', function () {
    return view('pagamentos/index');
})->name("pagamentos.index");

Route::get('/usuarios', function () {
    return view('usuarios/index');
})->name("usuarios.index");

Route::get('/inicio', function () {
    if (!Session::has('usuario_id')) {
        return redirect()->route('login')->with('error', 'Você precisa estar logado.');
    }
    return view('inicio.index');
})->name('inicio.index');

Route::post('/login', [ContaController::class, 'logar'])->name('login.autenticar');
Route::post('/alunos/criar/store', [AlunoController::class, 'cadastrar'])->name('alunos.cadastrar');
Route::post('/alunos/desativar/{id}', [AlunoController::class, 'desativar'])->name('alunos.desativar');
Route::post('/alunos/ativar/{id}', [AlunoController::class, 'ativar'])->name('alunos.ativar');
