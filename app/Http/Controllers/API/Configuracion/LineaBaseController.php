<?php

namespace App\Http\Controllers\API\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\LineaBase;


class LineaBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $faseId = $request->input('id_fase', NULL);
        if ($faseId == NULL){
            $lineaBaseList = LineaBase::all();
        } else {
            $lineaBaseList = LineaBase::where('id_fase', $faseId)
                ->get();
        }

        return [
            "data" => $lineaBaseList
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lBase = LineaBase::find($id);
        if (!isset($lBase)){
            return response([ 'errors' => [ 
                'Linea Base no encontrada' 
            ] ], 500);
        }

        $lBase->nombre = urldecode($request->input('nombre'));
        $lBase->descripcion = urldecode($request->input('descripcion'));
        $lBase->id_fase = $request->input('id_fase');
        $lBase->estado = $request->input('estado');
        $lBase->save();

        return [
            "data" => $lBase,
            "message" => 'Linea Base editada correctamente'
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
        $lBase = LineaBase::find($id);
        if (!isset($lBase)){
            return response([ 'errors' => [ 
                'Linea Base no encontrada' 
            ] ], 500);
        }

        $lBase->delete();

        return [
            "data" => $lBase,
            "message" => 'Linea Base eliminada correctamente'
        ];
    }
}
