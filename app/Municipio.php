<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //

    protected $table = 'municipio';
    protected $fillable = ['nombre', 'id_departamento'];
    public $timestamps = false;


    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento', 'id');

    }

}
