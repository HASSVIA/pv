<?php

namespace PuntoVenta\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
Use Illuminate\Routing\Route;

use PuntoVenta\Http\Requests;
use PuntoVenta\Http\Controllers\Controller;
Use PuntoVenta\User;
Use PuntoVenta\State;
Use PuntoVenta\Municipality;
Use PuntoVenta\Store;

Use Session;
Use Redirect;

use PuntoVenta\Http\Requests\ProfileInsertRequest;


class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('authenticate');
    }
    
    public function index()
    {
        $profiles = DB::table('profile')
            ->select('profile_id','profile_dsc','active',DB::raw('IF(active = 1, "Activo", "Inactivo") AS status'))
            ->where("active","=",1)
            ->where("internal_profile","=",0)
            ->get();

        return view('perfil.index',compact('profiles'));
    }
    
    public function create()
    {
        $screen = DB::table("screen")
            ->join('profile_screen', 'screen.screen_id', '=', 'profile_screen.screen_id')
            ->where("screen.active","=",1)
            ->where("profile_id","=",Session::get("user_profile_id"))
            ->get();

        return view('perfil.create',compact('screen'));
    }

    public function store(ProfileInsertRequest $request)
    {
        $id = DB::table('profile')->insertGetId([
            'profile_dsc' => $request['profile_dsc'],
            'h_user_id' => Session::get('user_id')
        ]);
           
        $SelectedScreen = $request->get('screens');
        if(!empty($SelectedScreen))
        {
            foreach($SelectedScreen as $screen){
                DB::table('profile_screen')->Insert([
                    'profile_id' => $id,
                    'screen_id' => $screen,
                    'h_user_id' => Session::get('user_id')
                ]);
            }
        }

        Session::flash('success','Se ha registrado un nuevo perfil');
        return Redirect::to('Perfil');
    }

    public function edit($id)
    {
        $profile = DB::table('profile')
            ->select('profile_id','profile_dsc','active',DB::raw('IF(active = 1, "Activo", "Inactivo") AS status'))
            ->where("active","=",1)
            ->where("internal_profile","=",0)
            ->where("profile_id","=",$id)
            ->first();
        $screen = DB::table("screen")
            ->join('profile_screen', 'screen.screen_id', '=', 'profile_screen.screen_id')
            ->where("screen.active","=",1)
            ->where("profile_id","=",Session::get("user_profile_id"))
            ->get();

        Session::flash('edit','true');
        return view('perfil.edit',['profile'=>$profile],compact('screen'));
    }

    public function update($id, ProfileInsertRequest $request)
    {
        DB::table('profile')
        ->where('profile_id', $id)
        ->update([
            'profile_dsc' => $request['profile_dsc'],
            'h_user_id' => Session::get('user_id')
        ]);

    //Se borran todos los permisos sobre tiendas antes de volver a insertar
    DB::table('profile_screen')
        ->where('profile_id', '=', $id)
        ->delete();

    $SelectedScreen = $request->get('screens');
    if(!empty($SelectedScreen))
    {
        foreach($SelectedScreen as $screen){
            DB::table('profile_screen')->Insert([
                'profile_id' => $id,
                'screen_id' => $screen,
                'h_user_id' => Session::get('user_id')
            ]);
        }
    }


    Session::flash('success','El perfil ha sido modificado exitosamente.');
    return Redirect::to('Perfil');
    }
}

