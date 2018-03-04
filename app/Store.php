<?php

namespace PuntoVenta;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
   // use Notifiable;

    public $timestamps = false;

    protected $table = "store";
    protected $primaryKey = "store_id";
    protected $fillable = ['store_dsc','store_dsc_short','municipality_id'];
}
