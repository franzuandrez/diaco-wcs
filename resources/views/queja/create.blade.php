@extends('layout.app')

@section('title', 'Queja')

@section('sidebar')
    @parent
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{url('/')}}">Diaco</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('queja.create')}}">Quejas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('estadisticas')}}">Estadisticas</a></li>

                </ul>
            </div>
        </div>
    </nav>
@endsection


@section('content')


    <header class="masthead">
        <div class="container px-6 px-lg-8 h-100">
            <div class="row gx-4 gx-lg-2 h-75 align-items-center justify-content-center ">
                @if(\Illuminate\Support\Facades\Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ \Illuminate\Support\Facades\Session::get('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if($id_comercio && !$sucursales->isEmpty())
                    <div class="col-lg-8 equel-grid">
                        <div class="grid">
                            <p class="grid-header">{{$comercio == null ? '':$comercio->nombre}}</p>
                            <div class="grid-body">
                                <div class="item-wrapper">
                                    <form method="POST" action="{{route('queja.store')}}">
                                        @csrf
                                        <div class="row showcase_row_area">
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
                                                        <option value="{{$region->id}}">{{$region->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row showcase_row_area">
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row showcase_row_area">
                                            <div class="form-group">
                                                <label for="id_municipio">Municipio</label>
                                            </div>
                                            <div class="col-md-12 showcase_content_area">
                                                <select class="custom-select"
                                                        id="id_municipio"
                                                        name="id_municipio"
                                                        onchange="cargarSucursales(this.value)"
                                                >
                                                    <option value="" selected>Seleccione Municipio</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row showcase_row_area">
                                            <div class="form-group">
                                                <label for="id_sucursal">Sucursal</label>
                                                <div class="col-md-12 showcase_content_area">
                                                    <select class="custom-select"
                                                            id="id_sucursal"
                                                            name="id_sucursal"
                                                            required
                                                    >
                                                        <option value="" selected>Seleccione Sucursal</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea class="form-control"
                                                      name="detalle"
                                                      required
                                                      id="detalle" type="text"
                                                      placeholder="Describe el incoveniente" style="height: 10rem"
                                                      data-sb-validations="required"></textarea>
                                            <label for="message">Describe el incoveniente</label>
                                            <div class="invalid-feedback" data-sb-feedback="message:required">Detalle
                                                es requerido
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @include('queja.listado_comercios')
                @endif

            </div>
        </div>


    </header>


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
