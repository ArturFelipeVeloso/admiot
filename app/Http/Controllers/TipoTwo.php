<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoTwo extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    	$TipoTwos = \App\TipoTwo::All();
    	return view('TipoTwo.index', compact('TipoTwos'));
    }

    public function adicionar(){
    	return view('TipoTwo.adicionar');
    }


    public function salvar(Request $request){
    	//cadastro de todos no banco de dados
    	\App\TipoTwo::create($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Tipo Two adicionado com sucesso!",
    		'class'=>"alert-success"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('TipoTwo.adicionar');
    }

    public function editar($id){
    	
    	$TipoTwos = \App\TipoTwo::find($id);

    	if (!$TipoTwos) {
    		\Session::flash('flash_message',[
    			'msg'=>"Tipo Two não cadastrado!",
    			'class'=>"alert-danger"
    		]);

    		return redirect()->route('TipoTwo.adicionar');
    	}

    return view('TipoTwo.editar', compact('TipoTwos'));

    }

    public function atualizar(Request $request, $id){
    	//Atualizar os dados no banco de dados
    	\App\TipoTwo::find($id)->update($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Tipo Two atualizado com sucesso!",
    		'class'=>"alert-sucess"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('TipoTwo.index');
    }

    public function deletar($id){
    	$TipoTwos = \App\TipoTwo::find($id);

	   	$TipoTwos->delete();

	    //Alerta de cadastro com sucesso
	    \Session::flash('flash_message',[
	    		'msg'=>"Tipo Two deletado com sucesso!",
	    		'class'=>"alert-success"
	    ]);

	   	//redireciona para a view do formulario de cadastro
	   	return redirect()->route('TipoTwo.index');
    }
}
