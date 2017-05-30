<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoOne extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    	$TipoOnes = \App\TipoOne::All();
    	return view('TipoOne.index', compact('TipoOnes'));
    }

    public function adicionar(){
    	return view('TipoOne.adicionar');
    }


    public function salvar(Request $request){
    	//cadastro de todos no banco de dados
    	\App\TipoOne::create($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Tipo One adicionado com sucesso!",
    		'class'=>"alert-success"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('TipoOne.adicionar');
    }

    public function editar($id){
    	
    	$TipoOnes = \App\TipoOne::find($id);

    	if (!$TipoOnes) {
    		\Session::flash('flash_message',[
    			'msg'=>"Tipo One não cadastrado!",
    			'class'=>"alert-danger"
    		]);

    		return redirect()->route('TipoOne.adicionar');
    	}

    return view('TipoOne.editar', compact('TipoOnes'));

    }

    public function atualizar(Request $request, $id){
    	//Atualizar os dados no banco de dados
    	\App\TipoOne::find($id)->update($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Tipo One atualizado com sucesso!",
    		'class'=>"alert-sucess"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('TipoOne.index');
    }

    public function deletar($id){
    	$TipoOnes = \App\TipoOne::find($id);

	   	$TipoOnes->delete();

	    //Alerta de cadastro com sucesso
	    \Session::flash('flash_message',[
	    		'msg'=>"Tipo One deletado com sucesso!",
	    		'class'=>"alert-success"
	    ]);

	   	//redireciona para a view do formulario de cadastro
	   	return redirect()->route('TipoOne.index');
    }
}
