<?php

namespace PuntoVenta\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;

class Store
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if(Session::get('aux_store_id') == 0)
        {
            Session::flash('select_store', 'Debe seleccionar una tienda');

            return redirect()->guest('MisTiendas');
        }

        return $next($request);
    }
}
