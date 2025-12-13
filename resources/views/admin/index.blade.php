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
                    <h4>Clientes registrados por mes</h4>
                </div>
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Ordenes registrados por mes</h4>
                </div>
                <div class="card-body">
                    <div id="chart2"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4>Porcentaje de ordenes</h4>
                </div>
                <div class="card-body">
                    <div id="chart3"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const usuariosData = @json(array_values($usuarios_data));
        var options = {
            chart: {
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            series: [{
                name: 'sales',
                data: usuariosData
            }],
            xaxis: {
                categories: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();


        const ordenesData = @json(array_values($ordenesData));
        var options2 = {
            chart: {
                type: 'bar',
                zoom: {
                    enabled: false
                }
            },
            series: [{
                name: 'sales',
                data: usuariosData
            }],
            xaxis: {
                categories: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
            }
        }

        var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);

        chart2.render();

         
        var options3 = {
          series: [{{ $total_pedidos_nuevos }}, {{ $total_pedidos_enviados }}],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Pedidos Nuevo', 'Pedidos Enviados'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
        chart3.render();
      
      
    </script>
@endsection
