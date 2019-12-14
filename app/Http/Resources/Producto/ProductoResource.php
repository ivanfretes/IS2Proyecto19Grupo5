<?php

namespace App\Http\Resources\Producto;

use Illuminate\Http\Resources\Json\Resource;

class ProductoResource extends Resource
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
            "fecha_publicacion" => $this->fecha_publicacion, 
            "tipo_producto" => $this->tipo_producto, 
            "estado" => $this->estado, 
            "codigo_interno" => $this->codigo_interno, 
            "codigo_externo" => $this->codigo_externo, 
            "id_publicador" => $this->id_publicador, 
            "created_at" => $this->created_at, 
            "updated_at" => $this->updated_at, 
            "slug" => $this->slug,
            "imagen_portada" => $this->imagen_portada, 
            "logo" => $this->logo, 
            //"imagen_portada_path" => $this->imagenPortada->path,
            "precio_defecto" => $this->precio_defecto
        ]; 
    }
}
