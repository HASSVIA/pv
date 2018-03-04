<?php

namespace PuntoVenta;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;

    protected $table = "profile";
    protected $primaryKey = "profile_id";
    protected $fillable = ['profile_dsc'];

}
