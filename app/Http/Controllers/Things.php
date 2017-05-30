<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//losad do model
use App\TipoTwo;
use \App\Horizonte;

class Things extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    	$Thing = \App\Things::All();

        //adiciona a descrição das tabelas relacionadas
        if ($Thing) {
            //retorna o array Thing com as descricoes adicionadas.
            $Thing = $this->getDescricaoTabelasVinculo($Thing);
        }
    	return view('Things.index', compact('Thing'));
    }
    /**
    *@desc Método responsável por retornar a descrição das tabelas vínculo
    *@var array
    *@return
    */
    private function getDescricaoTabelasVinculo($Thing){

        if (!$Thing) return false;

        foreach ($Thing as $key => $value) {
            //$this->debug($value['TipoTwo_id']);
            $descricao = \App\TipoTwo::Find($value['TipoTwo_id']);

            //adiciona no array principal a descricao referente as tabelas relacionadas
            $Thing[$key]['DescricaoTipoTwo'] = $descricao['nome'];
        }

        return $Thing;
    }

    public function debug($val) {
        print "<pre>";
        print_r($val);
        exit();
    }

    public function adicionar(){

        $dadosTipoTwo = \App\TipoTwo::All();
    	return view('Things.adicionar', compact('dadosTipoTwo'));
    }


    public function salvar(Request $request){
    	//cadastro de todos no banco de dados
    	\App\Things::create($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Thing adicionado com sucesso!",
    		'class'=>"alert-success"
           ]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('Things.adicionar');
    }

    public function editar($id){
    	
    	$Thing = \App\Things::find($id);
        
        if (!$Thing) {
            \Session::flash('flash_message',[
                'msg'=>"Things não cadastrado!",
                'class'=>"alert-danger"
              ]);

            return redirect()->route('Things.adicionar');
        }
        
        //$dadosTipoTwo = \App\TipoTwo::Find($Thing['TipoTwo_id']);
        $dadosTipoTwo = \App\TipoTwo::All();
        return view('Things.editar', compact('Thing','dadosTipoTwo'));

    }

    public function atualizar(Request $request, $id){
    	//Atualizar os dados no banco de dados
    	\App\Things::find($id)->update($request->all());

    	//Alerta de cadastro com sucesso
    	\Session::flash('flash_message',[
    		'msg'=>"Things atualizado com sucesso!",
    		'class'=>"alert-sucess"
           ]);

    	//redireciona para a view do formulario de cadastro
    	return redirect()->route('Things.index');
    }

    public function deletar($id){
    	$Thing = \App\Things::find($id);
        
        $Horizonte = \App\Horizonte::where('Things_id','=',$id)->first();//->Find($id);
        //$this->debug($Horizonte);
        
        //verificacao de vinculo com tabela horizonte.
        if ($Horizonte) {
            $msg = "Thing não pode ser deletado pois pussui vinculo!";
            $sucesso_erro = "warning";
        } else {
            $Thing->delete();
    	    //Alerta de cadastro com sucesso
            $msg = "Thing deletado com sucesso!";
            $sucesso_erro = "success";
        }
        \Session::flash('flash_message',[
         'msg'=>$msg,
         'class'=>"alert-".$sucesso_erro
         ]);


	   	//redireciona para a view do formulario de cadastro
       return redirect()->route('Things.index');
   }
}
