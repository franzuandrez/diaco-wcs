<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queja extends Model
{
    //

    public $timestamps = false;

    protected $dates = [
        'fecha_hora_ingreso'
    ];
}
