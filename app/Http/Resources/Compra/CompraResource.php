<?php

namespace App\Http\Resources\Compra;

use Illuminate\Http\Resources\Json\Resource;

class CompraResource extends Resource
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
            "compra" => $this,
            "compra_detalle" => $this->compraDetalle
        ];
    }
}
