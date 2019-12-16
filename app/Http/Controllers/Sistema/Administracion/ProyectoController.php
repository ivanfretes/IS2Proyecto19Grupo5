<?php

namespace App\Http\Controllers\Sistema\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Proyecto;



class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectoList = Proyecto::paginate(20);

        return view('sistema.proyecto.list', [
            'proyectoList' => $proyectoList,
            'tituloPagina' => 'Listado de Proyectos'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyecto = new Proyecto;
        $proyecto->nombre = 'Sin titulo';
        $proyecto->estado = 'abierto';
        $proyecto->fecha_inicio = \Carbon\Carbon::now();
        $proyecto->save();

        return redirect(route('sistema.proyectos.edit', $proyecto->id));
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
        $proyecto = Proyecto::find($id);
        if (!isset($proyecto)){
            return abort(404);
        }

        return view('sistema.proyecto.edit', [
            'proyecto' => $proyecto,
            'usuario' => $proyecto->usuario,
            'tituloPagina' => 'Editar Proyecto'
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
        
    }
}
