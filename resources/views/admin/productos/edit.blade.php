@extends('layouts.admin')

@section('content')
    <h1>Modificar datos del producto: {{ $producto->nombre }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Llene los campos del formulario</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/producto/'.$producto->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoria_id">Categoría <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                        <select name="categoria_id" id="categoria_id" class="form-control" required>
                                            <option value="" disabled selected>Seleccione una categoría...</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}"
                                                    {{ old('categoria_id',$producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                                    {{ $categoria->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('categoria_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Producto <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-box"></i></span>
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                            value="{{ old('nombre',$producto->nombre) }}" placeholder="Nombre completo del producto" required>
                                    </div>
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo">Código <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                                        <input type="text" name="codigo" id="codigo" class="form-control"
                                            value="{{ old('codigo',$producto->codigo) }}" placeholder="Código único del producto" required>
                                    </div>
                                    @error('codigo')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion_corta">Descripción Corta <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-text-left"></i></span>
                                                <textarea name="descripcion_corta" id="descripcion_corta" class="form-control" rows="2"
                                                    placeholder="Descripción breve del producto (máx. 255 caracteres)" maxlength="255" required>{{ old('descripcion_corta', $producto->descripcion_corta) }}</textarea>
                                            </div>
                                            @error('descripcion_corta')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <small class="text-muted"><span id="contador_corta">0</span>/255
                                                caracteres</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="precio_compra">Precio de Compra <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                                <input type="number" name="precio_compra" id="precio_compra"
                                                    class="form-control" value="{{ old('precio_compra', $producto->precio_compra) }}"
                                                    placeholder="0.00" step="0.01" min="0" required>
                                            </div>
                                            @error('precio_compra')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="precio_venta">Precio de Venta <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                                <input type="number" name="precio_venta" id="precio_venta"
                                                    class="form-control" value="{{ old('precio_venta',$producto->precio_venta) }}"
                                                    placeholder="0.00" step="0.01" min="0" required>
                                            </div>
                                            @error('precio_venta')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="stock">Stock <sup class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-boxes"></i></span>
                                                <input type="number" name="stock" id="stock" class="form-control"
                                                    value="{{ old('stock',$producto->stock) }}" placeholder="0" min="0" required>
                                            </div>
                                            @error('stock')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion_larga">Descripción Larga <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <div style="width: 100%">
                                                    <textarea name="descripcion_larga" id="descripcion_larga" class="form-control ckeditor" rows="2"
                                                        placeholder="Descripción detallada del producto (máx. 255 caracteres)">{{ old('descripcion_larga',$producto->descripcion_larga) }}</textarea>
                                                </div>
                                            </div>
                                            @error('descripcion_larga')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                // Editor para el contenido  (más completo)
                                                ClassicEditor
                                                    .create(document.querySelector('#descripcion_larga'), {
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
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/productos') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
