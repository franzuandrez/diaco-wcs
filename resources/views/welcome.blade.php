@extends('layout.app')

@section('title', 'Bienvenido')

@section('sidebar')
    @parent
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Diaco</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('queja.create')}}">Quejas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Estadisticas</a></li>

                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')

    <header class="masthead">

            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">¿Tienes alguna queja?</h1>
                        <hr class="divider"/>
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">
                            Si tiene alguna queja no dudes en decirnolos y no te preocupes, será totalmente anonima</p>
                        <a class="btn btn-primary btn-xl" href="#about">Quejarme</a>
                    </div>
                </div>
            </div>

    </header>

@endsection
