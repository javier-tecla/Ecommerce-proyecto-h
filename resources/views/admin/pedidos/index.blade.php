@extends('layouts.admin')

@section('content')
    <h1>
        Listado de pedidos</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pedidos registrados
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('/admin/pedidos') }}" method="GET" class="mt-3">
                                <div class="input-group">
                                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..."
                                        value="{{ $_REQUEST['buscar'] ?? '' }}">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i>
                                        Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ url('/admin/pedidos') }}" class="btn btn-success">
                                            <i class="bi bi-trash"></i> Limpiar</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Estado del pedido</th>
                                    <th>Estado de la orden</th>
                                    <th>Dirección de envio</th>
                                    <th>Detalle de productos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nro = ($pedidos->currentPage() - 1) * $pedidos->perPage() + 1;
                                @endphp
                                @foreach ($pedidos as $pedido)
                                    <tr>
                                        <td style="text-align: center">{{ $nro++ }}</td>
                                        <td class="text-truncate" style="max-width: 120px;">{{ $pedido->usuario->name }}
                                            <br><small>{{ $pedido->usuario->email }} </small> </td>
                                        <td>{{ $pedido->divisa . ' ' . $pedido->total }}</td>
                                        <td>{{ $pedido->estado_pago }}</td>
                                        <td class="text-truncate" style="max-width: 100px;">{{ $pedido->estado_orden }}</td>
                                        <td>{{ $pedido->direccion_envio }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($pedido->detalles as $detalle)
                                                    <li>
                                                        {{ $detalle->producto->nombre }} -
                                                        Cantidad: {{ $detalle->cantidad }} -
                                                        Precio: {{ $detalle->divisa . ' ' . $detalle->precio }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td class="text-center">

                                            <div class="d-flex justify-content-center gap-1">
                                                <a href="{{ url('/admin/pedido/' . $pedido->id) }}"
                                                    class="@if ($pedido->estado_orden == 'Procesando') btn btn-success btn-sm @else btn btn-info @endif"><i
                                                        class="bi bi-truck"></i>
                                                    @if ($pedido->estado_orden == 'Procesando')
                                                        Tomar el pedido
                                                    @else
                                                        Ver pedido
                                                    @endif
                                                </a>
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if ($pedidos->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                            <div class="text-muted">
                                Mostrando {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }} de
                                {{ $pedidos->total() }}
                                registros
                            </div>
                            <div>
                                {{ $pedidos->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
