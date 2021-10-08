<?php

namespace App\Http\Controllers;

use App\Comercio;
use App\Departamento;
use App\Http\Requests\QuejaStoreRequest;
use App\Municipio;
use App\Queja;
use App\Region;
use App\Sucursal;
use Carbon\Carbon;
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
            ->paginate(8);

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

    public function store(QuejaStoreRequest $request)
    {


        $sucursal = Sucursal::find($request->get('id_sucursal'));

        if (!$sucursal) {
            return redirect()->back()->withErrors(['Sucursal no encotrada']);
        }

        $queja = new Queja();
        $queja->detalle = $request->get('detalle');
        $queja->fecha_hora_ingreso = Carbon::now();
        $queja->fecha_compra = Carbon::now();
        $queja->no_factura = Carbon::now()->toString();
        $queja->id_sucursal = $request->get('id_sucursal');
        $queja->save();


        return redirect()
            ->to('quejas')
            ->with(
                'success',
                '¡Su queja ha sido tomada en cuenta!'
            );


    }
}
