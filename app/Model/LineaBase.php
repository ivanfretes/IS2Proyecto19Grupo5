<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LineaBase extends Model
{
    protected $table = 'lineabase';
	protected $guarded = array();

	/**
	 * Proyecto al que pertene la fase
	 */
	public function fase(){
		return $this->belongsTo(
			'App\Model\Fase',
			'id_fase',
			'id'
		);	
	}

}
