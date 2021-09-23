<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //


    protected $table = 'departamento';
    protected $fillable = [
        'nombre',
        'id_region'
    ];
    public $timestamps = false;

    public function region(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

        return $this->belongsTo(Region::class, 'id_region', 'id');
    }

}
