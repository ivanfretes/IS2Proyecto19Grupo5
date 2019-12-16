<?php

namespace App\Http\Controllers\Sistema\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Fase;
use App\Model\LineaBase;
use App\Model\Proyecto;

class LineaBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lineaBaseList = LineaBase::simplePaginate(20);

        return view('sistema.lineabase.list', [
            'lineaBaseList' => $lineaBaseList,
            'tituloPagina' => 'Listado de Lineas Bases'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lBase = new LineaBase;
        $lBase->nombre = 'Sin nombre';
        $lBase->save();

        return redirect(route('sistema.linea-base.edit', $lBase->id));
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
        $lBase = LineaBase::find($id);
        if (!isset($lBase)){
            return abort(404);
        }

        // Si el proyecto y la fase estan seleccionados
        $proyectoSeleccionado = NULL;
        $faseSeleccionada = NULL;
        if (isset($lBase->fase->proyecto)){
            $proyectoSeleccionado = $lBase->fase->proyecto;
            $faseSeleccionada = $lBase->fase;
        }

        $proyectoList = Proyecto::all();

        return view('sistema.lineabase.edit', [
            'lineaBase' => $lBase,
            'proyectoList' => $proyectoList, 
            'proyectoSeleccionado' => $proyectoSeleccionado,
            'faseSeleccionada' => $faseSeleccionada,
            'tituloPagina' => 'Editar Linea Base'
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
