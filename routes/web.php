<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Administrador
Route::prefix('/')
	->middleware('auth')
	->name('sistema.')
	->group(function(){

	/**
	 * Administracion
	 */
	Route::get('/', 'IndexPageController@index')->name('index');


	/**
	 * Modulo de administracion
	 */
	Route::namespace('Sistema\Administracion')->group(function(){

		Route::resources([
			'proyectos' => 'ProyectoController',
			'usuarios' => 'UsuarioController',
		]);
	});



	/**
	 * Modulo de configuracion
	 */
	Route::namespace('Sistema\Configuracion')->group(function(){
		Route::resources([
			'fases' => 'FaseController',
			'item' => 'ItemController',
			'linea-base' => 'LineaBaseController',
		]);
	});

	/**
	 * Modulo de configuracion
	 */
	Route::namespace('Sistema\Desarrollo')->group(function(){
		Route::resources([
			'gestion-de-requerimientos' => 'GestionRequerimientoController'
		]);
	});
	
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
