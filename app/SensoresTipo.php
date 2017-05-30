<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensoresTipo extends Model
{
	protected $fillable = ['nome'];

    public function Sensor(){
		return $this->hasMany('App\Sensor');
	}
}
