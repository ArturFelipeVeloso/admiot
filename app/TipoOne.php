<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOne extends Model
{
	protected $fillable = ['nome'];

    public function Horizonte(){
		return $this->hasMany('App\Horizonte');
	}
}
