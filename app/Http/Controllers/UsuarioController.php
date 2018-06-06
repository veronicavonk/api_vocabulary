<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Usuario;

class UsuarioController extends Controller
{
    public function autenticar(Request $request){
        $usuario = $request->json('usuario');
        $password = $request->json('password');
        if ( $usuario && $password ) {
            $usuarioDatos = Usuario::select()
                ->where('usuario_usuario', '=', $usuario)
                ->where('usuario_password', '=', $password)
                ->get()->first();
            if (sizeof($usuarioDatos) > 0) {
                return response()->json(['status'=>'true', 'response' =>  $usuarioDatos]);
            } else {
                return response()->json(['status'=>'false', 'response' =>  'Usuario o contraseña incorrectos']);
            }
        }
        return response()->json(['status'=>'false', 'response' => 'los datos son obligatorios' ]);
    }
}
