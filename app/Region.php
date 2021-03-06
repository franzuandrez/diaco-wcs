<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //


    protected $table = 'region';
    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];


    public function departamentos()
    {

        return $this->hasMany(Departamento::class, 'id_region', 'id');
    }
}
