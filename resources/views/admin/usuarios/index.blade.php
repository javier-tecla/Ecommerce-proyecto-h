@extends('layouts.admin')

@section('content')
    <h1>Listado de usuarios</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Usuarios registrados
                        <a href="{{ url('/admin/usuarios/create') }}" style="float:right" class="btn btn-primary"><i
                                class="bi bi-plus"></i> Crear nuevo</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ url('/admin/usuarios') }}" method="GET" class="mt-3">
                                <div class="input-group">
                                    <input type="text" name="buscar" class="form-control" placeholder="Buscar..." value="{{ $_REQUEST['buscar'] ?? '' }}">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
                                    @if (isset($_REQUEST['buscar']))
                                        <a href="{{ url('/admin/usuarios') }}" class="btn btn-success">
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
                                <th>Rol del usuario</th>
                                <th>Nombre del usuario</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($usuarios->currentPage() - 1) * $usuarios->perPage() + 1;
                            @endphp
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td style="text-align: center">{{ $nro++ }}</td>
                                    <td>{{ $usuario->roles->pluck('name')->implode(', ') }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/usuario/' . $usuario->id) }}" class="btn btn-info btn-sm"><i
                                                class="bi bi-eye"></i> Ver</a>
                                        <a href="{{ url('/admin/usuario/' . $usuario->id . '/edit') }}"
                                            class="btn btn-success btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                        <form action="{{ url('/admin/usuario/' . $usuario->id) }}" method="POST"
                                            id="miFormulario{{ $usuario->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="preguntar{{ $usuario->id }}(event)">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                        <script>
                                            function preguntar{{ $usuario->id }}(event) {
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
                                                        document.getElementById('miFormulario{{ $usuario->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($usuarios->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                            <div class="text-muted">
                                Mostrando {{ $usuarios->firstItem() }} a {{ $usuarios->lastItem() }} de
                                {{ $usuarios->total() }}
                                registros
                            </div>
                            <div>
                                {{ $roles->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
