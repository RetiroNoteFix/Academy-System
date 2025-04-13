<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{
    public function checkSession(Request $request)
  
    {
        
        if (Session::has('usuario_id')) {
         
            echo ("está logado");
        } else {
          
            return redirect()->route('login')->with('error', 'Por favor, faça o login');
        }
    }

    public function logout(Request $request)
    {
      
        Session::flush();

        return redirect()->route('login')->with('message', 'Você foi desconectado com sucesso');
    }
}
