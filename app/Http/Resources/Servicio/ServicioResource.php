<?php

namespace App\Http\Resources\Servicio;

use Illuminate\Http\Resources\Json\Resource;

class ServicioResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $imagenPortada = NULL;
        if (isset($this->imagenPortada->path)){
            $imagenPortada = $this->imagenPortada->path;
        }

        $precioCosto = $this->precio_defecto_costo == NULL ? 0 : 
                        $this->precio_defecto_costo;
        

        return [
            "id" => $this->id, 
            "titulo" => $this->titulo, 
            "descripcion" => $this->descripcion,
            "fecha_publicacion" => $this->fecha_publicacion, 
            "tipo_servicio" => $this->tipo_servicio, 
            "estado" => $this->estado, 
            "codigo_interno" => $this->codigo_interno, 
            "codigo_externo" => $this->codigo_externo, 
            "id_publicador" => $this->id_publicador, 
            "created_at" => $this->created_at, 
            "updated_at" => $this->updated_at, 
            "slug" => $this->slug,
            "imagen_portada" => $this->imagen_portada, 
            "logo" => $this->logo, 
            "imagen_portada_path" => $imagenPortada,
            "precio_defecto" => $this->precio_defecto,
            "precio_defecto_costo" => $precioCosto,
        ]; 
    }
}
