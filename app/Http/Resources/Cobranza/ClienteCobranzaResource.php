<?php

namespace App\Http\Resources\Cobranza;

use Illuminate\Http\Resources\Json\Resource;

class ClienteCobranzaResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "cliente" => parent::toArray($request),
            "contrato_servicio" => ContratoServicioResource::collection(
                $this->contratos
            )
        ];
    }
}
