<?php

namespace App\Http\Controllers;

use App\Comercio;
use App\Departamento;
use App\Municipio;
use App\Region;
use App\Sucursal;
use Illuminate\Http\Request;

class QuejaController extends Controller
{
    //


    public function create(Request $request)
    {

        $query_comercio = $request->get('query_comercio') == null ? '' : $request->get('query_comercio');
        $id_comercio = $request->get('id_comercio') == null ? '' : $request->get('id_comercio');
        $comercios = Comercio::select('*');
        $sucursales = Sucursal::where('id_comercio', $id_comercio)->get();
        $comercio = Comercio::find($id_comercio);

        if ($query_comercio) {
            $comercios = $comercios->where('nombre', 'like', '%' . $query_comercio . '%');
        }


        $comercios = $comercios
            ->orderBy('nombre', 'asc')
            ->paginate(20);

        $regiones = Region::orderBy('nombre', 'asc')->get();
        $departamentos = Departamento::orderBy('nombre', 'asc')->get();
        $municipios = Municipio::orderBy('nombre', 'asc')->get();

        return view('queja.create',
            compact(
                'query_comercio',
                'comercios',
                'id_comercio',
                'comercio',
                'sucursales',
                'municipios',
                'departamentos',
                'regiones'

            )
        );

    }
}
