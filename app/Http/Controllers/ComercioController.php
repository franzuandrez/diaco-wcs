<?php

namespace App\Http\Controllers;

use App\Comercio;
use App\Departamento;
use App\Municipio;
use App\Region;
use App\Sucursal;
use Illuminate\Http\Request;

class ComercioController extends Controller
{
    //


    public function index(Request $request)
    {


        $query = $request->get('query');
        $comercios = Comercio::where('nombre', 'LIKE', '%' . $query . '%')
            ->paginate(10);

        return view('comercios.index', [
            'comercios' => $comercios,
            'query' => $query,
        ]);
    }


    public function edit($id)
    {

        $comercio = Comercio::findOrFail($id);
        $sucursales = Sucursal::select(
            'sucursal.*',
            'municipio.nombre as municipio',
            'departamento.nombre as departamento',
            'region.nombre as region'
        )
            ->join('municipio', 'municipio.id', '=', 'sucursal.id_municipio')
            ->join('departamento', 'departamento.id', '=', 'municipio.id_departamento')
            ->join('region', 'region.id', '=', 'departamento.id_region')
            ->where('id_comercio', $id)
            ->paginate(10);




        return view('comercios.edit', [
            'comercio' => $comercio,
            'sucursales' => $sucursales,

        ]);

    }


    public function update(Request $request, $id)
    {

    }

}
