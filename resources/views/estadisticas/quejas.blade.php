@extends('layout.admin')

@section('title', 'Regiones')

@section('sidebar')
    @parent

@endsection

@section('content')






    <div class="content-viewport">
        <div class="row">

            <div class="col-lg-12">
                <div class="grid">

                    <form action="{{route('estadisticas.generales')}}"
                          id="form_busqueda_comercio"
                          class="">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="id_region">Comercio</label>
                                </div>
                                <div class="col-md-12 showcase_content_area">
                                    <select class="custom-select live-search "
                                            id="id_comercio"
                                            name="id_comercio"
                                    >
                                        <option value="" selected>Seleccione Comercio</option>
                                        @foreach($comercios as $comercio)
                                            @if($id_comercio == $comercio->id )
                                                <option selected
                                                        value="{{$comercio->id}}">{{$comercio->nombre}}</option>
                                            @else
                                                @if($sucursal)
                                                    @if($sucursal->id_comercio == $comercio->id)
                                                        <option selected
                                                                value="{{$comercio->id}}">{{$comercio->nombre}}</option>
                                                    @else
                                                        <option value="{{$comercio->id}}">{{$comercio->nombre}}</option>
                                                    @endif
                                                @else
                                                    <option value="{{$comercio->id}}">{{$comercio->nombre}}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="inicio">Inicio</label>
                                    <br>
                                    <br>
                                    <input type="date" class="form-control" id="inicio"
                                           name="inicio"
                                           value="{{$start_date}}"
                                    >
                                </div>

                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="fin">Fin</label>
                                    <br>
                                    <br>
                                    <input type="date" class="form-control" id="fin"
                                           name="fin"
                                           value="{{$end_date}}"
                                    >
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="id_region">Región</label>
                                </div>
                                <div class="col-md-12 showcase_content_area">
                                    <select class="custom-select live-search "
                                            id="id_region"
                                            name="id_region"

                                            onchange="cargarDepartamentos(this.value)"
                                    >
                                        <option value="" selected>Seleccione Región</option>
                                        @foreach($regiones as $region)
                                            @if($id_region == $region->id)
                                                <option selected
                                                        value="{{$region->id}}">{{$region->nombre}}</option>
                                            @else
                                                <option value="{{$region->id}}">{{$region->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="id_departamento">Departamento</label>
                                </div>
                                <div class="col-md-12 showcase_content_area">
                                    <select class="custom-select"
                                            onchange="cargarMunicipios(this.value)"
                                            id="id_departamento"
                                            name="id_departamento"
                                    >
                                        <option value="0" selected>Seleccione Departamento</option>
                                        @foreach($departamentos as $departamento)
                                            @if($id_region == $departamento->id_region)
                                                @if($id_departamento == $departamento->id)
                                                    <option selected
                                                            value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                                @else
                                                    <option
                                                        value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="id_municipio">Municipio</label>
                                </div>
                                <div class="col-md-12 ">
                                    <select class="custom-select"
                                            id="id_municipio"
                                            name="id_municipio"
                                            onchange="cargarSucursales(this.value)"
                                    >
                                        <option value="" selected>Seleccione Municipio</option>
                                        @foreach($municipios as $municipio)
                                            @if($id_departamento == $municipio->id_departamento)
                                                @if($id_municipio == $municipio->id)
                                                    <option selected
                                                            value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                                                @else
                                                    <option
                                                        value="{{$municipio->id}}">{{$municipio->nombre}}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="id_sucursal">Sucursal</label>
                                </div>
                                <div class="col-md-12 showcase_content_area">
                                    <select class="custom-select"
                                            id="id_sucursal"
                                            name="id_sucursal"

                                    >
                                        <option value="" selected>Seleccione Sucursal</option>
                                        @foreach($sucursales as $sucursal)
                                            @if($id_municipio == $sucursal->id_municipio)
                                                @if($id_comercio)
                                                    @if($sucursal->id_comercio == $id_comercio)
                                                        @if($id_sucursal == $sucursal->id)
                                                            <option selected
                                                                    value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                                        @else
                                                            <option
                                                                value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                                        @endif
                                                    @endif
                                                @else
                                                    @if($id_sucursal == $sucursal->id)
                                                        <option selected
                                                                value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                                    @else
                                                        <option
                                                            value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                                    @endif
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2" style="padding-top:3%">


                                <button type="submit" class="btn btn-inverse-primary">Buscar</button>


                            </div>
                        </div>

                    </form>

                    <div class="row">
                        <div class="col-lg-10">
                            <div class="item-wrapper">
                                <div class="table-responsive">
                                    <table class="table info-table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Queja</th>
                                            <th>Sucursal</th>
                                            <th>Comercio</th>
                                            <th>Municipio</th>
                                            <th>Departamento</th>
                                            <th>Región</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $quejas as $queja )
                                            <tr>
                                                <td>{{$loop->iteration + ($quejas->perPage() * ($quejas->currentPage() -1)  )}}</td>
                                                <td>{{$queja->fecha_hora_ingreso==null?'':$queja->fecha_hora_ingreso->format('h:i:s d/m/Y')}}</td>
                                                <td>{{mb_substr($queja->detalle,0,13).'...'}}</td>
                                                <td>{{str_replace("Sucursal","",$queja->sucursal)}}</td>
                                                <td>{{$queja->comercio}}</td>
                                                <td>{{$queja->municipio}}</td>
                                                <td>{{$queja->departamento}}</td>
                                                <td>{{str_replace("Región","",$queja->region)}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>
                                    {{$quejas->appends([
                                           'id_region'=>$id_region,
                                           'id_departamento'=>$id_departamento,
                                           'id_municipio'=>$id_municipio,
                                           'id_sucursal'=>$id_sucursal,
                                           'id_comercio'=>$id_comercio
                                        ])}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="table-responsive">
                                <table class="table info-table">
                                    <thead>
                                    <tr>
                                        <td style="font-size: 35px;color:#5654eb ">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="font-size: 35px">
                                            {{$quejas->total()}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            function seleccionar_comercio(id_comercio) {

                document.getElementById('id_comercio').value = id_comercio;
                document.getElementById('form_busqueda_comercio').submit();

            }

            function cargarDepartamentos(id) {

                const departamentos = getDepartamentosPorRegion(id);

                $('#id_departamento').empty();
                let row = '';
                row += ` <option value="" selected>Seleccione Departamento</option>`
                departamentos.forEach(e =>
                    row += `<option value="${e.id}">${e.nombre}</option> `
                );

                $('#id_departamento').append(row);
                cargarMunicipios(0)
            }

            function cargarMunicipios(id) {

                const municipios = getMunicipiosPorDepartamento(id);

                $('#id_municipio').empty();
                let row = ' ';
                row += ` <option value="" selected>Seleccione Municipio</option>`
                municipios.forEach(e =>
                    row += `<option value="${e.id}">${e.nombre}</option> `
                );

                $('#id_municipio').append(row);
                cargarSucursales(0)

            }

            function cargarSucursales(id) {

                const sucursales = getSucursalesPorMunicipio(id);

                $('#id_sucursal').empty();
                let row = ' ';
                row += ` <option value="" selected>Seleccione Sucursal</option>`
                sucursales.forEach(e =>
                    row += `<option value="${e.id}">${e.nombre}</option> `
                );

                $('#id_sucursal').append(row);

            }


            function getSucursales() {

                return @json($sucursales)
            }


            function getDepartamentos() {
                return @json($departamentos)
            }

            function getMunicipios() {
                return @json($municipios)
            }

            function getDepartamentosPorRegion(id) {
                return getDepartamentos().filter(depto => depto.id_region == id);
            }

            function getMunicipiosPorDepartamento(id) {
                return getMunicipios().filter(mun => mun.id_departamento == id);
            }

            function getSucursalesPorMunicipio(id) {
                return getSucursales().filter(suc => suc.id_municipio == id);
            }
        </script>
    @endpush

@endsection
