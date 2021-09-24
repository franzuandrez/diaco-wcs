<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegionUpdateRequest;
use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    //


    public function index(Request $request)
    {


        $query = $request->get('query');
        $regiones = Region::where('nombre', 'LIKE', '%' . $query . '%')
            ->paginate(10);


        return view('regiones.index', [
            'regiones' => $regiones,
            'query' => $query,
        ]);
    }


    public function edit($id)
    {


        $region = Region::findOrFail($id);


        return view('regiones.edit', [
            'region' => $region,
        ]);
    }

    public function update(RegionUpdateRequest $request, $id)
    {


        $region = Region::findOrFail($id);
        $region->nombre = $request->get('nombre');
        $region->update();


        return redirect()
            ->to('regiones')
            ->with('success', 'Actualizado correctamente');

    }
}
