@extends('layouts.web')

@section('content')
    <!-- Page Title -->
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Ajustes de mi cuenta</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Ajustes de mi cuenta</li>
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
                                        <span>Ajustes</span>
                                        
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
                            <!-- Settings Tab -->
                            <div class="tab-pane fade show active" id="settings">
                                <div class="section-header" data-aos="fade-up">
                                    <h2>Ajustes de mi cuenta</h2>
                                </div>

                                <div class="settings-content">
                                    <!-- Personal Information -->
                                    <div class="settings-section" data-aos="fade-up">
                                        <h3>Informacion personal</h3>
                                        <form class="php-email-form settings-form">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="firstName" class="form-label">Nombre de usuario</label>
                                                    <input type="text" class="form-control" id="firstName" value="{{ Auth::user()->name }}"
                                                        required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        value="{{ Auth::user()->email }}" required="">
                                                </div>
                                            </div>

                                            <div class="form-buttons">
                                                <button type="submit" class="btn-save">Guardar cambios</button>
                                            </div>

                                            <div class="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Your changes have been saved successfully!</div>
                                        </form>
                                    </div>

                                    <!-- Security Settings -->
                                    <div class="settings-section" data-aos="fade-up" data-aos-delay="200">
                                        <h3>Seguridad</h3>
                                        <form class="php-email-form settings-form">
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label for="currentPassword" class="form-label">Contraseña actual</label>
                                                    <input type="password" class="form-control" id="currentPassword"
                                                        required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="newPassword" class="form-label">Nueva contraseña</label>
                                                    <input type="password" class="form-control" id="newPassword"
                                                        required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="confirmPassword" class="form-label">Confirmación de la contraseña</label>
                                                    <input type="password" class="form-control" id="confirmPassword"
                                                        required="">
                                                </div>
                                            </div>

                                            <div class="form-buttons">
                                                <button type="submit" class="btn-save">Actualizar contraseña</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Account Section -->
@endsection
