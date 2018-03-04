<?php

namespace PuntoVenta\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
Use Illuminate\Routing\Route;

use PuntoVenta\Http\Requests;
use PuntoVenta\Http\Controllers\Controller;
Use Redirect;
Use Session;

class MyStoreController extends Controller
{
    public function __construct(){
        $this->middleware('authenticate');
    }
    
    public function index()
    {
        // Regresa las tiendas que puede trabajar el usuario

        $stores = DB::table('store')
                ->select('store.store_id','store_dsc','store_dsc_short','municipality_dsc','state_dsc')
                ->join('user_store','user_store.store_id','=','store.store_id')
                ->leftjoin('municipality', 'store.municipality_id', '=', 'municipality.municipality_id')
                ->leftjoin('state', 'state.state_id', '=', 'municipality.state_id')
                ->where('store.active',1)
                ->where('user_store.user_id','=',Session::get('user_id'))
                ->get();


        return view('login.store',compact('stores'));
    }
    public function edit($id)
    {
        // Se setea la tienda con la que estara trabajando el usuario
        $store = DB::table('store')
        ->select('store_id','store_dsc','store_dsc_short')
        ->where('store_id',$id)
        ->first();

        Session::put('aux_store_id', $store->store_id);
        Session::put('aux_store_name', $store->store_dsc_short);

        return Redirect::to('Principal');
    }

    public function create()
    {

    }
    public function update($id, UserUpdateRequest $request)
    {

    }
    public function store(UserInsertRequest $request)
    {

    }
    public function destroy($id)
    {

    }    
    public function show($id)
    {

    }
}
