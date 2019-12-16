<?php

use Illuminate\Http\Request;

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



// Administrador
Route::prefix('/')
	->name('api.')
	->namespace('API')
	->group(function(){

	/**
	 * Modulo de administracion
	 */
	Route::namespace('Administracion')->group(function(){

		// Prueba
		Route::post(
			'usuarios/{id}/asignar-rol', 
			'UsuarioController@asignarRol'
		)->name('usuarios.asignar_rol');


		// Asignar usuario a proyecto
		Route::post(
			'proyectos/{id}/asignar-a-usuario', 
			'ProyectoController@asignarProyecto'
		)->name('usuarios.asignar_a_usuario');

		Route::get(
			'usuarios/buscar', 
			'UsuarioController@buscar'
		)->name('usuarios.buscar');

		Route::resources([
			'proyectos' => 'ProyectoController',
			'usuarios' => 'UsuarioController',
		]);
	});



	/**
	 * Modulo de configuracion
	 */
	Route::namespace('Configuracion')->group(function(){
		Route::resources([
			'fases' => 'FaseController',
			'item' => 'ItemController',
			'linea-base' => 'LineaBaseController',
		]);
	});

	/**
	 * Modulo de configuracion
	 */
	Route::namespace('Desarrollo')->group(function(){
		Route::resources([
			'gestion-de-requerimientos' => 'GestionRequerimientoController'
		]);
	});
	
});


Route::get('/', function() {
    return "API GESTOR DE PROYECTOS";
});



