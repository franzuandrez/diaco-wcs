<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sucursal;
use Faker\Generator as Faker;

$factory->define(Sucursal::class, function (Faker $faker) {
    return [
        //
        'nombre' => 'Sucursal ' . $faker->lastName,
        'id_municipio' => $faker->randomFloat(0, 1, 324)
    ];
});
