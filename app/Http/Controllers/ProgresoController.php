<?php

namespace App\Http\Controllers;

use App\Palabra;
use App\Progreso;
use Illuminate\Http\Request;

class ProgresoController extends Controller
{
    public function palabraVista(Request $request){
        $progreso = new Progreso();
        $progreso->fid_palabra = $request->json('id_palabra');
        $progreso->fid_usuario = $request->json('id_usuario');
        $progreso->save();
        return response()->json(['status'=>'true', 'response'=>'Adicionado correctamente'],200);
    }

    public function correctas($id_usuario){
        $progreso = Progreso::select('fid_palabra')
            ->where('fid_usuario', '=', 1)
            ->get();
        $vistas = Progreso::select('fid_palabra')
            ->where('fid_usuario', '=', $id_usuario)
            ->get()
            ->count();
        $noVistas =  Palabra::select()
            ->whereNotIn('id_palabra', $progreso)
            ->get()
            ->count();
        return response()->json(['status'=>'true', 'response' =>
            array(
                array(
                    'nombre' => 'Vistas',
                    'cantidad' => $vistas),
                array(
                    'nombre' => 'No vistas',
                    'cantidad' => $noVistas)
                ) ]);

    }
    public function dificultad($id_usuario){
        $easy = Progreso::select()
            ->join('palabra', 'palabra.id_palabra', '=', 'progreso.fid_palabra')
            ->where('palabra.palabra_dificultad', '=', 'EASY')
            ->where('progreso.fid_usuario', '=', $id_usuario)
            ->get()
            ->count();
        $medium = Progreso::select()
            ->join('palabra', 'palabra.id_palabra', '=', 'progreso.fid_palabra')
            ->where('palabra.palabra_dificultad', '=', 'MEDIUM')
            ->where('progreso.fid_usuario', '=', $id_usuario)
            ->get()
            ->count();
        $hard = Progreso::select()
            ->join('palabra', 'palabra.id_palabra', '=', 'progreso.fid_palabra')
            ->where('palabra.palabra_dificultad', '=', 'HARD')
            ->where('progreso.fid_usuario', '=', $id_usuario)
            ->get()
            ->count();
        $common = Progreso::select()
            ->join('palabra', 'palabra.id_palabra', '=', 'progreso.fid_palabra')
            ->where('palabra.palabra_dificultad', '=', 'COMMON')
            ->where('progreso.fid_usuario', '=', $id_usuario)
            ->get()
            ->count();

        return response()->json(['status'=>'true', 'response' => array(
            array(
                'nombre' => 'Easy',
                'cantidad' => $easy),
            array(
                'nombre' => 'Medium',
                'cantidad' => $medium),
            array(
                'nombre' => 'Hard',
                'cantidad' => $hard),
            array(
                'nombre' => 'Common',
                'cantidad' => $common),
        ) ]);

    }
    public function categorias($id_usuario){
        $porCategoria = Progreso::select()
            ->join('palabra', 'palabra.id_palabra', '=', 'progreso.fid_palabra')
            ->where('progreso.fid_usuario', '=', $id_usuario)
            ->where('progreso.fid_usuario', '=', $id_usuario)
            ->get()
            ->count();
    }
}
