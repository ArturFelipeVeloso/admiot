<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    //Ccontrutor saber se o usuário ta logado
    public function __construct()
    {
        $this->middleware('auth');
    }

    //CRUD
    public function adicionar($id){

    	$cliente = \App\Cliente::find($id);
    	
    	return view('telefone.adicionar', compact('cliente'));
    }

    public function salvar(\App\Http\Requests\TelefoneRequest $request, $id){
    	
    	$telefone = new \App\Telefone;
    	$telefone->titulo = $request->input('titulo');
    	$telefone->telefone = $request->input('telefone');

    	$cliente = \App\Cliente::find($id)->addTelefone($telefone);

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Telefone adicionado com sucesso!",
    		'class'=>"alert-success"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('cliente.detalhe',$id);
    }

    public function editar($id){
    	
    	$telefone = \App\Telefone::find($id);

    	if (!$telefone) {
    		\Session::flash('flash_message',[
    			'msg'=>"Telefone não cadastrado!",
    			'class'=>"alert-danger"
    		]);

    		return redirect()->route('cliente.detalhe', $telefone->cliente->id);
    	}

    return view('telefone.editar', compact('telefone'));

    }

    public function atualizar(Request $request, $id){
    	$telefone = \App\Telefone::find($id);
    	//Atualizar os dados no banco de dados
    	$telefone->update($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Telefone atualizado com sucesso!",
    		'class'=>"alert-sucess"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('cliente.detalhe', $telefone->cliente->id);
    }

    public function deletar($id){
    	$telefone = \App\Telefone::find($id);

	   	$telefone->delete();

	    //Alerta de cadastro com sucesso
	    \Session::flash('flash_message',[
	    		'msg'=>"Telefone deletado com sucesso!",
	    		'class'=>"alert-success"
	    ]);

	   	//redireciona para a view do formulario de cadastro
	   	return redirect()->route('cliente.detalhe', $telefone->cliente->id);
    }
}
