<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTwo extends Model
{
	protected $fillable = ['nome'];

    public function Things(){
		return $this->hasMany('App\Things');
	}
}
