<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Curso;
use App\CategoriaCurso;

class CategoriaController extends Controller
{

    public function categorias(){
        $categorias = Categoria::all();
        return response()->json(['status'=>'true', 'response' => $categorias ]);

    }

    public function categoriasCurso($id_curso){
        $categoria = Categoria::select()
            ->join('categoria_curso', 'categoria_curso.fid_categoria', '=', 'categoria.id_categoria')
            ->join('curso', 'curso.id_curso', '=', 'categoria_curso.fid_curso')
            ->where('curso.id_curso', $id_curso)
            ->get();
        return response()->json(['status'=>'true', 'response'=>$categoria],200);

        return response()->json(['status'=>'true', 'response' => $categorias ]);

    }
}
