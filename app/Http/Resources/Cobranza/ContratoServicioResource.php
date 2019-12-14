<?php

namespace App\Http\Resources\Cobranza;

use Illuminate\Http\Resources\Json\Resource;

class ContratoServicioResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        if ($this->estado != 'inactivo'){
            return [
                "id" => $this->id,
                "id_cliente" => $this->id_cliente,
                "id_servicio" => $this->id_servicio,
                "fecha_inicio" => $this->fecha_inicio,
                "fecha_fin" => $this->fecha_fin,
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
                "estado" => $this->estado,
                "cant_meses" => $this->cant_meses,
                "nombre_apellido_cliente" => $this->cliente->nombre." ".$this->cliente->apellido,
                
                "cliente" => $this->cliente,
                "servicio" => $this->servicio,
                "vencimientos" => VencimientoResource::collection(
                    $this->vencimientos
                ),
            ];    
        }

        return null;
        
    }
}
