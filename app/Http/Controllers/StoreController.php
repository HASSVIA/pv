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

use PuntoVenta\Http\Requests\StoreInsertRequest;
use PuntoVenta\Http\Requests\StoreUpdateRequest;

Use Session;
Use Redirect;

class StoreController extends Controller
{
    public function __construct(){
        $this->middleware('authenticate');
    }
    
    public function index()
    {
        $stores = DB::table('store')
                ->select('store_id','store_dsc','municipality_dsc','state_dsc','store.active',
                    DB::raw('IF(store.active = 1, "Activo", "Inactivo") AS status'))
                ->leftjoin('municipality', 'store.municipality_id', '=', 'municipality.municipality_id')
                ->leftjoin('state', 'state.state_id', '=', 'municipality.state_id')
                ->get();


        return view('tienda.index',compact('stores'));
    }


    public function create()
    {
        $states = DB::table("state")->pluck("state_dsc","state_id")->all();

        return view('tienda.create',compact('states'));
    }
    public function store(StoreInsertRequest $request)
    {
        DB::table('store')
            ->insert([
                'store_dsc' => $request['store_dsc'],
                'store_dsc_short' => $request['store_dsc_short'],
                'municipality_id' => $request['municipality_id'],
                'h_user_id' => Session::get('user_id')
            ]);
        
        Session::flash('success','Se ha registrado una nueva tienda');
        return Redirect::to('Tienda');
    }


    public function edit($id)
    {
        $states = DB::table("state")->pluck("state_dsc","state_id")->all();
        $store = DB::table('store')
        ->select('store_id','store_dsc','store_dsc_short','store.municipality_id','state_id',
                'store.active',DB::raw('IF(store.active = 1, "Activo", "Inactivo") AS status'))
        ->leftjoin('municipality', 'store.municipality_id', '=', 'municipality.municipality_id')
        ->where('store_id',$id)
        ->first();

        Session::flash('edit','true');

        return view('tienda.edit',['store'=>$store],compact('states'));
    }
    public function update($id, StoreUpdateRequest $request)
    {
        DB::table('store')
        ->where('store_id', $id)
        ->update(['store_dsc' => $request['store_dsc'],
        'store_dsc_short' => $request['store_dsc_short'],
        'municipality_id' => $request['municipality_id'],
        'h_user_id' => Session::get('user_id')]);

        Session::flash('success','La tienda ha sido modificado exitosamente.');

        return Redirect::to('Tienda');
    }


    public function destroy($id)
    {
        DB::table('store')
        ->where('store_id', $id)
        ->update(['active' => DB::raw('IF(active = 1,0,1)')]);

        Session::flash('success','La tienda ha sido inactivada exitosamente.');

        return Redirect::to('Tienda');
    }    
    public function show($id)
    {
        $store = DB::table('store')
        ->select('store_id','store_dsc','store_dsc_short','store.active')
        ->where('store_id',$id)
        ->first();

        return view('tienda.delete',['store'=>$store]);
    }
}
