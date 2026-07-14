@extends('layouts.app')

@section('title', 'Socios y Aliados - Recicla Consciente')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/StyleSocios.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
@endpush

@section('content')
<div class="socios-hero-section py-5 text-center position-relative overflow-hidden">
    <div class="decoracion-hojas">
        <img src="{{ asset('img/deco1.png') }}" alt="Decoración" class="deco-hoja-left">
        <img src="{{ asset('img/deco2.png') }}" alt="Decoración" class="deco-hoja-right">
    </div>

    <div class="container py-4 position-relative z-1">
        <div class="etiquetas-container mb-4">
            <span class="tag-recicla-en">CONOCE A NUESTROS</span>
            <br>
            <span class="tag-recicla-titulo shadow">SOCIOS Y ALIADOS</span>
        </div>
        <p class="hero-descripcion-socios mx-auto text-muted mt-3" style="max-width: 700px; font-size: 1.15rem; line-height: 1.6;">
            En <strong>Recicla Consciente</strong> trabajamos en una gran alianza nacional. Colaboramos con empresas comprometidas y gobiernos locales para crear una red de reciclaje eficiente y premiar tus buenas acciones ambientales.
        </p>
    </div>
</div>

<main class="container pb-5">
    <section class="section-socios mt-4 mb-5">
        <div class="d-flex align-items-center mb-4 pb-2 border-bottom">
            <div class="bg-primary-green text-white rounded-circle p-2 d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                <i class="fa-solid fa-store fs-5"></i>
            </div>
            <div>
                <h3 class="section-title mb-0 fw-bold">SOCIOS COMERCIALES</h3>
                <p class="text-muted mb-0 small">Establecimientos donde puedes depositar tus residuos y canjear tus puntos.</p>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 justify-content-center">
            <div class="col">
                <div class="card h-100 partner-card shadow-sm border-0">
                    <span class="badge-partner socio-badge">Socio Fundador</span>
                    <div class="logo-container d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('img/tottus.png') }}" alt="Logo Tottus" class="img-fluid partner-logo">
                    </div>
                    <div class="card-body pt-0 text-center">
                        <h5 class="partner-name fw-bold">Tottus</h5>
                        <p class="partner-description text-muted small">
                            Estaciones de reciclaje activas en tiendas seleccionadas para recolectar plástico, cartón y vidrio.
                        </p>
                        <div class="partner-perk mt-2">
                            <span class="badge rounded-pill text-success bg-success-light">Canje de puntos</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 partner-card shadow-sm border-0">
                    <span class="badge-partner socio-badge">Socio Comercial</span>
                    <div class="logo-container d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('img/plazavea.jpg') }}" alt="Logo Plaza Vea" class="img-fluid partner-logo">
                    </div>
                    <div class="card-body pt-0 text-center">
                        <h5 class="partner-name fw-bold">Plaza Vea</h5>
                        <p class="partner-description text-muted small">
                            Puntos ecológicos en supermercados para la entrega de botellas PET y empaques flexibles.
                        </p>
                        <div class="partner-perk mt-2">
                            <span class="badge rounded-pill text-success bg-success-light">Canje de puntos</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 partner-card shadow-sm border-0">
                    <span class="badge-partner socio-badge">Socio Comercial</span>
                    <div class="logo-container d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('img/vivanda.jpg') }}" alt="Logo Vivanda" class="img-fluid partner-logo">
                    </div>
                    <div class="card-body pt-0 text-center">
                        <h5 class="partner-name fw-bold">Vivanda</h5>
                        <p class="partner-description text-muted small">
                            Contenedores especiales para el reciclaje de aluminio, envases de vidrio y Tetra Pak.
                        </p>
                        <div class="partner-perk mt-2">
                            <span class="badge rounded-pill text-success bg-success-light">Canje de puntos</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 partner-card shadow-sm border-0">
                    <span class="badge-partner socio-badge">Socio Comercial</span>
                    <div class="logo-container d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('img/makro.jpg') }}" alt="Logo Makro" class="img-fluid partner-logo">
                    </div>
                    <div class="card-body pt-0 text-center">
                        <h5 class="partner-name fw-bold">Makro</h5>
                        <p class="partner-description text-muted small">
                            Zonas de acopio mayorista para reciclaje de cartón corrugado y plásticos industriales.
                        </p>
                        <div class="partner-perk mt-2">
                            <span class="badge rounded-pill text-success bg-success-light">Canje de puntos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-aliados my-5">
        <div class="d-flex align-items-center mb-4 pb-2 border-bottom">
            <div class="bg-secondary-green text-white rounded-circle p-2 d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                <i class="fa-solid fa-building-flag fs-5"></i>
            </div>
            <div>
                <h3 class="section-title mb-0 fw-bold">ALIADOS MUNICIPALES</h3>
                <p class="text-muted mb-0 small">Gobiernos locales que impulsan la recolección diferenciada y programas vecinales.</p>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 justify-content-center">
            <div class="col">
                <div class="card h-100 partner-card shadow-sm border-0">
                    <span class="badge-partner aliado-badge">Aliado Estratégico</span>
                    <div class="logo-container d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('img/MUNILIMA.webp') }}" alt="Municipalidad de Lima" class="img-fluid partner-logo">
                    </div>
                    <div class="card-body pt-0 text-center">
                        <h5 class="partner-name fw-bold">Municipalidad de Lima</h5>
                        <p class="partner-description text-muted small">
                            Apoyo en la difusión de campañas de concientización y soporte logístico en el centro histórico.
                        </p>
                        <div class="partner-perk mt-2">
                            <span class="badge rounded-pill text-info bg-info-light">Apoyo Institucional</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 partner-card shadow-sm border-0">
                    <span class="badge-partner aliado-badge">Aliado Activo</span>
                    <div class="logo-container d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('img/SanBorja.webp') }}" alt="Municipalidad de San Borja" class="img-fluid partner-logo">
                    </div>
                    <div class="card-body pt-0 text-center">
                        <h5 class="partner-name fw-bold">Municipalidad de San Borja</h5>
                        <p class="partner-description text-muted small">
                            Integración con el programa Basura que no es Basura para recojo directo a domicilio.
                        </p>
                        <div class="partner-perk mt-2">
                            <span class="badge rounded-pill text-info bg-info-light">Recojo Domiciliario</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 partner-card shadow-sm border-0">
                    <span class="badge-partner aliado-badge">Aliado Activo</span>
                    <div class="logo-container d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('img/MUNILINCE.webp') }}" alt="Municipalidad de Lince" class="img-fluid partner-logo">
                    </div>
                    <div class="card-body pt-0 text-center">
                        <h5 class="partner-name fw-bold">Municipalidad de Lince</h5>
                        <p class="partner-description text-muted small">
                            Puntos de acopio en parques principales de Lince con contenedores clasificados para vecinos.
                        </p>
                        <div class="partner-perk mt-2">
                            <span class="badge rounded-pill text-info bg-info-light">Puntos Limpios</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 partner-card shadow-sm border-0">
                    <span class="badge-partner aliado-badge">Aliado Activo</span>
                    <div class="logo-container d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('img/MUNIRIMAC.webp') }}" alt="Municipalidad del Rímac" class="img-fluid partner-logo">
                    </div>
                    <div class="card-body pt-0 text-center">
                        <h5 class="partner-name fw-bold">Municipalidad del Rímac</h5>
                        <p class="partner-description text-muted small">
                            Talleres de educación ambiental en colegios del distrito y recolección los fines de semana.
                        </p>
                        <div class="partner-perk mt-2">
                            <span class="badge rounded-pill text-info bg-info-light">Educación Ambiental</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 partner-card shadow-sm border-0">
                    <span class="badge-partner aliado-badge">Aliado Activo</span>
                    <div class="logo-container d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('img/MUNIVICTORIA.webp') }}" alt="Municipalidad de La Victoria" class="img-fluid partner-logo">
                    </div>
                    <div class="card-body pt-0 text-center">
                        <h5 class="partner-name fw-bold">Municipalidad de La Victoria</h5>
                        <p class="partner-description text-muted small">
                            Campaña de formalización y apoyo técnico para asociaciones locales de recicladores.
                        </p>
                        <div class="partner-perk mt-2">
                            <span class="badge rounded-pill text-info bg-info-light">Formalización</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 partner-card shadow-sm border-0">
                    <span class="badge-partner aliado-badge">Aliado Activo</span>
                    <div class="logo-container d-flex align-items-center justify-content-center p-4">
                        <img src="{{ asset('img/MUNISJL.webp') }}" alt="Municipalidad de San Juan de Lurigancho" class="img-fluid partner-logo">
                    </div>
                    <div class="card-body pt-0 text-center">
                        <h5 class="partner-name fw-bold">Municipalidad de SJL</h5>
                        <p class="partner-description text-muted small">
                            Programa de reciclaje inclusivo y recolección masiva en zonas residenciales y comerciales.
                        </p>
                        <div class="partner-perk mt-2">
                            <span class="badge rounded-pill text-info bg-info-light">Reciclaje Inclusivo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-socios text-center p-5 rounded-4 mt-5 shadow">
        <div class="cta-content position-relative z-1 mx-auto" style="max-width: 600px;">
            <i class="fa-solid fa-handshake-angle fs-1 text-white mb-3 animation-pulse"></i>
            <h3 class="text-white fw-bold mb-3 fs-2">¿Quieres que tu empresa o municipio se una?</h3>
            <p class="text-light-green mb-4">
                Sé parte de la economía circular. Juntos podemos ampliar la red de reciclaje, educar a más ciudadanos y hacer que el reciclaje sea un hábito en todo el país.
            </p>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="{{ route('unete') }}" class="btn btn-light-custom px-4 py-3 fw-bold rounded-pill shadow-sm">
                    Quiero Registrarme
                </a>
                <a href="mailto:alianzas@reciclaconsciente.com" class="btn btn-outline-light-custom px-4 py-3 fw-bold rounded-pill">
                    Contáctanos por Correo
                </a>
            </div>
        </div>
    </section>
</main>
@endsection