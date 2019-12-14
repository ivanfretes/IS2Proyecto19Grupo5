<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sistema.template.index');
    }


    public function administracion(){

    }


    public function configuracion(){

    }


    public function desarrollo(){

    }

}
