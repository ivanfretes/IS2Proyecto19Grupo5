<?php

namespace App\Http\Controllers\API\Administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioList = User::paginate(20);

        return $usuarioList;
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
     * Busca un usuario
     */
    public function buscar(Request $request){
        $q = $request->input('q', NULL);
        if ($q != NULL){
            $q = strtolower($q);

            $usuarioList = User::where(function($query) use ($q)
            {   
                $query->orWhereRaw("LOWER(name) LIKE '%$q%'");
                $query->orWhere([
                    'ci' => $q,
                ]);
            });

            return $usuarioList->paginate(20); 
        } 
        
        return [
            "data" => [],
            "message" => "Ingrese nombre o ci del usuario"
        ];
    }


    /**
     * @test - Prueba para asignar rol a usuario
     */
    public function asignarRol(Request $request, $id){
        $rol = urldecode($request->input('rol', 'administracion'));

        $usuario = User::find($id);
        if (!isset($usuario)){
            return response([
                'errors' => [
                    'Usuario no encontrado'
                ]
            ], 500);
        }

        $_rol = Role::where('name', $rol)->first();
        if (!isset($_rol)){
            return response([
                'errors' => [
                    'Rol no disponible'
                ]
            ], 500);
        }

        $usuario->assignRole($rol);    
    
        return [
            'message' => 'Rol asignado correctamente',
            'data' => $usuario
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
        $usuario = User::find($id);
        if (!isset($usuario)){
            return response([
                'errors' => [
                    'Usuario no encontrado'
                ]
            ], 500);
        }

        $usuario->name = $request->input('name');
        $usuario->ci = $request->input('ci');

        return [
            'data' => $usuario,
            'message' => 'Usuario eliminado correctamente'
        ];
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
        $usuario = User::find($id);
        if (!isset($usuario)){
            return response([
                'errors' => [
                    'Usuario no encontrado'
                ]
            ], 500);
        }

        $usuario->delete();
        return [
            'data' => $usuario,
            'message' => 'Usuario eliminado correctamente'
        ];
    }
}
