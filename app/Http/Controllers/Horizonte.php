<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Things;
use \App\TipoOne;

class Horizonte extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    	$Horizontes = \App\Horizonte::All();

        if ($Horizontes) {
            //retorna o array Thing com as descricoes adicionadas.
            $Horizontes = $this->getDescricaoTabelasVinculo($Horizontes);
        }

    	return view('Horizonte.index', compact('Horizontes'));
    }

    /**
    *@desc Método responsável por retornar a descrição das tabelas vínculo
    *@var array
    *@return
    */
    private function getDescricaoTabelasVinculo($Horizontes){

        if (!$Horizontes) return false;

        foreach ($Horizontes as $key => $value) {
            //$this->debug($value['TipoTwo_id']);
            $nomeTipoOne = \App\TipoOne::Find($value['TipoOne_id']);
            $nomeThing = \App\Things::Find($value['Things_id']);

            //adiciona no array principal a descricao referente as tabelas relacionadas
            $Horizontes[$key]['nomeTipoOne'] = $nomeTipoOne['nome'];
            $Horizontes[$key]['nomeThing'] = $nomeThing['nome'];
        }
            //$this->debug($Horizontes);

        return $Horizontes;
    }

    public function debug($val) {
        print "<pre>";
        print_r($val);
        exit();
    }

    public function adicionar(){
    	$dadosTipoOne = \App\TipoOne::All();
        $dadosThings = \App\Things::All();
        return view('Horizonte.adicionar', compact('dadosTipoOne', 'dadosThings'));
    }


    public function salvar(Request $request){
    	//cadastro de todos no banco de dados
    	\App\Horizonte::create($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Horizonte adicionado com sucesso!",
    		'class'=>"alert-success"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('Horizonte.adicionar');
    }

    public function editar($id){
    	
    	$Horizontes = \App\Horizonte::find($id);

    	if (!$Horizontes) {
    		\Session::flash('flash_message',[
    			'msg'=>"Horizonte não cadastrado!",
    			'class'=>"alert-danger"
    		]);

    		return redirect()->route('Horizonte.adicionar');
    	}

        $dadosTipoOne = \App\TipoOne::All();
        $dadosThings = \App\Things::All();
        return view('Horizonte.editar', compact('Horizontes', 'dadosTipoOne', 'dadosThings'));
    }

    public function atualizar(Request $request, $id){
    	//Atualizar os dados no banco de dados
    	\App\Horizonte::find($id)->update($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Horizonte atualizado com sucesso!",
    		'class'=>"alert-sucess"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('Horizonte.index');
    }

    public function deletar($id){
    	$Horizontes = \App\Horizonte::find($id);

	   	$Horizontes->delete();

	    //Alerta de cadastro com sucesso
	    \Session::flash('flash_message',[
	    		'msg'=>"Horizonte deletado com sucesso!",
	    		'class'=>"alert-success"
	    ]);

	   	//redireciona para a view do formulario de cadastro
	   	return redirect()->route('Horizonte.index');
    }
}
