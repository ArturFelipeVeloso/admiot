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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/welcome', ['uses'=>'WelcomeController@index', 'as'=>'Welcome.index']);

Route::get('/cliente', ['uses'=>'ClienteController@index', 'as'=>'cliente.index']);
Route::get('/cliente/adicionar', ['uses'=>'ClienteController@adicionar', 'as'=>'cliente.adicionar']);
Route::post('/cliente/salvar', ['uses'=>'ClienteController@salvar', 'as'=>'cliente.salvar']);
Route::get('/cliente/editar/{id}', ['uses'=>'ClienteController@editar', 'as'=>'cliente.editar']);
Route::put('/cliente/atualizar/{id}', ['uses'=>'ClienteController@atualizar', 'as'=>'cliente.atualizar']);
Route::get('/cliente/deletar/{id}', ['uses'=>'ClienteController@deletar', 'as'=>'cliente.deletar']);
Route::get('/cliente/detalhe/{id}', ['uses'=>'ClienteController@detalhe', 'as'=>'cliente.detalhe']);

Route::get('/telefone/adicionar/{id}', ['uses'=>'TelefoneController@adicionar', 'as'=>'telefone.adicionar']);
Route::post('/telefone/salvar/{id}', ['uses'=>'TelefoneController@salvar', 'as'=>'telefone.salvar']);

Route::get('/telefone/editar/{id}', ['uses'=>'TelefoneController@editar', 'as'=>'telefone.editar']);
Route::put('/telefone/atualizar/{id}', ['uses'=>'TelefoneController@atualizar', 'as'=>'telefone.atualizar']);
Route::get('/telefone/deletar/{id}', ['uses'=>'TelefoneController@deletar', 'as'=>'telefone.deletar']);

Route::get('/TipoOne', ['uses'=>'TipoOne@index', 'as'=>'TipoOne.index']);
Route::get('/TipoOne/adicionar', ['uses'=>'TipoOne@adicionar', 'as'=>'TipoOne.adicionar']);
Route::post('/TipoOne/salvar', ['uses'=>'TipoOne@salvar', 'as'=>'TipoOne.salvar']);
Route::get('/TipoOne/editar/{id}', ['uses'=>'TipoOne@editar', 'as'=>'TipoOne.editar']);
Route::put('/TipoOne/atualizar/{id}', ['uses'=>'TipoOne@atualizar', 'as'=>'TipoOne.atualizar']);
Route::get('/TipoOne/deletar/{id}', ['uses'=>'TipoOne@deletar', 'as'=>'TipoOne.deletar']);

Route::get('/TipoTwo', ['uses'=>'TipoTwo@index', 'as'=>'TipoTwo.index']);
Route::get('/TipoTwo/adicionar', ['uses'=>'TipoTwo@adicionar', 'as'=>'TipoTwo.adicionar']);
Route::post('/TipoTwo/salvar', ['uses'=>'TipoTwo@salvar', 'as'=>'TipoTwo.salvar']);
Route::get('/TipoTwo/editar/{id}', ['uses'=>'TipoTwo@editar', 'as'=>'TipoTwo.editar']);
Route::put('/TipoTwo/atualizar/{id}', ['uses'=>'TipoTwo@atualizar', 'as'=>'TipoTwo.atualizar']);
Route::get('/TipoTwo/deletar/{id}', ['uses'=>'TipoTwo@deletar', 'as'=>'TipoTwo.deletar']);

Route::get('/Things', ['uses'=>'Things@index', 'as'=>'Things.index']);
Route::get('/Things/adicionar', ['uses'=>'Things@adicionar', 'as'=>'Things.adicionar']);
Route::post('/Things/salvar', ['uses'=>'Things@salvar', 'as'=>'Things.salvar']);
Route::get('/Things/editar/{id}', ['uses'=>'Things@editar', 'as'=>'Things.editar']);
Route::put('/Things/atualizar/{id}', ['uses'=>'Things@atualizar', 'as'=>'Things.atualizar']);
Route::get('/Things/deletar/{id}', ['uses'=>'Things@deletar', 'as'=>'Things.deletar']);

Route::get('/Horizonte', ['uses'=>'Horizonte@index', 'as'=>'Horizonte.index']);
Route::get('/Horizonte/adicionar', ['uses'=>'Horizonte@adicionar', 'as'=>'Horizonte.adicionar']);
Route::post('/Horizonte/salvar', ['uses'=>'Horizonte@salvar', 'as'=>'Horizonte.salvar']);
Route::get('/Horizonte/editar/{id}', ['uses'=>'Horizonte@editar', 'as'=>'Horizonte.editar']);
Route::put('/Horizonte/atualizar/{id}', ['uses'=>'Horizonte@atualizar', 'as'=>'Horizonte.atualizar']);
Route::get('/Horizonte/deletar/{id}', ['uses'=>'Horizonte@deletar', 'as'=>'Horizonte.deletar']);

Route::get('/Configuracao', ['uses'=>'ConfiguracaoController@index', 'as'=>'Configuracao.index']);
Route::get('/Configuracao/adicionar', ['uses'=>'ConfiguracaoController@adicionar', 'as'=>'Configuracao.adicionar']);
Route::post('/Configuracao/salvar', ['uses'=>'ConfiguracaoController@salvar', 'as'=>'Configuracao.salvar']);
Route::get('/Configuracao/editar/{id}', ['uses'=>'ConfiguracaoController@editar', 'as'=>'Configuracao.editar']);
Route::put('/Configuracao/atualizar/{id}', ['uses'=>'ConfiguracaoController@atualizar', 'as'=>'Configuracao.atualizar']);
Route::get('/Configuracao/deletar/{id}', ['uses'=>'ConfiguracaoController@deletar', 'as'=>'Configuracao.deletar']);

Route::get('/sensores', ['uses'=>'SensoresController@index', 'as'=>'sensores.index']);
Route::get('/sensores/adicionar', ['uses'=>'SensoresController@adicionar', 'as'=>'sensores.adicionar']);
Route::post('/sensores/salvar', ['uses'=>'SensoresController@salvar', 'as'=>'sensores.salvar']);
Route::get('/sensores/editar/{id}', ['uses'=>'SensoresController@editar', 'as'=>'sensores.editar']);
Route::put('/sensores/atualizar/{id}', ['uses'=>'SensoresController@atualizar', 'as'=>'sensores.atualizar']);
Route::get('/sensores/deletar/{id}', ['uses'=>'SensoresController@deletar', 'as'=>'sensores.deletar']);

//Historico dos sensores 
Route::post('/historicosensor', ['uses'=>'HistoricoSensorController@store', 'as'=>'historico.adicionar']);