<?php

namespace estoque\Http\Controllers;

use Auth;
use Request;
use estoque\Http\Requests;


class LoginController extends Controller
{
    public function login()
    {
        $credenciais = Request::only('email','password');
        if(Auth::attempt($credenciais)) {
            return "Usuário " . Auth::user()->name . " logado com sucesso";
        } else {
            return "Usuário não cadastrado";
        }

    }
}
