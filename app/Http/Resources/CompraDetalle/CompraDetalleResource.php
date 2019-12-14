<?php

namespace App\Http\Resources\CompraDetalle;

use Illuminate\Http\Resources\Json\Resource;

class CompraDetalleResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        $cDetalle = parent::toArray($request);
        $cDetalle['compra'] = $this->compra;
        return $cDetalle;
    }
}
