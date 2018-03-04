<?php

namespace PuntoVenta\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function __construct(){
        $this->middleware('authenticate');
    }
    
    public function index()
    {
        return view('principal.index');
    }

}
