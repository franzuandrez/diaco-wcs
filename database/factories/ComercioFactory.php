<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comercio;
use Faker\Generator as Faker;

$factory->define(Comercio::class, function (Faker $faker) {

    $prefix = [
        'Tienda',
        'Supermercado',
        'Panaderia',
        'Clinica',
        'Repuestos y Taller',
        'Cafetería',
        'Librería',
        'Agromayoreo',
        'Supercito',
        'Abarroteria',
        'Comer',
        'Restaurante',
        'Hotel',
        'Farmacia',
        'Venta de electrodomesticos',
        'Café internet',
        'Ciber Juegos',
        'Miscelanea',
        'Paca',
    ];

    return [
        //
        'nombre' => $prefix[$faker->randomFloat(0, 0, count($prefix) - 1)] . ' ' .
            $faker->firstName() . ' ' .
            $faker->lastName() . '.'
    ];
});
