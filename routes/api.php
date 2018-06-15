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

Route::group(['middleware'=>['cors','auth:api']], function (){
	
	Route::post('autenticar', 'UsuarioController@autenticar');

	/* Para las palabras */
	Route::get('palabras/{id_categoria}/{id_usuario}', 'PalabraController@palabrasCategoria');
	Route::get('palabra/{id_palabra}', 'PalabraController@palabra');
	/* Para las palabras */

	/*Para el Progreso*/
	Route::post('progreso', 'ProgresoController@palabraVista');
	Route::get('progreso/correctas/{id_usuario}', 'ProgresoController@correctas');
	Route::get('progreso/dificultad/{id_usuario}', 'ProgresoController@dificultad');
	Route::get('progreso/categorias/{id_usuario}', 'ProgresoController@categorias');
	/*Para el Progreso*/


	/* Para las categorias */
	Route::get('categorias', 'CategoriaController@categorias');
	Route::get('categorias/{id_curso}', 'CategoriaController@categoriasCurso');
	/* Para las categorias */


	Route::get('palabras/{id_palabra}', 'PalabraController@index');
	Route::post('palabras', 'PalabraController@store');
	Route::put('palabras/{Palabra}', 'PalabraController@update');
	Route::delete('palabras/{Palabra}', 'PalabraController@delete');

	Route::resource('palabras2', 'PalabraController', ['only'=>['index']]);

	Route::post('me', 'AuthController@me');

	Route::post('logout', 'AuthController@logout');
});






Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('login', 'AuthController@login');
Route::post('registro', 'AuthController@registro');

Route::post('login', 'AuthController@login');
