<?php

namespace PuntoVenta;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $table = "user";
    protected $primaryKey = "user_id";
    protected $fillable = ['user_name','user_login','password','user_mail','profile_id'];

    public function setPassword($val)
    {
        if(!empty($val)){
            $this->attributes['password'] = \Hash::make($val);
        }
    }
}
