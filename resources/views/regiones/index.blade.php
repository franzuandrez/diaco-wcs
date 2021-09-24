@extends('layout.admin')

@section('title', 'Regiones')

@section('sidebar')
    @parent

@endsection

@section('content')




    <div class="page-content-wrapper-inner">
        <div class="viewport-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb has-arrow">
                    <li class="breadcrumb-item active" aria-current="page">Regiones</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">

                <div class="col-lg-12">
                    <div class="grid">
                        <p class="grid-header">Listado de Regiones</p>
                        <form action="{{route('regiones')}}"
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
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $regiones as $region )
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$region->nombre}}</td>
                                            <td>
                                                <a href="{{route('regiones.edit',$region->id)}}">
                                                    <div class="btn btn-primary btn-sm has-icon">
                                                        <i class="mdi mdi-account-edit"></i>
                                                    </div>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
