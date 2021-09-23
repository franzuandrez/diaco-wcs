<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    //


    protected $table = 'comercio';
    protected $primaryKey = 'id';


    protected $fillable = ['nombre'];

}
