<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Queja;
use Faker\Generator as Faker;
use Carbon\CarbonInterval;

$factory->define(Queja::class, function (Faker $faker) {

    $fecha_compra = $faker->dateTimeBetween('-8 months');
    $interval = CarbonInterval::make('2days');
    return [
        //
        'detalle' => $faker->text,
        'fecha_hora_ingreso' => $fecha_compra->sub($interval),
        'fecha_compra' => $fecha_compra->format('Y-m-d'),
        'no_factura' => $faker->text(10),

    ];
});
