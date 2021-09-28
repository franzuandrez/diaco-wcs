@extends('layout.admin')

@section('title', 'Comercio - Agregar Sucursal')

@section('sidebar')
    @parent

@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li><strong>* </strong> {{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="page-content-wrapper-inner">
        <div class="viewport-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb has-arrow">
                    <li class="breadcrumb-item">
                        <a href="{{route('comercios')}}">Comercios</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('comercios.edit',$comercio->id)}}">Editar</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Nueva Sucursal</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">

                <div class="col-lg-12">
                    <div class="grid">
                        <p class="grid-header">Nueva Sucursal para Comercio {{$comercio->nombre}}</p>
                        <div class="item-wrapper">
                            <form action="{{route('sucursales.store')}}"
                                  method="POST"
                                  class="t-header-search-box">
                                @method('POST')
                                @csrf
                                <input type="hidden" name="id_comercio" value="{{$comercio->id}}">
                                <div class="col-md-12 col-sm-12 col-12 ">
                                    <div class="row ">
                                        <div class="form-group">
                                            <label for="id_region">Región</label>
                                        </div>
                                        <div class="col-md-12 showcase_content_area">
                                            <select class="custom-select"
                                                    id="id_region"
                                                    required
                                                    onchange="cargarDepartamentos(this.value)"
                                                    name="id_region"
                                            >
                                                <option value=""> Seleccione Región</option>
                                                @foreach($regiones as $region)
                                                    <option
                                                        value="{{$region->id}}">{{$region->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-12 ">
                                    <div class="row ">
                                        <div class="form-group">
                                            <label for="id_departamento">Departamento</label>
                                        </div>
                                        <div class="col-md-12 showcase_content_area">
                                            <select class="custom-select"
                                                    id="id_departamento"
                                                    required
                                                    onchange="cargarMunicipios(this.value)"
                                                    name="id_departamento"
                                            >
                                                <option value=""> Seleccione Departamento</option>

                                            </select>
                                        </div>
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

                                        >
                                            <option value="" selected>Seleccione Municipio</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre"
                                           name="nombre"

                                    >
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                <a href="{{route('comercios.edit',$comercio->id)}}">
                                    <button type="button"
                                            class="btn btn-sm btn-success">Regresar
                                    </button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function cargarDepartamentos(id) {

                const departamentos = getDepartamentosPorRegion(id);

                $('#id_departamento').empty();
                let row = '';
                row += ` <option value="" selected>Seleccione Departamento</option>`
                departamentos.forEach(e =>
                    row += `<option value="${e.id}">${e.nombre}</option> `
                );

                $('#id_departamento').append(row);
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


            function getDepartamentos() {
                return @json($departamentos)
            }


            function getDepartamentosPorRegion(id) {
                return getDepartamentos().filter(depto => depto.id_region == id);
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

            }

            function getMunicipios() {
                return @json($municipios)
            }

            function getMunicipiosPorDepartamento(id) {
                return getMunicipios().filter(mun => mun.id_departamento == id);
            }
        </script>
    @endpush

@endsection
