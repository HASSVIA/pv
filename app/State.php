<?php

namespace PuntoVenta;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    // use Notifiable;

    public $timestamps = false;

    protected $table = "state";
    protected $primaryKey = "state_id";
    protected $fillable = ['state_dsc','municipality_id'];
}
