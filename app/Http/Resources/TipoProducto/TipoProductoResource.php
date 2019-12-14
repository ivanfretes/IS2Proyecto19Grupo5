<?php

namespace App\Http\Resources\TipoProducto;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Producto\ProductoResource;
use App\Model\Common\Producto;


class TipoProductoResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $productoList = Producto::where('estado', 'publicado')
            ->where('tipo_producto', $this->id)
            ->orderBy('titulo', 'asc')
            ->get();
        
        return [
            "categoria" => parent::toArray($this),
            "productos" => ProductoResource::collection($productoList)
        ];
    }
}
