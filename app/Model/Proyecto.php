<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
	protected $guarded = array();


	/**
	 * Listado de fases de un proyecto
	 */
	public function fases(){
		return $this->hasMany(
			'App\Model\Fase',
			'id_proyecto',
			'id'
		);			
	}
}
