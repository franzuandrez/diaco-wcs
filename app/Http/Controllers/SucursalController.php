<?php

namespace App\Http\Controllers;

use App\Comercio;
use App\Departamento;
use App\Municipio;
use App\Region;
use App\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    //


    public function create($id)
    {


        $comercio = Comercio::findOrFail($id);
        $regiones = Region::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();


        return view('sucursales.create', [
            'regiones' => $regiones,
            'departamentos' => $departamentos,
            'municipios' => $municipios,
            'comercio' => $comercio,
        ]);


    }

    public function store(Request $request)
    {


        $comercio = Comercio::findOrFail($request->get('id_comercio'));
        $municipio = Municipio::findOrFail($request->get('id_municipio'));
        $sucursal = new Sucursal();
        $sucursal->id_comercio = $comercio->id;
        $sucursal->id_municipio = $municipio->id;
        $sucursal->nombre = $request->nombre;
        $sucursal->save();


        return redirect()

            ->route('comercios.edit', $comercio->id)
            ->with('success', 'Sucursal creada correctamente');


    }

    public function destroy($id)
    {
        $sucursal = Sucursal::findOrFail($id);

        $sucursal->delete();

        return response()->json('', 204);

    }
}
