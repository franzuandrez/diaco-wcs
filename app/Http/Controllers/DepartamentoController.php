<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Http\Requests\DepartamentoUpdateRequest;
use App\Region;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    //

    public function index(Request $request)
    {


        $query = $request->get('query');
        $departamentos = Departamento::select('departamento.*', 'region.nombre as region')
            ->join('region', 'region.id', '=', 'departamento.id_region')
            ->orwhere('departamento.nombre', 'LIKE', '%' . $query . '%')
            ->orwhere('region.nombre', 'LIKE', '%' . $query . '%')
            ->paginate(10);

        return view('departamentos.index', [
            'departamentos' => $departamentos,
            'query' => $query,
        ]);
    }

    public function edit($id)
    {

        $departamento = Departamento::findOrFail($id);
        $regiones = Region::all();

        return view('departamentos.edit', [
            'departamento' => $departamento,
            'regiones' => $regiones
        ]);


    }

    public function update(DepartamentoUpdateRequest $request, $id)
    {

        $departamento = Departamento::findOrFail($id);
        $departamento->nombre = $request->get('nombre');
        $departamento->id_region = $request->get('id_region');
        $departamento->update();


        return redirect()
            ->to('departamentos')
            ->with('success', 'Actualizado correctamente');

    }
}
