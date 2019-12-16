<?php

namespace App\Http\Controllers\API\Desarrollo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GestionRequerimiento;
use App\Model\Item;

class GestionRequerimientoController extends Controller
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
        $item = Item::find($id);
        if (!isset($item)){
            return response([
                'errors' => [
                    'Item no encontrado'
                ]
            ], 404);
        }

        $gRequerimiento = new GestionRequerimiento;
        $gRequerimiento->nombre = urldecode(
            $request->input('nombre')
        );
        $gRequerimiento->descripcion = urldecode(
            $request->input('descripcion')
        );
        $gRequerimiento->id_item = $item->id;
        
        $gRequerimiento->version = substr(sha1(\Carbon\Carbon::now()), 0, 30);
        $gRequerimiento->save();

        return [
            'data' => $gRequerimiento,
            'message' => 'Gestion de Requerimiento editado correctamente'
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
        //
    }
}
