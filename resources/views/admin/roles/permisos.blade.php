@extends('layouts.admin')

@section('content')
    <h1>Listado de permisos del rol {{ $rol->name }}</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Permisos registrados
                    </h4>
                </div>
                <div class="card-body">
                    
                    @foreach ($permisos as $permiso)
                        <ul>
                            <li>{{ $permiso->name }}</li>
                        </ul>
                    @endforeach
                    

                </div>
            </div>
        </div>
    </div>
@endsection
