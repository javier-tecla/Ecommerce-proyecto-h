@extends('layouts.web')

@section('content')
    <!-- Page Title -->
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Mi Cuenta</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Cuenta</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Account Section -->
    <section id="account" class="account section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Mobile Menu Toggle -->
            <div class="mobile-menu d-lg-none mb-4">
                <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
                    <i class="bi bi-grid"></i>
                    <span>Menu</span>
                </button>
            </div>

            <div class="row g-4">
                <!-- Profile Menu -->
                <div class="col-lg-3">
                    <div class="profile-menu collapse d-lg-block" id="profileMenu">
                        <!-- User Info -->
                        <div class="user-info" data-aos="fade-right">
                            <div class="user-avatar">
                                <img src="{{ asset('storage/' . $ajuste->logo) }}" alt="Profile" loading="lazy">
                                <span class="status-badge"><i class="bi bi-shield-check"></i></span>
                            </div>
                            <h4>{{ Auth::user()->name }}</h4>
                            <div class="user-status">
                                <i class="bi bi-award"></i>
                                <span>{{ Auth::user()->roles()->pluck('name')->implode(',') }}</span>
                            </div>
                        </div>

                        <!-- Navigation Menu -->
                        <nav class="menu-nav">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#orders">
                                        <i class="bi bi-box-seam"></i>
                                        <span>Mis pedidos</span>
                                        <span class="badge">{{ $total_pedidos }}</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="col-lg-9">
                    <div class="content-area">
                        <div class="tab-content">
                            <!-- Orders Tab -->
                            <div class="tab-pane fade show active" id="orders">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Mis pedidos</h2>

                                </div>

                                <div class="orders-grid">

                                    @foreach ($pedidos as $pedido)
                                        <!-- Order Card 1 -->
                                        <div class="order-card" data-aos="fade-up" data-aos-delay="100">
                                            <div class="order-header">
                                                <div class="order-id">
                                                    <span class="label">Order ID:</span>
                                                    <span class="value">#ORD-{{ $pedido->id }}</span>
                                                </div>
                                                <div class="order-date">Fecha de la orden:
                                                    {{ $pedido->created_at->format('d/m/Y H:i') }}</div>
                                            </div>
                                            <div class="order-content">
                                                <div class="product-grid">
                                                    {{-- Calcular el conteo total de items --}}
                                                    @php
                                                        $itemCount = count($pedido->detalles);
                                                    @endphp
                                                    @foreach ($pedido->detalles as $detalle)
                                                        @php
                                                            $imagen_producto = $detalle->producto->imagenes->first();
                                                            $imagen = $imagen_producto->imagen ?? '';
                                                        @endphp
                                                        <img src="{{ asset('storage/' . $imagen) }}" alt="Product"
                                                            loading="lazy">
                                                    @endforeach
                                                </div>
                                                <div class="order-info">
                                                    <div class="info-row">
                                                        <span>Estado de la orden</span>
                                                        <span class="status processing">{{ $pedido->estado_orden }}</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Items</span>
                                                        {{-- Usar @choice para manejar la pluralización --}}
                                                        <span>{{ $itemCount }}
                                                            @choice('producto|productos', $itemCount)
                                                        </span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Total</span>
                                                        <span class="price">
                                                            {{ $pedido->divisa . ' ' . $pedido->total }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-footer">
                                                <button type="button" class="btn-track" data-bs-toggle="collapse"
                                                    data-bs-target="#tracking{{ $pedido->id }}" aria-expanded="false"
                                                    aria-controls="tracking{{ $pedido->id }}">Seguimiento de la
                                                    orden</button>
                                                <button type="button" class="btn-details" data-bs-toggle="collapse"
                                                    data-bs-target="#details{{ $pedido->id }}" aria-expanded="false">Ver
                                                    detalles</button>
                                            </div>

                                            <!-- Order Tracking -->
                                            <div class="collapse tracking-info" id="tracking{{ $pedido->id }}">
                                                <div class="tracking-timeline">
                                                    <div class="timeline-item completed">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-check-circle-fill"></i>
                                                        </div>
                                                        @if ($pedido->estado_orden == 'Enviado')
                                                            <div class="timeline-content">
                                                                <h5>Order enviado</h5>
                                                                <p>{!! $pedido->nota !!}</p>
                                                                <span class="timeline-date">Fecha de envio:
                                                                    {{ $pedido->updated_at->format('d/m/Y H:i') }}</span>
                                                            </div>
                                                        @else
                                                            <div class="timeline-item active">
                                                                <div class="timeline-icon">
                                                                    <i class="bi bi-box-seam"></i>
                                                                </div>
                                                                <div class="timeline-content">
                                                                    <h5>Procesando el envio</h5>
                                                                    <p>Estamos trabajando en el envio, le avisaremos por
                                                                        mail cuando sea enviado.</p>
                                                                    <span class="timeline-date">Fecha de registro:
                                                                        {{ $pedido->created_at->format('d/m/Y H:i') }}</span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>


                                                    <div class="timeline-item">
                                                        <div class="timeline-icon">
                                                            <i class="bi bi-house-door"></i>
                                                        </div>
                                                        <div class="timeline-content">
                                                            <h5>Orden creada:</h5>
                                                            <p>Fecha de compra:
                                                                {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Order Details -->
                                            <div class="collapse order-details" id="details{{ $pedido->id }}">
                                                <div class="details-content">
                                                    <div class="detail-section">
                                                        <h5>Informacion de la orden</h5>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>{{ $itemCount }}
                                                            @choice('producto|productos', $itemCount)
                                                        </h5>
                                                        <div class="order-items">

                                                            @foreach ($pedido->detalles as $detalle)
                                                                @php
                                                                    $imagen_producto = $detalle->producto->imagenes->first();
                                                                    $imagen = $imagen_producto->imagen ?? '';
                                                                @endphp
                                                                <div class="item">
                                                                    <img src="{{ asset('storage/' . $imagen) }}"
                                                                        alt="Product" loading="lazy">
                                                                    <div class="item-info">
                                                                        <h6>{{ $detalle->producto->nombre }}</h6>
                                                                        <div class="item-meta">
                                                                            <span class="sku">{{ $detalle->producto->descripcion_corta }}</span>
                                                                            <span class="qty">Cantidad: {{ $detalle->cantidad }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-price">{{$pedido->divisa. " " .$detalle->precio }}</div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Detalles del precio</h5>
                                                        <div class="price-breakdown">
                                                            <div class="price-row total">
                                                                <span>Total</span>
                                                                <span>{{ $pedido->divisa . ' ' . $pedido->total }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="detail-section">
                                                        <h5>Dirección de envio</h5>
                                                        <div class="address-info">
                                                            <p>
                                                                {{ $pedido->direccion_envio}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Account Section -->
@endsection
