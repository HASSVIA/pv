<?php

namespace PuntoVenta;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use Notifiable;

    public $timestamps = false;

    protected $table = "municipality";
    protected $primaryKey = "municipality_id";
    protected $fillable = ['municipality_dsc'];
}
