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

// Rutas para Login y derivados
Route::resource('/','LoginController');
Route::resource('Login','LoginController');
Route::get('Logout','LoginController@logout');
Route::resource('MisTiendas','MyStoreController');


// Rutas para Administración
Route::resource('Principal','PrincipalController');
Route::resource('Menu','MenuController');
Route::resource('Usuario','UserController');
Route::resource('Tienda','StoreController');
Route::resource('Perfil','ProfileController');


// RUtas para AJAX JSON
Route::get('ajax/municipios/{id}',array('as'=>'myform.ajax','uses'=>'AjaxController@Municipality'));
Route::get('ajax/parametro/{id}',array('as'=>'myform.ajax','uses'=>'AjaxController@Parameter'));
Route::get('ajax/usuario_tienda/{id}',array('as'=>'myform.ajax','uses'=>'AjaxController@UserStore'));
Route::get('ajax/perfil_pantalla/{id}',array('as'=>'myform.ajax','uses'=>'AjaxController@ProfileScreen'));