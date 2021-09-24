<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    //

    protected $table = 'sucursal';
    protected $fillable = [
        'nombre',
        'id_comercio',
        'id_municipio'
    ];

    public function comercio()
    {
        return $this->belongsTo(Comercio::class, 'id_comercio', 'id');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio', 'id');
    }

    public function quejas()
    {

        return $this->hasMany(Queja::class, 'id_sucursal', 'id');
    }
}
