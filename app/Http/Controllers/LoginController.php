<?php

namespace PuntoVenta\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
Use Illuminate\Routing\Route;

use PuntoVenta\Http\Requests;
use PuntoVenta\Http\Controllers\Controller;

use PuntoVenta\Http\Requests\LoginRequest;

use Auth;
Use Session;
Use Redirect;

class LoginController extends Controller
{

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function create()
    {
        return Redirect::to('/');
    }
    public function store(LoginRequest $request)
    {
        if(Auth::attempt(['user_login' => $request['user_login'],'password' => $request['user_password'],'active' => 1]))
        {
            $user = DB::table('user')
                ->select('user_id','user_login','user_name','user.profile_id','profile_dsc')
                ->join('profile','user.profile_id','=','profile.profile_id')
                ->where('user_login',$request['user_login'])
                ->first();

            Session::put('user_id', $user->user_id);
            Session::put('user_login', $user->user_login);
            Session::put('user_name', $user->user_name);
            Session::put('user_profile_id', $user->profile_id);
            Session::put('user_profile', $user->profile_dsc);

            return Redirect::to('MisTiendas');
        }

        Session::flash('error','Los datos son incorrectos');
        return Redirect::to('/');
    }


    public function index()
    {
        return view('login.index');
    }
    public function update()
    {

    }
    public function edit($id)
    {

    }
    public function destroy($id)
    {

    }    
    public function show($id)
    {

    }
}
