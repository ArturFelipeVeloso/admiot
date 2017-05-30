<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horizonte extends Model
{
	protected $fillable = ['Things_id', 'TipoOne_id', 'inicio', 'fim', 'duracao', 'consumoduracao'];

    public function Things(){
		return $this->belongsToMany('App\Things');
	}

	public function TipoOne(){
		return $this->belongsTo('App\TipoOne');
	}

	/*public function verificaVinculo($id){
		'select Things_id from Horizonte where Things_id = $id'
	}*/
}
