<?php

namespace App\Http\Controllers\API\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Item;
use App\Model\LineaBase;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return [
            'data' => $items
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
        $item = Item::find($id);
        if (!isset($item)){
            return response([
                'errors' => [
                    'Item no encontrado'
                ]
            ], 404);
        }

        $lineaBaseId = $request->input('id_lineabase',NULL);
        $lineaBase = LineaBase::find($lineaBaseId);

        if (!isset($lineaBase) || $lineaBase->estado != 'abierto'){
            return response([
                'errors' => [
                    'Linea base no esta definida o esta cerrada'
                ]
            ], 404);
        }

        $item->nombre = urldecode($request->input('nombre'));
        $item->descripcion = urldecode($request->input('descripcion'));
        $item->id_lineabase = $lineaBaseId;
        $item->save();

        return [
            'data' => $item,
            'message' => 'Item editado correctamente'
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
        $item = Item::find($id);
        if (!isset($item)){
            return response([
                'errors' => [
                    'Item no encontrado'
                ]
            ], 404);
        }

        $item->delete();
        return [
            'data' => $item,
            'message' => 'Item eliminado correctamente'
        ];
    }
}
