<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$clientes = \App\Cliente::paginate(10);
    	
    	//var dump e um exit
    	//dd($clientes);

    	return view('cliente.index', compact('clientes'));
    }

    public function adicionar(){
    	return view('cliente.adicionar');
    }

    public function detalhe($id){
    	$cliente = \App\Cliente::find($id);

    	return view('cliente.detalhe', compact('cliente'));
    }


    public function salvar(\App\Http\Requests\ClienteRequest $request){
    	//cadastro de todos no banco de dados
    	\App\Cliente::create($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Cliente adicionado com sucesso!",
    		'class'=>"alert-success"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('cliente.adicionar');
    }

    public function editar($id){
    	
    	$cliente = \App\Cliente::find($id);

    	if (!$cliente) {
    		\Session::flash('flash_message',[
    			'msg'=>"Cliente não cadastrado!",
    			'class'=>"alert-danger"
    		]);

    		return redirect()->route('cliente.adicionar');
    	}

    return view('cliente.editar', compact('cliente'));

    }

    public function atualizar(Request $request, $id){
    	//Atualizar os dados no banco de dados
    	\App\Cliente::find($id)->update($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Cliente atualizado com sucesso!",
    		'class'=>"alert-sucess"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('cliente.index');
    }

    public function deletar($id){
    	$cliente = \App\Cliente::find($id);

    	if (!$cliente->deletarTelefones()) {
    		\Session::flash('flash_message',[
    			'msg'=>"Registro não pode ser deletado!",
    			'class'=>"alert-danger"
    		]);

    		return redirect()->route('cliente.index');
    	}

	   	$cliente->delete();

	    //Alerta de cadastro com sucesso
	    \Session::flash('flash_message',[
	    		'msg'=>"Cliente deletado com sucesso!",
	    		'class'=>"alert-success"
	    ]);

	   	//redireciona para a view do formulario de cadastro
	   	return redirect()->route('cliente.index');
    }

}