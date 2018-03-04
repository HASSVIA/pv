<?php

namespace PuntoVenta\Http\Controllers;

use Illuminate\Http\Request;
Use PuntoVenta\Parameter;

class ParameterController extends Controller
{
    public function valor($id)
    {
        $parameter = Parameter::find($id);

        return $parameter;
    }
}
