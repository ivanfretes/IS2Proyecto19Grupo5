<?php

namespace App\Http\Controllers\Reporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporteController extends Controller
{
    public function index(){

    }


    public function item(){}

    public function proyecto(Request $request){

        $usuarioId = $request->input('id_usuario', NULL);
        $fechaInicio = $request->input('fecha_inicio', );
        $fechaFin = $request->input('fecha_fin', NULL);

        if ($usuarioId == NULL){
            $proyectoList = \App\Model\Proyecto::paginate(20);    
        } else {
            $proyectoList = \App\Model\Proyecto::where('id_usuario', $usuarioId)
                ->paginate(20);
        }

        return view('sistema.reporte.proyecto', [
            'proyectoList' => $proyectoList,
            'tituloPagina' => 'Reporte de Proyectos',

            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin
        ]);
    	
    }

}
