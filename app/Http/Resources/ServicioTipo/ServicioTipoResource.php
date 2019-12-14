<?php

namespace App\Http\Resources\ServicioTipo;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Servicio\ServicioResource;
use App\Model\Negocio\Servicio;


class ServicioTipoResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $servList = Servicio::where('estado', 'activo')
            ->where('tipo_servicio', $this->id)
            ->orderBy('titulo', 'asc')
            ->get();
        
        return [
            "categoria" => parent::toArray($this),
            "productos" => ServicioResource::collection($servList)
        ];
    }
}
