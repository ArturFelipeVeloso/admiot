<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensoresController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
		$sensores = \App\Sensor::all();

		//adiciona a descrição das tabelas relacionadas
        if ($sensores) {
            //retorna o array Thing com as descricoes adicionadas.
            $sensores = $this->getDescricaoTabelasVinculo($sensores);
        }
    	return view('sensores.index', compact('sensores'));
	}

	/**
    *@desc Método responsável por retornar a descrição das tabelas vínculo
    *@var array
    *@return
    */
    private function getDescricaoTabelasVinculo($sensores){

        if (!$sensores) return false;

        foreach ($sensores as $key => $value) {
            //$this->debug($value['TipoTwo_id']);
            $descricao = \App\SensoresTipo::Find($value['sensores_tipos_id']);

            //adiciona no array principal a descricao referente as tabelas relacionadas
            $sensores[$key]['DescricaoTiposSensor'] = $descricao['nome'];
        }

        return $sensores;
    }

	public function adicionar(){
		$dadosTipoSensor = \App\SensoresTipo::All();
		return view('sensores.adicionar', compact('dadosTipoSensor'));
    }

    public function detalhe($id){
    	$sensores = \App\Sensor::find($id);

    	return view('sensores.detalhe', compact('sensores'));
    }

    public function salvar(Request $request){
    	//cadastro de todos no banco de dados
    	\App\Sensor::create($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Sensor adicionado com sucesso!",
    		'class'=>"alert-success"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('sensores.adicionar');
    }

    public function editar($id){
    	
    	$sensores = \App\Sensor::find($id);
    	$dadosTipoSensor = \App\SensoresTipo::All();

    	if (!$sensores) {
    		\Session::flash('flash_message',[
    			'msg'=>"Sensor não cadastrado!",
    			'class'=>"alert-danger"
    		]);

    		return redirect()->route('sensores.adicionar');
    	}

    	return view('sensores.editar', compact('sensores', 'dadosTipoSensor'));

    }

    public function atualizar(Request $request, $id){
    	//Atualizar os dados no banco de dados
    	\App\Sensor::find($id)->update($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Sensor atualizado com sucesso!",
    		'class'=>"alert-sucess"
    	]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('sensores.index');
    }

    public function deletar($id){
    	$sensores = \App\Sensor::find($id);

	   	$sensores->delete();

	    //Alerta de cadastro com sucesso
	    \Session::flash('flash_message',[
	    		'msg'=>"Sensor deletado com sucesso!",
	    		'class'=>"alert-success"
	    ]);

	   	//redireciona para a view do formulario de cadastro
	   	return redirect()->route('sensores.index');
    }

}
