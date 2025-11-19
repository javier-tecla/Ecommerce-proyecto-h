@extends('layouts.web')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Carrito de compras</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Cart</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Cart Section -->
    <section id="cart" class="cart section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="cart-items">
                        <div class="cart-header d-none d-lg-block">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <h5>Productos</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>Precios</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>Cantidad</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>Subtotal</h5>
                                </div>
                            </div>
                        </div>

                        @php
                            $total = 0;
                        @endphp

                        @foreach ($carritos as $carrito)
                            <!-- Cart Item 1 -->
                            <div class="cart-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-lg-0 mb-3">
                                        <div class="product-info d-flex align-items-center">
                                            <div class="product-image">
                                                @php
                                                    $imagen_producto = $carrito->producto->imagenes->first();
                                                    $imagen = $imagen_producto->imagen ?? '';
                                                @endphp
                                                <img src="{{ asset('storage/' . $imagen) }}" alt="Producto"
                                                    class="img-fluid" loading="lazy">
                                            </div>
                                            <div class="product-details">
                                                <h6 class="product-title">{{ $carrito->producto->nombre }}</h6>
                                                <span class="badge bg-danger">{{ $carrito->producto->stock }}
                                                    disponibles</span>
                                                <br>
                                                <form action="{{ url('/carrito/' . $carrito->id) }}" method="POST"
                                                    id="miFormulario{{ $carrito->id }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm" type="button"
                                                        onclick="preguntar{{ $carrito->id }}(event)">
                                                        <i class="bi bi-trash"></i> Borrar
                                                    </button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $carrito->id }}(event) {
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
                                                                document.getElementById('miFormulario{{ $carrito->id }}').submit();
                                                            }
                                                        });
                                                    }
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                        <div class="price-tag">
                                            <span
                                                class="current-price">{{ $ajuste->divisa . ' ' . number_format($carrito->producto->precio_venta, 2, ',', '.') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                        <form action="{{ url('/carrito/actualizar') }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="carrito_id" value="{{ $carrito->id }}">
                                            <div class="quantity-selector">
                                                <button type="submit" class="quantity-btn decrease">
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                                <input type="number" class="quantity-input"
                                                    value="{{ $carrito->cantidad }}" min="1"
                                                    max="{{ $carrito->producto->stock }}" name="cantidad">
                                                <button type="submit" class="quantity-btn increase">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                                        <div class="item-total">
                                            @php
                                                $subtotal = $carrito->producto->precio_venta * $carrito->cantidad;
                                                $total += $subtotal;
                                            @endphp
                                            <span>{{ $ajuste->divisa . ' ' . number_format($subtotal, 2, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Cart Item -->
                        @endforeach

                        <div class="cart-actions">
                            <div class="row">
                                <div class="col-lg-6 mb-3 mb-lg-0">

                                </div>
                                <div class="col-lg-6 text-md-end">
                                    <form action="{{ url('/carrito/limpiar') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-remove">
                                            <i class="bi bi-trash"></i> Limpiar Carrito
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="cart-summary">
                        <h4 class="summary-title">Resumen del pedido</h4>

                        <div class="summary-total">
                            <span class="summary-label">Total</span>
                            <span
                                class="summary-value">{{ $ajuste->divisa . ' ' . number_format($total, 2, ',', '.') }}</span>
                        </div>

                        <div class="checkout-button">
                            <a href="#" class="btn btn-accent w-100">
                                Pasar por la caja <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>

                        <div class="continue-shopping">
                            <a href="{{ url('/') }}" class="btn btn-link w-100">
                                <i class="bi bi-arrow-left"></i> Continuar Comprando
                            </a>
                        </div>

                        <div class="payment-methods">
                            <p class="payment-title">We Accept</p>
                            <div class="payment-icons">
                                <i class="bi bi-credit-card"></i>
                                <i class="bi bi-paypal"></i>
                                <i class="bi bi-wallet2"></i>
                                <i class="bi bi-bank"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Cart Section -->
@endsection
