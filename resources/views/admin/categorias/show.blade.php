@extends('layouts.admin')

@section('content')
    <h1>Categoría: {{ $categoria->nombre }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Datos registrados</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre de la categoría </label>
                                <p><i class="bi bi-tag"> {{ $categoria->nombre }} </i></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Slug </label>
                                <p><i class="bi bi-link-45deg"></i> {{ $categoria->slug }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción </label>
                                <p><i class="bi bi-text-paragraph"></i> {{ $categoria->descripcion }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Fecha y hora de registro</label>
                                <p><i class="bi bi-clock"></i> {{ $categoria->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/categorias') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
