<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    //


    protected $table = 'comercio';
    protected $primaryKey = 'id';


    protected $fillable = ['nombre'];


    public function sucursales()
    {

        return $this->hasMany(Sucursal::class, 'id_comercio', 'id');
    }

}
