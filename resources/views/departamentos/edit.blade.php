@extends('layout.admin')

@section('title', 'Departamento - Editar')

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
                        <a href="{{route('departamentos')}}">Departamentos</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Editar</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">

                <div class="col-lg-12">
                    <div class="grid">
                        <p class="grid-header">Editar Departamento</p>
                        <div class="item-wrapper">
                            <form action="{{route('departamentos.update',$departamento->id)}}"
                                  id="form_busqueda_comercio"
                                  method="POST"
                                  class="t-header-search-box">
                                @method('PATCH')
                                @csrf

                                <div class="col-md-12 col-sm-12 col-12 ">
                                    <div class="row ">
                                        <div class="form-group">
                                            <label for="id_region">Región</label>
                                        </div>
                                        <div class="col-md-12 showcase_content_area">
                                            <select class="custom-select"
                                                    id="id_region"
                                                    name="id_region"
                                            >
                                                @foreach($regiones as $region )

                                                    @if($region->id == $departamento->id_region)
                                                        <option selected
                                                                value="{{$region->id}}"> {{$region->nombre}}</option>
                                                    @else
                                                        <option value="{{$region->id}}"> {{$region->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre"
                                           name="nombre"
                                           value="{{$departamento->nombre}}"
                                    >
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                                <a href="{{route('departamentos')}}">
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
