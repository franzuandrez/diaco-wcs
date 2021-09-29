<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Diaco - @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.addons.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{asset('assets/css/demo_1/style.css')}}">
    <!-- Layout style -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="{{asset('asssets/images/favicon.ico')}}"/>

</head>
<body class="">
<nav class="t-header">
    <div class="t-header-brand-wrapper">
        <a href="{{url('/estadisticas')}}">
            <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="" style="max-width: 80%">
            <img class="logo-mini" src="{{asset('assets/images/logo_mini.svg')}}" alt="">
        </a>
    </div>
    <div class="t-header-content-wrapper">
        <div class="t-header-content">
            <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
                <i class="mdi mdi-menu"></i>
            </button>
            <ul class="nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="appsDropdown" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-apps mdi-1x"></i>
                    </a>
                    <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="appsDropdown">
                        <div class="dropdown-header">
                            <h6 class="dropdown-title">  {{ Auth::user()->name }}</h6>
                            <p class="dropdown-title-text mt-2">
                                Sistema de control de quejas
                            </p>
                        </div>
                        <div class="dropdown-body border-top pt-0">
                            <a class="dropdown-grid"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                <i class="grid-icon mdi mdi-jira mdi-2x"></i>
                                <span class="grid-tittle">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <div class="dropdown-footer">

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
@section('sidebar')

@show
<div class="page-body">
    <div class="sidebar">
        <ul class="navigation-menu">
            <li class="nav-category-divider">Opciones</li>
            <li>
                <a href="{{url('estadisticas')}}">
                    <span class="link-title">Estadisticas</span>
                    <i class="mdi mdi-gauge link-icon"></i>
                </a>
            </li>
            <li>

                <ul class="collapse navigation-submenu" id="ui-elements">
                    <li>
                        <a href="{{url('estadisticas')}}">Anuales</a>
                    </li>
                    <li>
                        <a href="{{url('estadisticas/quejas')}}">Quejas</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="{{url('regiones')}}">
                    <span class="link-title">Regiones</span>
                    <i class="mdi mdi-map link-icon"></i>
                </a>
            </li>
            <li>
                <a href="{{url('departamentos')}}">
                    <span class="link-title">Departamentos</span>
                    <i class="mdi mdi-map-outline link-icon"></i>
                </a>
            </li>
            <li>
                <a href="{{url('municipios')}}">
                    <span class="link-title">Municipios</span>
                    <i class="mdi mdi-map-marker-distance link-icon"></i>
                </a>
            </li>
            <li>
                <a href="{{url('comercios')}}">
                    <span class="link-title">Comercios</span>
                    <i class="mdi mdi-shopping link-icon"></i>
                </a>
            </li>


        </ul>

    </div>

    <div class="page-content-wrapper" style="margin-top: 0">
        @if(\Illuminate\Support\Facades\Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ \Illuminate\Support\Facades\Session::get('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SimpleLightbox plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
<!-- Core theme JS-->
<!--page body ends -->
<!-- SCRIPT LOADING START FORM HERE /////////////-->
<!-- plugins:js -->
<script src="{{asset('assets/vendors/js/core.js')}}"></script>
<!-- endinject -->
<!-- Vendor Js For This Page Ends-->
<script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/charts/chartjs.addon.js')}}"></script>
<!-- Vendor Js For This Page Ends-->
<!-- build:js -->
<script src="{{asset('assets/js/template.js')}}"></script>
<script src="{{asset('assets/js/dashboard.js')}}"></script>

@stack('scripts')
<!-- endbuild -->
</body>
</html>
