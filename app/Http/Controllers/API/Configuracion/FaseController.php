<?php

namespace App\Http\Controllers\API\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Fase;

class FaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proyectoId = $request->input('id_proyecto', NULL);
        if ($proyectoId == NULL){
            $fases = Fase::all(20);
        } else {
            $fases = Fase::where('id_proyecto', $proyectoId)
                ->paginate(20);
        }

        return [
            "data" => $fases
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $fase = Fase::find($id);
        if (!isset($fase)){
            return response([ 'errors' => [ 
                'Fase no encontrada' 
            ] ], 500);
        }

        $fase->nombre = urldecode($request->input('nombre'));
        $fase->descripcion = urldecode($request->input('descripcion'));
        $fase->id_proyecto = $request->input('id_proyecto');
        $fase->estado = $request->input('estado', 'abierto');
        $fase->save();

        return [
            "data" => $fase,
            "message" => 'Fase editada correctamente'
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
        $fase = Fase::find($id);
        if (!isset($fase)){
            return response([ 'errors' => [ 
                'Fase no encontrada' 
            ] ], 500);
        }

        $fase->delete();

        return [
            "data" => $fase,
            "message" => 'Fase eliminada correctamente'
        ];
    }
}
