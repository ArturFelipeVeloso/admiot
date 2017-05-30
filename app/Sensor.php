<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	protected $fillable = ['sensores_tipos_id', 'nome', 'value'];

    public function sensores_tipos(){
		return $this->belongsTo('App\SensoresTipo');
	}

	public function HistoricoSensor(){
		return $this->hasMany('App\HistoricoSensor');
	}
}
