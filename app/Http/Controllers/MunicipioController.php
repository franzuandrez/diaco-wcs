<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Http\Requests\MunicipioStoreRequest;
use App\Http\Requests\MunicipioUpdateRequest;
use App\Municipio;
use App\Region;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    //

    public function index(Request $request)
    {


        $query = $request->get('query');
        $municipios = Municipio::select(
            'municipio.*',
            'departamento.nombre as departamento',
            'region.nombre as region'
        )->join('departamento', 'departamento.id', '=', 'municipio.id_departamento')
            ->join('region', 'region.id', '=', 'departamento.id_region')
            ->orWhere('municipio.nombre', 'LIKE', '%' . $query . '%')
            ->orWhere('departamento.nombre', 'LIKE', '%' . $query . '%')
            ->orWhere('region.nombre', 'LIKE', '%' . $query . '%')
            ->paginate(10);

        return view('municipios.index', [
            'municipios' => $municipios,
            'query' => $query
        ]);
    }

    public function create()
    {

        $regiones = Region::get();
        $departamentos = Departamento::get();

        return view('municipios.create', [
            'regiones' => $regiones,
            'departamentos' => $departamentos,
        ]);
    }

    public function store(MunicipioStoreRequest $request)
    {

        $departamento = Departamento::findOrFail($request->id_departamento);

        $municipio = new Municipio();
        $municipio->nombre = $request->nombre;
        $municipio->id_departamento = $departamento->id;
        $municipio->save();

        return redirect()
            ->to('municipios')
            ->with('success', 'Municipio creado correctamente');
    }

    public function edit($id)
    {

        $municipio = Municipio::findOrFail($id);

        $departamento = Departamento::findOrFail($municipio->id_departamento);

        $region = Region::findOrFail($departamento->id_region);

        $regiones = Region::get();
        $departamentos = Departamento::get();


        return view('municipios.edit', [
            'municipio' => $municipio,
            'departamento' => $departamento,
            'region' => $region,
            'regiones' => $regiones,
            'departamentos' => $departamentos,
        ]);


    }

    public function update(MunicipioUpdateRequest $request, $id)
    {
        $municipio = Municipio::findOrFail($id);
        $departamento = Departamento::findOrFail($request->id_departamento);
        Region::findOrFail($request->id_region);
        $municipio->nombre = $request->nombre;
        $municipio->id_departamento = $departamento->id;
        $municipio->update();


        return redirect()
            ->to('municipios')
            ->with('success', 'Municipio actualizado correctamente');


    }
}
