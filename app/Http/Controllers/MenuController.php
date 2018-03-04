<?php

namespace PuntoVenta\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
Use Illuminate\Routing\Route;

use PuntoVenta\Http\Requests;
use PuntoVenta\Http\Controllers\Controller;

use Auth;
Use Session;
Use Redirect;

class MenuController extends Controller
{
    public function index()
    {
        $menu = DB::table('profile_screen')
            ->select('screen.screen_id',DB::raw('UPPER(screen.screen_dsc) screen_dsc'),'screen_url','screen_icon','screen_parent_id')
            ->join('screen', 'screen.screen_id', '=', 'profile_screen.screen_id')
            ->where('screen.active','=',1)
            ->where('profile_id','=',Session::get('user_profile_id'))
            ->orderBy('screen.screen_order','Asc')
            ->get();


        return view('layout.menu',compact('menu'));
    }
}
