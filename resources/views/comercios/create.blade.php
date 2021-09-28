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
                    <li class="breadcrumb-item active" aria-current="page">Nuevo</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="grid">
                    <p class="grid-header">Nuevo Comercio</p>
                    <div class="item-wrapper">
                        <form action="{{route('comercios.store')}}"
                              method="POST"
                              class="t-header-search-box">
                            @method('POST')
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre"
                                       name="nombre"

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




        </div>




@endsection

