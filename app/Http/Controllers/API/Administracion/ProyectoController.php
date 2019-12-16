<?php

namespace App\Http\Controllers\API\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Proyecto;
use App\User;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

  
    /**
     * Si 
     * 
     * @link /{id}/asignar-proyecto
     */
    public function asignarProyecto(Request $request, $id){
        
        // Verifica si existe el usuario
        $usuarioId = $request->input('id_usuario', NULL);
        $usuario = User::find($usuarioId);


        // Verfica si el usuario, tiene un proyecto abierto
        $proyectoAsignado = Proyecto::where('id_usuario', $usuarioId)
            ->where('estado', 'abierto')
            ->first();

        if (isset($proyectoAsignado)){
            return response([
                'errors' => [
                    'Usuario no encontrado, o ya se encuentra asignado a otro proyecto'
                ]
            ],500);
        }

        // Si todo va bien, ingresa al proyecto y actualiza el usuario
        $proyecto =  Proyecto::find($id);
        $proyecto->id_usuario = $usuario->id;
        $proyecto->save();

        return [
            'data' => [
                "proyecto" => $proyecto,
                "usuario" => $proyecto->usuario
            ],
            'message' => 'Proyecto Asignado correctamente'
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::find($id);
        if (!isset($proyecto)){
            return response([
                'errors' => [
                    'message' => 'Proyecto no encontrado'
                ]
            ], 500);
        }

        // Convierte la fecha de inicio al formato de la DB
        $fechaInicio = $request->input('fecha_inicio', NULL);
        if ($fechaInicio != NULL){
            $fechaInicio  = urldecode($fechaInicio);
            $fechaInicio = \Carbon\Carbon::createFromFormat(
                'd/m/Y', $fechaInicio
            );

            $proyecto->fecha_inicio = $fechaInicio->toDateString();
        }


        // Verifica que la fecha inicio exista, para poder genera la fecha fin
        // ademas si la fecha_fin es superior a la fecha inicio
        $fechaFin = $request->input('fecha_fin', NULL);
        if ($fechaFin != NULL && $fechaInicio != NULL){
            $fechaFin  = urldecode($fechaFin);
            $fechaFin = \Carbon\Carbon::createFromFormat(
                'd/m/Y', $fechaFin
            );

            if (!$fechaFin->gte($fechaInicio)){
                return response([
                    'errors'  => [
                        "Incongruencia de datos 'fecha inicio' o 'fecha fin'"
                    ]
                ], 500);   
            }
            $fechaFin = $fechaFin->toDateString();
        }

        $proyecto->fecha_fin = $fechaFin;
        $proyecto->estado = $request->input('estado');
        $proyecto->nombre = urldecode($request->input('nombre'));
        $proyecto->save();

        return [
            'data' => $proyecto, 
            'message' => 'Proyecto editado correctamente'
        ];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id);
        if (!isset($proyecto)){
            return response([
                'errors' => [
                    'message' => 'Proyecto no encontrado'
                ]
            ], 400);
        }

        $proyecto->delete();

        return [
            'data' => $proyecto,
            'message' => 'Proyecto eliminado correctamente'
        ];
    }


    /**
     * Muestra un proyecto en particular
     */
    public function show($id){
        $proyecto = Proyecto::find($id);
        if (!isset($proyecto)){
            return response([
                'errors' => [
                    'message' => 'Proyecto no encontrado'
                ]
            ], 400);
        }

        return [
            'data' => $proyecto
        ];
    }
}
