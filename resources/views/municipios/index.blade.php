@extends('layout.admin')

@section('title', 'Municipios')

@section('sidebar')
    @parent

@endsection

@section('content')


    <div class="page-content-wrapper-inner">
        <div class="viewport-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb has-arrow">
                    <li class="breadcrumb-item active" aria-current="page">Municipios</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">
                <div class="col-lg-12">
                    <div class="grid">

                        <p class="grid-header">Listado de Municipios

                        </p>

                        <div class="item-wrapper">
                            <div class="demo-wrapper">
                                <a href="{{route('municipios.create')}}">
                                    <div class="btn btn-success has-icon">
                                        <i class="mdi mdi-plus-box"></i>Nuevo
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    <form action="{{route('municipios')}}"
                          id="form_busqueda_comercio"
                          class="t-header-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                   name="query"
                                   value="{{$query}}"
                                   placeholder="Buscar" autocomplete="off">
                            <button class="btn btn-primary" type="submit"><i
                                    class="mdi mdi-arrow-right-thick"></i></button>
                        </div>
                    </form>

                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Región</th>
                                    <th>Departamento</th>
                                    <th>Municipio</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $municipios as $municipio )
                                    <tr>
                                        <td>{{$loop->iteration + ($municipios->perPage() * ($municipios->currentPage() -1)  )}}</td>
                                        <td>{{$municipio->region}}</td>
                                        <td>{{$municipio->departamento}}</td>
                                        <td>{{$municipio->nombre}}</td>
                                        <td>
                                            <a href="{{route('municipios.edit',$municipio->id)}}">
                                                <div class="btn btn-primary btn-sm has-icon">
                                                    <i class="mdi mdi-account-edit"></i>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{
                            $municipios->appends([
                                'query'=>$query
                            ])
                            }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
