@extends('layout.admin')

@section('title', 'Comercio - Editar')

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
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="grid">
                    <p class="grid-header">Editar Comercio</p>
                    <div class="item-wrapper">
                        <form action="{{route('comercios.update',$comercio->id)}}"
                              method="POST"
                              class="t-header-search-box">
                            @method('PATCH')
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre"
                                       name="nombre"
                                       value="{{$comercio->nombre}}"
                                >
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                            <a href="{{route('comercios')}}">
                                <button type="button"
                                        class="btn btn-sm btn-success">Cancelar
                                </button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="grid">
                    <p class="grid-header">Listado de Sucursales</p>
                    <div class="item-wrapper">
                        <div class="demo-wrapper">
                            <a href="{{route('sucursales.create',$comercio->id)}}">
                                <div class="btn btn-success has-icon">
                                    <i class="mdi mdi-plus-box"></i>Nueva
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table table-hover  table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Sucursal</th>
                                    <th scope="col">Municipio</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Region</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $sucursales as $sucursal )
                                    <tr id="row-{{$sucursal->id}}">
                                        <td>{{$loop->iteration + ($sucursales->perPage() * ($sucursales->currentPage() -1)  )}}</td>
                                        <td>{{$sucursal->nombre}}</td>
                                        <td>{{$sucursal->municipio}}</td>
                                        <td>{{$sucursal->departamento}}</td>
                                        <td>{{$sucursal->region}}</td>
                                        <td>@if($sucursal->quejas()->count() == 0)
                                                <div
                                                    onclick="remove('{{$sucursal->id}}')"
                                                    class="btn btn-danger
                                                        btn-xs
                                                     has-icon">
                                                    <i class="mdi mdi-minus-box"></i></div>
                                            @endif

                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{$sucursales->links()}}
                        </div>
                    </div>
                </div>
            </div>


        </div>


        @push('scripts')
            <script>
                function remove(id) {

                    $.ajax({
                        url: "{{url('sucursales')}}" + '/' + id,
                        method: "DELETE",
                        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                        success: function () {
                            $('#row-' + id).remove();
                            alert("Sucursal dada de baja")
                        }
                    })
                }
            </script>
    @endpush

@endsection

