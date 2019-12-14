<?php

namespace App\Http\Resources\Imagen;

use Illuminate\Http\Resources\Json\Resource;


class ImagenResource extends Resource
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
            "titulo" => $this->titulo,
            "descripcion" => $this->descripcion,
            "path" => url($this->path),
            "estado" => $this->estado,
            "id_publicador" => $this->id_publicador,
            "imagen_pequenha" => url($this->imagen_pequenha),
            "imagen_mediana" =>url( $this->imagen_mediana),
            "imagen_custom" => $this->imagen_custom,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
