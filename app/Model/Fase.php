<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    protected $table = 'fases';
	protected $guarded = array();

	/**
	 * Proyecto al que pertene la fase
	 */
	public function proyecto(){
		return $this->belongsTo(
			'App\Model\Proyecto',
			'id_proyecto',
			'id'
		);	
	}

}
