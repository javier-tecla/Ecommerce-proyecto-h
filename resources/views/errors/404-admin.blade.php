@extends('layouts.admin')

@section('content')
    <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
            <div class="text-center">
                <img class="img-error" src="{{ asset('/assets/compiled/svg/error-404.svg') }}" width="50%" alt="Extraviado">
                <h1 class="error-title">EXTRAVIADO</h1>
                <p class='fs-5 text-gray-600'>La página que busca no se encuentra..</p>
                <a href="{{ url('/admin') }}" class="btn btn-lg btn-outline-primary mt-3">Ir al inicio</a>
            </div>
        </div>
    </div>
@endsection
