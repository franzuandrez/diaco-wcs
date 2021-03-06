<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $count = 150;
        factory(\App\Comercio::class, $count)->create()
            ->each(function ($comercio) {
                $comercio->sucursales()
                    ->createMany(factory(\App\Sucursal::class, rand(18, 30))
                        ->make()
                        ->toArray()
                    );
                $comercio->sucursales->each(function ($sucursal) {
                    $sucursal->quejas()
                        ->createMany(factory(\App\Queja::class, rand(1, 6))
                            ->make()
                            ->toArray());
                });
            });


    }
}
