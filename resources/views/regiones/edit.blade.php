@extends('layout.admin')

@section('title', 'Regiones')

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
                        <a href="{{route('regiones')}}">Regiones</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">

                <div class="col-lg-12">
                    <div class="grid">
                        <p class="grid-header">Editar Región</p>
                        <div class="item-wrapper">
                            <form action="{{route('regiones.update',$region->id)}}"
                                  id="form_busqueda_comercio"
                                  method="POST"
                                  class="t-header-search-box">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre"
                                           name="nombre"
                                           value="{{$region->nombre}}"
                                    >
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                <a href="{{route('regiones')}}">
                                    <button type="button"
                                            class="btn btn-sm btn-success">Cancelar
                                    </button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
