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


Route::get('/', 'Painel\CarroController@create');
Route::get('/entrada', 'Painel\CarroController@create');
Route::get('/saida', 'Painel\CarroController@saida');
Route::get('/relatorio', 'Painel\CarroController@relatorio');
Route::resource('/painel/carros','Painel\CarroController');


/**
 * A Rota do site esta em app/Http/Controller/Site



Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'SiteController@entrada');
    Route::get('/entrada', 'SiteController@entrada');
    Route::get('/saida', 'SiteController@saida');
    Route::get('/relatorio', 'SiteController@relatorio');
});
 */




/* Rota home
Route::get('/', function () {
    return view('welcome');
});
*/