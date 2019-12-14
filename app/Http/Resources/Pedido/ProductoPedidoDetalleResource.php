<?php

namespace App\Http\Resources\Pedido;

use Illuminate\Http\Resources\Json\Resource;

class ProductoPedidoDetalleResource extends Resource
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
            "id"=> $this->id,
            "cantidad"=> $this->cantidad,
            "descripcion"=> $this->descripcion,
            "id_producto"=> $this->id_producto,
            "id_pedido"=> $this->id_pedido,
            "precio_unitario"=> $this->precio_unitario,
            "precio_total"=> $this->precio_total,
            "created_at"=> $this->created_at,
            "updated_at"=> $this->updated_at,
            "disponible"=> $this->disponible,

            // producto
            "producto" => $this->producto
        ];
    }
}
