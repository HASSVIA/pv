<?php

namespace PuntoVenta\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
Use Illuminate\Routing\Route;

use PuntoVenta\Http\Requests;
use PuntoVenta\Http\Controllers\Controller;

Use Session;
Use Redirect;

class AjaxController extends Controller
{
    public function __construct(){
        $this->middleware('authenticate');
    }

    public function Municipality($id)
    {
        $mun = DB::table("municipality")
            ->where('state_id',$id)
            ->pluck("municipality_dsc","municipality_id")->all();

        return json_encode($mun);
    }

    public function parameter($id)
    {
        $parameter = DB::table('parameter')
            ->select(DB::raw('COALESCE(catalog_option_dsc,parameter_value,parameter_default) AS value'))
            ->leftjoin('catalog_option','catalog_option.catalog_option_id','=','parameter.catalog_option_id')
            ->where('parameter_id',$id)
            ->where('scope_public',1)
            ->where('parameter.active',1)
            ->first();

        return json_encode($parameter);
    }

    public function UserStore($id)
    {
        $perm = DB::table("user_store")
        ->where('user_id',$id)
        ->pluck(DB::raw("'store_id' AS store_id"),"store_id")
        ->all();

        return json_encode($perm);
    }

    public function ProfileScreen($id)
    {
        $perm = DB::table("profile_screen")
            ->where("profile_id",$id)
            ->pluck(DB::raw("'screen_id' AS screen_id"),"screen_id")
            ->all();

        return json_encode($perm);    
    }
}
