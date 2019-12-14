<?php

namespace App\Http\Resources\Pedido;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Imagen\ImagenResource;

class PedidoImagenResource extends Resource
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
            "id" => $this->id,
            "id_funcionario" => $this->id_funcionario,
            "fecha_solicitud" => $this->fecha_solicitud,
            "fecha_entrega" => $this->fecha_entrega,
            "imagen" => $this->imagen,
            "imagen_pedido" => new ImagenResource($this->imagenPedido),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "descripcion" => $this->descripcion,
            "estado" => $this->estado
        ];
    }
}
