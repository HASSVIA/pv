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
Use PuntoVenta\Profile;

use PuntoVenta\Http\Requests\UserInsertRequest;
use PuntoVenta\Http\Requests\UserUpdateRequest;

Use Session;
Use Redirect;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('authenticate');
        $this->middleware('store');
    }

    public function index()
    {
        $users = DB::table('user')
                ->select('user_id','user_name','user_login','user_mail','user.profile_id','profile_dsc',
                        'user.active',DB::raw('IF(user.active = 1, "Activo", "Inactivo") AS status'))
                ->join('profile', 'user.profile_id', '=', 'profile.profile_id')
                ->where('user.internal_user',0)
                ->where('profile.internal_profile',0)
                ->get();

        return view('usuario.index',compact('users'));
    }
    public function create()
    {
        $stores = DB::table("store")
            ->where("active","=",1)
            ->get();
        $profiles = DB::table("profile")
            ->where("active","=",1)
            ->where("internal_profile","=",0)
            ->pluck("profile_dsc","profile_id")
            ->all();

        return view('usuario.create',compact('profiles','stores'));
    }
    public function update($id, UserUpdateRequest $request)
    {
        DB::table('user')
            ->where('user_id', $id)
            ->update([
                'user_name' => $request['user_name'],
                'user_login' => $request['user_login'],
                'password' => bcrypt($request['user_password']),
                'user_mail' => $request['user_mail'],
                'profile_id' => $request['profile_id'],
                'h_user_id' => Session::get('user_id')
            ]);
    
        //Se borran todos los permisos sobre tiendas antes de volver a insertar
        DB::table('user_store')
            ->where('user_id', '=', $id)
            ->delete();

        $SelectedStores = $request->get('stores');
        if(!empty($SelectedStores))
        {
            foreach($SelectedStores as $store){
                DB::table('user_store')->Insert([
                    'user_id' => $id,
                    'store_id' => $store,
                    'h_user_id' => Session::get('user_id')
                ]);
            }
        }


        Session::flash('success','El usuario ha sido modificado exitosamente.');
        return Redirect::to('Usuario');
    }
    public function edit($id)
    {
        $stores = DB::table("store")
            ->where("active","=",1)
            ->get();
        $profiles = DB::table("profile")
            ->where("active","=",1)
            ->where("internal_profile","=",0)
            ->pluck("profile_dsc","profile_id")
            ->all();
        $user = DB::table('user')
            ->select('user_id','user_name','user_login','password','user_mail','profile_id')
            ->where("user_id","=",$id)
            ->first();            
        
        Session::flash('edit','true');
        return view('usuario.edit',['user'=>$user],compact('profiles','stores'));
    }

    public function store(UserInsertRequest $request)
    {
        $id = DB::table('user')->insertGetId([
            'user_name' => $request['user_name'],
            'user_login' => $request['user_login'],
            'password' => bcrypt($request['user_password']),
            'user_mail' => $request['user_mail'],
            'profile_id' => $request['profile_id'],
            'h_user_id' => Session::get('user_id')
        ]);
           
        $SelectedStores = $request->get('stores');
        if(!empty($SelectedStores))
        {
            foreach($SelectedStores as $store){
                DB::table('user_store')->Insert([
                    'user_id' => $id,
                    'store_id' => $store,
                    'h_user_id' => Session::get('user_id')
                ]);
            }
        }

        Session::flash('success','Se ha registrado un nuevo usuario');
        return Redirect::to('Usuario');
    }

    public function destroy($id)
    {
        DB::table('user')
            ->where('user_id', $id)
            ->update([
                'active' => DB::raw('IF(active = 1,0,1)'),
                'h_user_id' => Session::get('user_id')
                ]);

        Session::flash('success','El usuario ha sido cambiado de estatus exitosamente.');
        return Redirect::to('Usuario');
    }    
    public function show($id)
    {
        $user = DB::table('user')
            ->select('user_id','user_name','user_login','password','user_mail','profile_id','active')
            ->where("user_id","=",$id)
            ->first(); 

        return view('usuario.delete',['user'=>$user]);
    }
}
