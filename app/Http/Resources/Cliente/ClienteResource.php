<?php

namespace App\Http\Resources\Cliente;

use Illuminate\Http\Resources\Json\Resource;

class ClienteResource extends Resource
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
            "contrato_servicio" => $this->contrato
        ];
    }
}
