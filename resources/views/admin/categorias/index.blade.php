@extends('layouts.admin')

@section('content')
    <h1>Listado de categorias</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Categorias registradas
                        <a href="{{ url('/admin/categorias/create') }}" style="float:right" class="btn btn-primary"><i
                                class="bi bi-plus"></i> Crear nueva</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('/admin/categorias') }}" method="GET" class="mt-3">
                                <div class="input-group">
                                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..."
                                        value="{{ $_REQUEST['buscar'] ?? '' }}">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i>
                                        Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ url('/admin/categorias') }}" class="btn btn-success">
                                            <i class="bi bi-trash"></i> Limpiar</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($categorias->currentPage() - 1) * $categorias->perPage() + 1;
                            @endphp
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td style="text-align: center">{{ $nro++ }}</td>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>{{ $categoria->slug }}</td>
                                    <td>{{ $categoria->descripcion }}</td>

                                    <td class="text-center">

                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ url('/admin/categoria/' . $categoria->id) }}"
                                                class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Ver</a>
                                            <a href="{{ url('/admin/categoria/' . $categoria->id . '/edit') }}"
                                                class="btn btn-success btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="preguntar{{ $categoria->id }}(event)">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </div>


                                        <form action="{{ url('/admin/categoria/' . $categoria->id) }}" method="POST"
                                            id="miFormulario{{ $categoria->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            
                                        </form>
                                        <script>
                                            function preguntar{{ $categoria->id }}(event) {
                                                event.preventDefault();
                                                swal.fire({
                                                    title: '¿Desea eliminar este registro?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // JavaScript puro para enviar el formulario
                                                        document.getElementById('miFormulario{{ $categoria->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($categorias->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                            <div class="text-muted">
                                Mostrando {{ $categorias->firstItem() }} a {{ $categorias->lastItem() }} de
                                {{ $categorias->total() }}
                                registros
                            </div>
                            <div>
                                {{ $categorias->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
