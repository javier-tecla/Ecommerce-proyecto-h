@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h2>Bienvenido, {{ Auth::user()->name }} </h2>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Rol del usuario</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ Auth::user()->roles->pluck('name')->implode(', ') }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <br>

    <div class="row">
        @can('Listado de Roles')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <a href="{{ url('/admin/roles') }}">
                                    <div class="stats-icon blue mb-2">
                                        <i class=""><i class="bi bi-people-fill"></i></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Roles registrados</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_roles }} roles</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('Listado de Usuarios')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <a href="{{ url('/admin/usuarios') }}">
                                    <div class="stats-icon purple mb-2">
                                        <i class=""><i class="bi bi-person-add"></i></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Usuarios registrados</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_usuarios }} usuarios</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('Listado de Categorías')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <a href="{{ url('/admin/categorias') }}">
                                    <div class="stats-icon green mb-2">
                                        <i class=""><i class="bi bi-tags"></i></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Categorías registradas</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_categorias }} categorías</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('Listado de Productos')
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <a href="{{ url('/admin/productos') }}">
                                    <div class="stats-icon red mb-2">
                                        <i class=""><i class="bi bi-box-seam"></i></i>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Productos registrados</h6>
                                <h6 class="font-extrabold mb-0">{{ $total_productos }} productos</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @can('Listado de Pedidos')
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <a href="{{ url('/admin/pedidos') }}">
                                        <div class="stats-icon blue mb-2">
                                            <i class=""><i class="bi bi-arrow-down-square-fill"></i></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pedidos nuevos</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_pedidos_nuevos }} pedidos</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            @can('Listado de Pedidos')
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <a href="{{ url('/admin/pedidos') }}">
                                        <div class="stats-icon purple mb-2">
                                            <i class=""><i class="bi bi-send-check"></i></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pedidos enviados</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_pedidos_enviados }} pedidos</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            @can('Listado de Pedidos')
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <a href="{{ url('/admin/pedidos') }}">
                                        <div class="stats-icon green mb-2">
                                            <i class=""><i class="bi bi-list-check"></i></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total de pedidos</h6>
                                    <h6 class="font-extrabold mb-0">{{ $total_pedidos }} pedidos</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Ventas del ultimo año</h4>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>
@endsection
