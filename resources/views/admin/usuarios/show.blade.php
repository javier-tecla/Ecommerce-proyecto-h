@extends('layouts.admin')

@section('content')
    <h1>Datos del usuario: {{ $usuario->name }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Datos registardos</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="rol">Rol</label>
                                <p><i class="bi bi-people-fill"></i> {{ $usuario->roles->pluck('name')->implode(', ') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre del usuario</label>
                                <p><i class="bi bi-person-badge-fill"></i> {{ $usuario->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <p><i class="bi bi-envelope-fill"></i> {{ $usuario->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="name">Fecha y hora de registro</label>
                            <p><i class="bi bi-clock"></i> {{ $usuario->created_at }}</p>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/usuarios') }}" class="btn btn-secondary">Volver</a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
