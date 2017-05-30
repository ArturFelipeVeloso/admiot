<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricoSensor extends Model
{
	protected $fillable = ['sensor_id', 'value'];

    public function Sensor(){
		return $this->belongsTo('App\Sensor');
	}
}
