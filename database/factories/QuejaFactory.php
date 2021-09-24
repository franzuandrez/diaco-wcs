<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Queja;
use Faker\Generator as Faker;
use Carbon\CarbonInterval;
$factory->define(Queja::class, function (Faker $faker) {

    $fecha_compra = $faker->dateTimeBetween('-3 years');
    $interval = CarbonInterval::make('1day');
    return [
        //
        'detalle' => $faker->text,
        'fecha_hora_ingreso' => $fecha_compra->add($interval),
        'fecha_compra' => $fecha_compra->format('Y-m-d'),
        'no_factura' => $faker->text(10),

    ];
});
