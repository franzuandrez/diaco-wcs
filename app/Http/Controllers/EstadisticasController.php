<?php

namespace App\Http\Controllers;

use App\Comercio;
use App\Departamento;
use App\Municipio;
use App\Queja;
use App\Region;
use App\Sucursal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    //


    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {


        $quejas_anuales = Queja::select(
            'quejas.*',

            \DB::raw('month(fecha_compra) as month')

        )
            ->orderBy('fecha_compra', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'sale' => $item,
                    'month' => $this->get_month_name($item->month)
                ];
            })
            ->groupBy('month')->map(function ($item) {
                return $item->count();
            });

        $quejas_por_region = $this->get_quejas_por_region();
        $region_con_mas_quejas = $quejas_por_region->firstWhere('total', $quejas_por_region->max('total'));
        $ultimas_quejas = Queja::select(
            'quejas.detalle',
            'sucursal.nombre as sucursal',
            'comercio.nombre as comercio',
            'municipio.nombre as municipio',
            'departamento.nombre as departamento',
            'region.nombre as region'
        )
            ->orderBy('fecha_compra', 'desc')
            ->join('sucursal', 'sucursal.id', '=', 'quejas.id_sucursal')
            ->join('comercio', 'comercio.id', '=', 'sucursal.id_comercio')
            ->join('municipio', 'municipio.id', '=', 'sucursal.id_municipio')
            ->join('departamento', 'departamento.id', '=', 'municipio.id_departamento')
            ->join('region', 'region.id', '=', 'departamento.id_region')
            ->limit(10)
            ->get();


        return view('estadisticas.index',
            [
                'quejas_anuales_meses' => $quejas_anuales->keys(),
                'regiones' => $quejas_por_region->pluck('nombre'),
                'quejas_por_region' => $quejas_por_region->pluck('total'),
                'region_con_mas_quejas' => $region_con_mas_quejas,
                'quejas_anuales_total' => $quejas_anuales->values(),
                'ultimas_quejas' => $ultimas_quejas,
                'departamento_con_mas_quejas' => $this->get_departamento_con_mas_quejas(),
                'municipio_con_mas_quejas' => $this->get_municipio_con_mas_quejas()
            ]);
    }


    public function quejas(Request $request)
    {

        $start_date = $request->get('inicio');
        $end_date = $request->get('fin');

        $id_region = $request->get('id_region') == null ? '' : $request->get('id_region');
        $id_departamento = $request->get('id_departamento') == null ? '' : $request->get('id_departamento');
        $id_municipio = $request->get('id_municipio') == null ? '' : $request->get('id_municipio');
        $id_sucursal = $request->get('id_sucursal') == null ? '' : $request->get('id_sucursal');
        $id_comercio = $request->get('id_comercio') == null ? '' : $request->get('id_comercio');
        $regiones = Region::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $sucursales = Sucursal::all();
        $comercios = Comercio::all();
        $sucursal = Sucursal::find($id_sucursal);

        $quejas = Queja::select(
            'quejas.detalle',
            'quejas.fecha_hora_ingreso',
            'sucursal.nombre as sucursal',
            'comercio.nombre as comercio',
            'municipio.nombre as municipio',
            'departamento.nombre as departamento',
            'region.nombre as region'
        )
            ->orderBy('fecha_compra', 'desc')
            ->join('sucursal', 'sucursal.id', '=', 'quejas.id_sucursal')
            ->join('comercio', 'comercio.id', '=', 'sucursal.id_comercio')
            ->join('municipio', 'municipio.id', '=', 'sucursal.id_municipio')
            ->join('departamento', 'departamento.id', '=', 'municipio.id_departamento')
            ->join('region', 'region.id', '=', 'departamento.id_region');

        if ($id_region) {
            $quejas = $quejas->where('region.id', $id_region);
        }
        if ($id_departamento) {
            $quejas = $quejas->where('departamento.id', $id_departamento);
        }
        if ($id_municipio) {
            $quejas = $quejas->where('municipio.id', $id_municipio);
        }
        if ($id_sucursal) {
            $quejas = $quejas->where('sucursal.id', $id_sucursal);
        }
        if ($id_comercio) {
            $quejas = $quejas->where('comercio.id', $id_comercio);
        }

        if ($start_date && $end_date) {

            $start_date = Carbon::createFromFormat('Y-m-d', $start_date);
            $end_date = Carbon::createFromFormat('Y-m-d', $end_date);
            $quejas = $quejas->whereBetween('quejas.fecha_hora_ingreso', [$start_date, $end_date]);
            $start_date = $start_date->format('Y-m-d');
            $end_date = $end_date->format('Y-m-d');
        }




        $quejas = $quejas
            ->orderBy('fecha_hora_ingreso', 'desc')
            ->paginate(10);


        return view('estadisticas.quejas', [
            'quejas' => $quejas,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'id_region' => $id_region,
            'id_departamento' => $id_departamento,
            'id_municipio' => $id_municipio,
            'id_sucursal' => $id_sucursal,
            'id_comercio' => $id_comercio,
            'regiones' => $regiones,
            'departamentos' => $departamentos,
            'municipios' => $municipios,
            'sucursales' => $sucursales,
            'comercios' => $comercios,
            'sucursal' => $sucursal,
        ]);


    }

    private function get_quejas_por_region()
    {


        return Queja::select(
            \DB::raw('count(*) as total'),
            \DB::raw('REPLACE(region.nombre,"Región","") as nombre')

        )
            ->orderBy('fecha_compra', 'asc')
            ->join('sucursal', 'sucursal.id', '=', 'quejas.id_sucursal')
            ->join('municipio', 'municipio.id', '=', 'sucursal.id_municipio')
            ->join('departamento', 'departamento.id', '=', 'municipio.id_departamento')
            ->join('region', 'region.id', '=', 'departamento.id_region')
            ->groupBy('region.id')
            ->groupBy('region.nombre')
            ->get();

    }

    private function get_departamento_con_mas_quejas()
    {

        return Queja::select(
            \DB::raw('count(*) as total'),
            'departamento.nombre as departamento'
        )
            ->orderBy('fecha_compra', 'asc')
            ->join('sucursal', 'sucursal.id', '=', 'quejas.id_sucursal')
            ->join('municipio', 'municipio.id', '=', 'sucursal.id_municipio')
            ->join('departamento', 'departamento.id', '=', 'municipio.id_departamento')
            ->groupBy('departamento.id')
            ->groupBy('departamento.nombre')
            ->get()
            ->max();
    }

    private function get_municipio_con_mas_quejas()
    {
        return Queja::select(
            \DB::raw('count(*) as total'),
            'municipio.nombre as municipio'
        )
            ->orderBy('fecha_compra', 'asc')
            ->join('sucursal', 'sucursal.id', '=', 'quejas.id_sucursal')
            ->join('municipio', 'municipio.id', '=', 'sucursal.id_municipio')
            ->groupBy('municipio.id')
            ->groupBy('municipio.nombre')
            ->get()
            ->max();
    }


    private function get_month_name($m): string
    {
        $month = '';
        switch ($m) {
            case 1:
                $month = "Ene";
                break;
            case 2:
                $month = "Feb";
                break;
            case 3:
                $month = "Mar";
                break;
            case 4:
                $month = "Abr";
                break;
            case 5:
                $month = "May";
                break;
            case 6:
                $month = "Jun";
                break;
            case 7:
                $month = "Jul";
                break;
            case 8:
                $month = "Ago";
                break;
            case 9:
                $month = "Sep";
                break;
            case 10:
                $month = "Oct";
                break;
            case 11:
                $month = "Nov";
                break;
            case 12:
                $month = "Dic";
                break;
            default:
                break;

        }

        return $month;

    }
}
