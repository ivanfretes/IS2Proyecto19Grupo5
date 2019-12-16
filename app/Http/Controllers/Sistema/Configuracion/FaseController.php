<?php

namespace App\Http\Controllers\Sistema\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Fase;
use App\Model\Proyecto;

class FaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faseList = Fase::simplePaginate(20);

        return view('sistema.fase.list', [
            'faseList' => $faseList,
            'tituloPagina' => 'Listado de Fases'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fase = new Fase;
        $fase->nombre = 'Sin nombre';
        $fase->estado = 'abierto';
        $fase->save();

        return redirect(route('sistema.fases.edit', $fase->id));
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
        $fase = Fase::find($id);
        $proyectoList = Proyecto::all();

        if (!isset($fase)){
            return abort(404);
        }

        return view('sistema.fase.edit', [
            'fase' => $fase,
            'proyectoList' => $proyectoList,
            'tituloPagina' => 'Editar Fase'
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
