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

Route::group(['namespace' => 'Painel'], function () {
    Route::get('/', 'CarroController@create');
    Route::get('/entrada', 'CarroController@create');
    Route::get('/saida', 'CarroController@saida');
    Route::get('/relatorio', 'CarroController@relatorio');

    Route::get('/painel/carros/editar/{id}', 'CarroController@edit');
    Route::post('/painel/carros/editar', 'CarroController@editar');


    Route::get('/painel/carros/del/{id}', 'CarroController@destroy');
    Route::resource('/painel/carros', 'CarroController');

});



/**
 * Route::get('/painel/carros/del/{id}', 'CarroController@destroy');
 * A Rota do site esta em app/Http/Controller/Site
 * Route::group(['namespace' => 'Site'], function () {
 * Route::get('/', 'SiteController@entrada');
 * Route::get('/entrada', 'SiteController@entrada');
 * Route::get('/saida', 'SiteController@saida');
 * Route::get('/relatorio', 'SiteController@relatorio');
 * });
 */


/* Rota home
Route::get('/', function () {
    return view('welcome');
});
*/