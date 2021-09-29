@extends('layout.admin')

@section('title', 'Estadisticas')

@section('sidebar')
    @parent

@endsection

@section('content')



    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <h4>Estadisticas</h4>
                    <p class="text-gray">Datos anuales</p>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-6">
                    <div class="grid">
                        <div class="grid-body">
                            <h2 class="grid-title">Quejas en el Año</h2>
                            <div class="item-wrapper">
                                <canvas id="chartjs-staked-line-chart" width="600" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="grid">
                        <div class="grid-body">
                            <h2 class="grid-title">Regiones año {{\Carbon\Carbon::now()->format('Y')}}</h2>
                            <div class="item-wrapper">
                                <canvas id="chartjs-bar-chart" width="600" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 equel-grid">
                    <div class="grid">
                        <div class="grid-body">
                            <div class="split-header">
                                <p class="card-title">Mayor número de quejas</p>

                            </div>
                            <div class="vertical-timeline-wrapper">
                                <div class="timeline-vertical dashboard-timeline">
                                    <div class="activity-log">
                                        <p class="log-name">Región {{$region_con_mas_quejas->nombre??''}}</p>
                                        <div class="log-details">con un total de<span
                                                class="text-primary ml-1">{{$region_con_mas_quejas->total??0}}</span>
                                            quejas
                                        </div>

                                    </div>
                                    <div class="activity-log">
                                        <p class="log-name">
                                            Departamento {{$departamento_con_mas_quejas==null?'':$departamento_con_mas_quejas->departamento}}</p>
                                        <div class="log-details">con un total de<span
                                                class="text-primary ml-1">{{$departamento_con_mas_quejas->total??0}}</span>
                                            quejas
                                        </div>

                                    </div>

                                    <div class="activity-log">
                                        <p class="log-name">
                                            Municipio {{$municipio_con_mas_quejas==null?'':$municipio_con_mas_quejas->municipio}}</p>
                                        <div class="log-details">con un total de<span
                                                class="text-primary ml-1">{{$municipio_con_mas_quejas->total??0}}</span>
                                            quejas
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-8 ">
                    <div class="grid table-responsive">
                        <div class="grid-body py-2">
                            <p class="card-title ml-n1">Ultimas Quejas</p>
                        </div>
                        <table class="table ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Queja</th>
                                <th>Sucursal</th>
                                <th>Comercio</th>
                                <th>Municipio</th>
                                <th>Departamento</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($ultimas_quejas as $queja)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{mb_substr($queja->detalle,0,13).'...'}}</td>
                                    <td>{{str_replace("Sucursal","",$queja->sucursal)}}</td>
                                    <td>{{mb_substr($queja->comercio,0,15).'...'}}</td>
                                    <td>{{$queja->municipio}}</td>
                                    <td>{{$queja->departamento}}</td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- content viewport ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="row">

                <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
                    <small class="text-muted d-block">Copyright © 2021 <a href="#">
                            Walter Chen</a>. Seminario de Privados UMG
                    </small>

                </div>
            </div>
        </footer>

    </div>

    @push('scripts')
        <script>

            var labels_grafica_anual = @json($quejas_anuales_meses);
            var data_grafica_anual = @json($quejas_anuales_total);
            var label_regiones = @json($regiones);
            var data_regiones = @json($quejas_por_region);

            function grafica_quejas_anual() {
                if ($("#chartjs-staked-line-chart").length) {
                    var options = {
                        type: 'line',
                        data: {
                            labels: labels_grafica_anual,
                            datasets: [
                                {
                                    label: 'Quejas',
                                    data: data_grafica_anual,

                                    fill: false,
                                    backgroundColor: chartColors[1],
                                    borderColor: chartColors[1],
                                    borderWidth: 0
                                }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        reverse: false
                                    }
                                }]
                            },
                            fill: false,
                            legend: false
                        }
                    }

                    var ctx = document.getElementById('chartjs-staked-line-chart').getContext('2d');
                    new Chart(ctx, options);
                }
            }

            function grafica_regiones() {
                if ($("#chartjs-bar-chart").length) {
                    var BarData = {
                        labels: label_regiones,
                        datasets: [{
                            label: 'Total de Quejas',
                            data: data_regiones,
                            backgroundColor: chartColors,
                            borderColor: chartColors,
                            borderWidth: 0
                        }]
                    };
                    var barChartCanvas = $("#chartjs-bar-chart").get(0).getContext("2d");
                    var barChart = new Chart(barChartCanvas, {
                        type: 'bar',
                        data: BarData,
                        options: {
                            legend: false
                        }
                    });
                }
            }

            grafica_regiones();
            grafica_quejas_anual();
        </script>
    @endpush

@endsection
