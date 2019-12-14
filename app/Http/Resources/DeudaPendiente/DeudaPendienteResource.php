<?php

namespace App\Http\Resources\DeudaPendiente;

use Illuminate\Http\Resources\Json\Resource;

class DeudaPendienteResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
