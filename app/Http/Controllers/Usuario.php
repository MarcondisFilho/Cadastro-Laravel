<?php

namespace App\Http\Controllers;

use App\Models\Model\Usuario as UsuarioModel;
use Illuminate\Http\Request;

class Usuario extends Controller
{
    public function cadastrar(){
        return view('usuario.cadastro');
    }

    public function salvar(Request $resquest){
        $resquest->validate([
            "nome"=> "required",
            "email"=>"required|email|unique:usuario,email",
            "senha"=> "min:5"
            
        ]);

       if ( UsuarioModel::cadastrar($resquest)) {
        return view('usuario.sucesso',  [
            "fulano" => $resquest->input('nome')
        ]);
       } else {
        echo "Ops! Falhou ao cadastrar";
       }  
    }
}
