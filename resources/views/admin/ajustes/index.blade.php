@extends('layouts.admin')

@section('content')
    <h1>Ajustes del sistema</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Configuraciones del sistema</h4>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre" class="form-label">Nombre <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-building"></i></span>
                                                <input type="text" name="nombre" id="nombre"
                                                    class="form-control @error('nombre') is-invalid @enderror"
                                                    placeholder="Nombre de la empresa..." value="{{ old('nombre') }}"
                                                    required>
                                                @error('nombre')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="descripcion" class="form-label">Descripción <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-tag"></i></span>
                                                <input type="text" name="descripcion" id="descripcion"
                                                    class="form-control @error('descripcion') is-invalid @enderror"
                                                    placeholder="Breve descripción de la actividad o sector"
                                                    value="{{ old('descripcion') }}" required>
                                                @error('descripcion')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sucursal" class="form-label">Sucursal <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-shop"></i></span>
                                                <input type="text" name="sucursal" id="sucursal"
                                                    class="form-control @error('sucursal') is-invalid @enderror"
                                                    placeholder="Ej: Casa Matriz" value="{{ old('direccion') }}" required>
                                                @error('sucursal')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="direccion" class="form-label">Dirección <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text align-items-start pt-2"><i
                                                        class="bi bi-geo-alt"></i></span>
                                                <textarea name="direccion" id="direccion" rows="1" class="form-control @error('direccion') is-invalid @enderror"
                                                    placeholder="Calle, número, ciudad y país" value="" required>{{ old('direccion') }}</textarea>
                                                @error('direccion')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefonos" class="form-label">Telefono <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text align-items-start pt-2"><i
                                                        class="bi bi-telephone"></i></span>
                                                <input name="telefonos" id="telefonos" rows="1"
                                                    class="form-control @error('telefonos') is-invalid @enderror"
                                                    placeholder="Ej: +549 1123456789" value=""
                                                    required>{{ old('telefonos') }}
                                                @error('telefonos')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text align-items-start pt-2"><i
                                                        class="bi bi-envelope"></i></span>
                                                <input name="email" id="email" rows="1"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Ej: info@miempresa.com" value=""
                                                    required>{{ old('email') }}
                                                @error('email')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="divisa" class="form-label">Divisa <sup
                                                    class="text-danger">(*)</sup></label>
                                            <div class="input-group">
                                                <span class="input-group-text align-items-start pt-2"><i
                                                        class="bi bi-currency-dollar"></i></span>
                                                <select name="divisa" id="divisa" class="form-control">
                                                    <option value=""disabled selected>-- Seleccione una divisa --</option>
                                                    @foreach ($divisas as $divisa)
                                                        <option value="{{ $divisa['symbol'] }}">
                                                            {{ $divisa['name'] }} ({{ $divisa['symbol'] }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('divisa')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pagina_web" class="form-label">Página Web (Opcional)</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-globe"></i></span>
                                                <input type="url" name="pagina_web" id="pagina_web"
                                                    class="form-control @error('pagina_web') is-invalid @enderror"
                                                    value="{{ old('pagina_web') }}"
                                                    placeholder="Ej: https://www.miempresa.com">
                                                {{ old('pagina_web') }}
                                                @error('pagina_web')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                imagenes
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
