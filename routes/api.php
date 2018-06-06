<?php

use Illuminate\Http\Request;

use App\Palabra;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('cors')->post('autenticar', 'UsuarioController@autenticar');

/* Para las palabras */
Route::middleware('cors')->get('palabras/{id_categoria}/{id_usuario}', 'PalabraController@palabrasCategoria');
Route::middleware('cors')->get('palabra/{id_palabra}', 'PalabraController@palabra');
/* Para las palabras */

/*Para el Progreso*/
Route::middleware('cors')->post('progreso', 'ProgresoController@palabraVista');
Route::middleware('cors')->get('progreso/correctas/{id_usuario}', 'ProgresoController@correctas');
Route::middleware('cors')->get('progreso/dificultad/{id_usuario}', 'ProgresoController@dificultad');
Route::middleware('cors')->get('progreso/categorias/{id_usuario}', 'ProgresoController@categorias');
/*Para el Progreso*/


/* Para las categorias */
Route::middleware('cors')->get('categorias', 'CategoriaController@categorias');
Route::middleware('cors')->get('categorias/{id_curso}', 'CategoriaController@categoriasCurso');
/* Para las categorias */





Route::get('palabras/{id_palabra}', 'PalabraController@show');
Route::post('palabras', 'PalabraController@store');
Route::put('palabras/{Palabra}', 'PalabraController@update');
Route::delete('palabras/{Palabra}', 'PalabraController@delete');

Route::resource('palabras2', 'PalabraController', ['only'=>['index']]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
