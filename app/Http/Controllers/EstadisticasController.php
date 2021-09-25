<?php

namespace App\Http\Controllers;

use App\Comercio;
use App\Departamento;
use App\Municipio;
use App\Queja;
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


    public function ajax(Request $request)
    {

        $id_region = $request->get('id_region') == null ? '' : $request->get('id_region');
        $id_departamento = $request->get('id_departamento') == null ? '' : $request->get('id_departamento');
        $id_municipio = $request->get('id_municipio') == null ? '' : $request->get('id_municipio');
        $id_comercio = $request->get('id_comercio') == null ? '' : $request->get('id_comercio');

        $regiones = Region::all();

        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $comercios = Comercio::all();

        $quejas = Queja::where();

    }
}
