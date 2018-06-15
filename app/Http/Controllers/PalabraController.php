<?php
namespace App\Http\Controllers;
use App\Palabra;
use App\CategoriaPalabra;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Progreso;


class PalabraController extends Controller
{
    public function index(){
        $palabra = Palabra::all('palabra', 'tipo');
        return response()->json(['msg'=>'Signup Successfully', 'response'=>$palabra],201);
    }

    public function palabrasCategoria($id_categoria, $id_usuario){
        $progreso = Progreso::select('fid_palabra')
        ->where('fid_usuario', '=', 1)
        ->get();
        $palabras = Palabra::select()
        ->join('categoria_palabra', 'categoria_palabra.fid_palabra', '=', 'Palabra.id_palabra')
        ->join('Categoria', 'Categoria.id_categoria', '=', 'categoria_palabra.fid_categoria')
            ->where('categoria.id_categoria', $id_categoria)
            ->whereNotIn('Palabra.id_palabra', $progreso)
        ->get();

        return response()->json(['status'=>'true', 'response'=>$palabras],200);
    }


    public function palabra($id_palabra)
    {
        $palabra = Palabra::select()
            ->where('id_palabra', '=', $id_palabra)->get();
        return response()->json(['status'=>'true', 'response'=> $palabra], 200);
    }


    public function store(Request $request)
    {
        //return Palabra::create($request->all());
        $usuario = Input::all();
        return response()->json(['status'=>'true', 'response'=>$usuario['usuario']],200);

    }

    public function update(Request $request, Palabra $palabra)
    {
        $palabra = Palabra::findOrFail($palabra);
        $palabra->update($request->all());

        return $palabra;
    }

    public function delete(Request $request, Palabra $palabra)
    {
        $article = Palabra::findOrFail($palabra);
        $article->delete();
        return 204;
    }

}
