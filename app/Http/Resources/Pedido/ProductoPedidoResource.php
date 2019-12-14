<?php

namespace App\Http\Resources\Pedido;

use Illuminate\Http\Resources\Json\Resource;

class ProductoPedidoResource extends Resource
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
            "id_cliente"  => $this->id_cliente,
            "estado"  => $this->estado,
            "uuid"  => $this->uuid,
            "fecha_solicitud"  => $this->fecha_solicitud,
            "nro_pedido"  => $this->nro_pedido,
            "condicion_venta"  => $this->condicion_venta,
            "fecha_entrega"  => $this->fecha_entrega,
            "id_funcionario"  => $this->id_funcionario,
            "hora_entrega"  => $this->hora_entrega,
            "imagen"  => $this->imagen,
            "descripcion"  => $this->descripcion,
            "updated_at"  => $this->updated_at,
            "created_at"  => $this->created_at,
            "id"  => $this->id,

            // cliente
            "cliente" => $this->cliente,

            // detalles del pedido
            "pedido_detalle" => ProductoPedidoDetalleResource::collection(
                $this->pedidosItemsDetalle
            )
        ];
    }
}
