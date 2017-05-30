<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Things extends Model
{
	protected $fillable = ['nome', 'TipoTwo_id', 'potencia'];

	public function TipoTwo(){
		return $this->belongsTo('App\TipoTwo');
	}

	public function Horizonte(){
		return $this->belongsToMany('App\Horizonte');
	}
}
