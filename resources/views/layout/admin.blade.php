<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Diaco - @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.addons.css')}}">

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
<body class="header-fixed">
<nav class="t-header">
    <div class="t-header-brand-wrapper">
        <a href="index.html">
            <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
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
                            <h6 class="dropdown-title">Apps</h6>
                            <p class="dropdown-title-text mt-2">Authentication required for 3 apps</p>
                        </div>
                        <div class="dropdown-body border-top pt-0">
                            <a class="dropdown-grid">
                                <i class="grid-icon mdi mdi-jira mdi-2x"></i>
                                <span class="grid-tittle">Jira</span>
                            </a>
                            <a class="dropdown-grid">
                                <i class="grid-icon mdi mdi-trello mdi-2x"></i>
                                <span class="grid-tittle">Trello</span>
                            </a>
                            <a class="dropdown-grid">
                                <i class="grid-icon mdi mdi-artstation mdi-2x"></i>
                                <span class="grid-tittle">Artstation</span>
                            </a>
                            <a class="dropdown-grid">
                                <i class="grid-icon mdi mdi-bitbucket mdi-2x"></i>
                                <span class="grid-tittle">Bitbucket</span>
                            </a>
                        </div>
                        <div class="dropdown-footer">
                            <a href="#">View All</a>
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
                <a href="{{url('regiones')}}">
                    <span class="link-title">Region</span>
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
    @yield('content')

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