@extends('layouts.admin')

@section('content')
    <h1>Datos del producto: {{ $producto->nombre }}
        <div style="float: right">
            <a href="{{ url('/admin/productos') }}" class="btn btn-secondary">Volver</a>
        </div>
    </h1>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Datos del producto</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="categoria_id">Categoría</label>
                                <p><i class="bi bi-tags"></i> {{ $producto->categoria->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre del Producto</label>
                                <p><i class="bi bi-box"></i> {{ $producto->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="codigo">Código</label>
                                <p><i class="bi bi-upc-scan"></i> {{ $producto->codigo }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion_corta">Descripción Corta</label>
                                        <p><i class="bi bi-text-left"></i> {{ $producto->descripcion_corta }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="precio_compra">Precio de Compra</label>
                                        <p><i class="bi bi-currency-dollar"></i> {{ $producto->precio_compra }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio de Venta</label>
                                        <p><i class="bi bi-currency-dollar"></i> {{ $producto->precio_venta }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <p><i class="bi bi-boxes"></i> {{ $producto->stock }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion_larga">Descripción Larga</label>
                                        <p>{!! $producto->descripcion_larga !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Imagenes del producto</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($producto->imagenes as $imagen)
                                <div class="col-md-3" style="margin-bottom: 20px;">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $imagen->imagen) }}" class="card-img-top"
                                            alt="Imagen del producto">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
