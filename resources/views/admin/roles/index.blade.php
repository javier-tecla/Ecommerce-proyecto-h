@extends('layouts.admin')

@section('content')
    <h1>Listado de roles</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex">
                    <h4>Roles registrados
                        <a href="{{ url('/admin/roles/create') }}" style="float:right" class="btn btn-primary"><i
                                class="bi bi-plus"></i> Crear nuevo</a>
                    </h4>

                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre del rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nro = ($roles->currentPage() - 1) * $roles->perPage() + 1;
                            @endphp
                            @foreach ($roles as $role)
                                <tr>
                                    <td style="text-align: center">{{ $nro++ }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/rol/' . $role->id) }}" class="btn btn-info btn-sm"><i
                                                class="bi bi-eye"></i> Ver</a>
                                        <a href="{{ url('/admin/rol/' . $role->id . '/edit') }}"
                                            class="btn btn-success btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                                        <form action="{{ url('/admin/rol/' . $role->id) }}" method="POST"
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

                    @if ($roles->hasPages())
                        <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                            <div class="text-muted">
                                Mostrando {{ $roles->firstItem() }} a {{ $roles->lastItem() }} de {{ $roles->total() }}
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
