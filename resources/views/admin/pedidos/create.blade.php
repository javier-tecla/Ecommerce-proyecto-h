@extends('layouts.admin')

@section('content')
    <h1>Pedido nro: {{ $pedido->id }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Datos del pedido</h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">
                            <label for=""><i class="bi bi-file-earmark-person"></i> Cliente</label>
                            <p>{{ $pedido->usuario->name }}</p>
                        </div>
                        <div class="col-md-3">
                            <label for=""><i class="bi bi-cash-coin"></i> Total de la orden</label>
                            <p>{{ $pedido->divisa . ' ' . $pedido->total }}</p>
                        </div>
                        <div class="col-md-3">
                            <label for=""><i class="bi bi-cash-coin"></i> Estado de pago</label>
                            <p>{{ $pedido->estado_pago }}</p>
                        </div>
                        <div class="col-md-3">
                            <label for=""><i class="bi bi-cash-coin"></i> Estado de la orden</label>
                            <p style="color: green;font-size:18pt"><b>{{ $pedido->estado_orden }}</b></p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for=""><i class="bi bi-pin-map"></i> Dirección de envio</label>
                                <p>{{ $pedido->direccion_envio }}</p>
                            </div>
                        </div>

                        <hr>
                        <h5>Detalles del pedido</h5>
                        <div class="row">

                            <table class="table table-bordered table-hover table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Imagen</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $nro = 1;
                                        $total = 0;
                                    @endphp
                                    @foreach ($pedido->detalles as $detalle)
                                        <tr>
                                            <td style="text-align: center">{{ $nro++ }}</td>
                                            <td>
                                                @php
                                                    $imagen_producto = $detalle->producto->imagenes->first();
                                                    $imagen = $imagen_producto->imagen ?? '';
                                                @endphp
                                                <img src="{{ asset('storage/' . $imagen) }}" alt="Producto" width="200px"
                                                    loading="lazy">
                                            </td>
                                            <td>
                                                <h5><a
                                                        href="{{ url('/admin/producto/' . $detalle->producto->id) }}">{{ $detalle->producto->nombre }}</a>
                                                </h5>
                                                <br><small>{{ $detalle->producto->descripcion_corta }}</small>
                                            </td>
                                            <td style="text-align: center">{{ $pedido->divisa . ' ' . $detalle->precio }}
                                            </td>
                                            <td style="text-align: center">{{ $detalle->cantidad }}</td>
                                            <td style="text-align: center">
                                                @php
                                                    $subtotal = $detalle->producto->precio_venta * $detalle->cantidad;
                                                @endphp
                                                {{ $pedido->divisa . ' ' . $subtotal }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align: right">Total:</th>
                                        <th style="text-align: center">{{ $pedido->divisa . ' ' . $pedido->total }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <hr>

                        @if ($pedido->estado_orden == 'Procesando')
                            <h5>Tomar el pedido</h5>

                            <form action="{{ url('/admin/pedido/' . $pedido->id) }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="nota">Nota</label>
                                            <div class="input-group">
                                                <div style="width: 100%">
                                                    <textarea name="nota" id="nota" class="form-control ckeditor" rows="2"
                                                        placeholder="Descripción detallada del envio de la orden">{{ old('nota') }}</textarea>
                                                </div>
                                            </div>
                                            @error('nota')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="{{ url('/admin/pedidos') }}"
                                                    class="btn btn-secondary">Cancelar</a>
                                                <button type="submit" class="btn btn-primary">Tomar pedido</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Editor para el contenido  (más completo)
                ClassicEditor
                    .create(document.querySelector('#nota'), {
                        toolbar: {
                            items: [
                                'heading', '|',
                                'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                                'link', 'bulletedList', 'numberedList', '|',
                                'outdent', 'indent', '|',
                                'alignment', '|',
                                'blockQuote', 'insertTable', 'mediaEmbed', '|',
                                'undo', 'redo', '|',
                                'fontBackgroundColor', 'fontColor', 'fontSize', 'fontFamily', '|',
                                'code', 'codeBlock', 'htmlEmbed', '|',
                                'sourceEditing'
                            ],
                            shouldNotGroupWhenFull: true
                        },
                        language: 'es',
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        </script>
    @endsection
