<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    public function index(){
        $Configuracoes = \App\Configuracao::All();
    	//$Configuracoes = \App\Configuracao::All()->orderBy('id')->first();
        //$Configuracoes = \App\Configuracao::orderBy('created_at')->first();
    	return view('Configuracao.index', compact('Configuracoes'));
    }

    public function adicionar(){
    	return view('Configuracao.adicionar');
    }


    public function salvar(Request $request){
    	//cadastro de todos no banco de dados
    	\App\Configuracao::create($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Configuracao adicionado com sucesso!",
    		'class'=>"alert-success"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('Configuracao.adicionar');
    }

    public function editar($id){
    	
    	$Configuracaos = \App\Configuracao::find($id);

    	if (!$Configuracaos) {
    		\Session::flash('flash_message',[
    			'msg'=>"Configuracao não cadastrada!",
    			'class'=>"alert-danger"
    		]);

    		return redirect()->route('Configuracao.adicionar');
    	}

    return view('Configuracao.editar', compact('Configuracaos'));

    }

    public function atualizar(Request $request, $id){
    	//Atualizar os dados no banco de dados
    	\App\Configuracao::find($id)->update($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Configuracao atualizado com sucesso!",
    		'class'=>"alert-sucess"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('Configuracao.index');
    }

    public function deletar($id){
    	$Configuracaos = \App\Configuracao::find($id);

	   	$Configuracaos->delete();

	    //Alerta de cadastro com sucesso
	    \Session::flash('flash_message',[
	    		'msg'=>"Configuracao deletada com sucesso!",
	    		'class'=>"alert-success"
	    ]);

	   	//redireciona para a view do formulario de cadastro
	   	return redirect()->route('Configuracao.index');
    }
}
