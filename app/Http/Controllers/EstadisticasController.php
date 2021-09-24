<?php

namespace App\Http\Controllers;

use App\Comercio;
use App\Departamento;
use App\Municipio;
use App\Region;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    //


    public function index(Request $request)
    {


        $regiones = Region::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $comercios = Comercio::all();

        return view('estadisticas.index',
            [
                'regiones' => $regiones,
                'departamentos' => $departamentos,
                'municipios' => $municipios,
                'comercios' => $comercios
            ]);
    }
}
