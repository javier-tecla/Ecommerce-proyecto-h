@extends('layouts.admin')

@section('content')
    <h1>Listado de usuarios</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex">
                    <h4>Usuarios registrados
                        <a href="{{ url('/admin/usuarios/create') }}" style="float:right" class="btn btn-primary"><i
                                class="bi bi-plus"></i> Crear nuevo</a>
                    </h4>

                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped table-sm">
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
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/usuario/' . $usuario->id) }}" class="btn btn-info btn-sm"><i
                                                class="bi bi-eye"></i> Ver</a>
                                        <a href="{{ url('/admin/usuario/' . $usuario->id . '/edit') }}"
                                            class="btn btn-success btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                        <form action="{{ url('/admin/usuario/' . $usuario->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar ese rol?')">
                                                <i class="bi bi-trash"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($usuarios->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                            <div class="text-muted">
                                Mostrando {{ $usuarios->firstItem() }} a {{ $usuarios->lastItem() }} de {{ $usuarios->total() }}
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
