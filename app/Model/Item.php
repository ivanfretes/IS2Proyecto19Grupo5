<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = 'items';
	protected $guarded = array();

    /**
	 * Proyecto al que pertene la fase
	 */
	public function lineabase(){
		return $this->belongsTo(
			'App\Model\LineaBase',
			'id_lineabase',
			'id'
		);	
	}
}
