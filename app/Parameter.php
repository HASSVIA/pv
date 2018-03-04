<?php

namespace PuntoVenta;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    public $timestamps = false;

    protected $table = "parameter";
    protected $primaryKey = "parameter_id";
    protected $fillable = ['parameter_group_id','parameter_dsc','parameter_value','catalog_id'];
}
