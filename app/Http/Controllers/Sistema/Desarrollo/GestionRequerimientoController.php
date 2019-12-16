<?php

namespace App\Http\Controllers\Sistema\Desarrollo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Item;
use App\Model\Proyecto;
use App\Model\LineaBase;
use App\Model\GestionRequerimiento;
use Illuminate\Support\Facades\Auth;

class GestionRequerimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemList = Item::simplePaginate();

        return view('sistema.requerimiento.list', [
            'itemList' => $itemList,
            'tituloPagina' => 'Gestion de Requerimientos'
        ]);
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
        $item = Item::find($id);
        if (!isset($item)){
            return abort(404);
        }

        //  Visualizacion de Campos Padres
        $proyectoSeleccionado = NULL;
        $faseSeleccionada = NULL;
        $lineaBaseSeleccionada = NULL;

        $proyectoList = Proyecto::all();
        $faseList = [];
        $lineaBaseList = [];

        if (isset($item->lineabase)){
            $lineaBaseSeleccionada = $item->lineabase;
            $faseSeleccionada = $lineaBaseSeleccionada->fase;
            $proyectoSeleccionado = $faseSeleccionada->proyecto;

            // Listado de lineas Bases de una fase
            $lineaBaseList = LineaBase::where('id_fase', $faseSeleccionada->id)->get();
        }


        return view('sistema.requerimiento.edit', [
            'item' => $item,
            'proyectoList' => $proyectoList,
            'tituloPagina' => 'Editar Requerimiento',

            'proyectoSeleccionado' => $proyectoSeleccionado,
            'faseSeleccionada' => $faseSeleccionada,
            'lineaBaseSeleccionada' => $lineaBaseSeleccionada,
            'lineaBaseList' => $lineaBaseList
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
