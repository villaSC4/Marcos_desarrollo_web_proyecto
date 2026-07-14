@extends('layouts.app')

@section('title', 'Canjes - Recicla Consciente')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/canjes.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        .modal-back { 
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(45, 79, 50, 0.4); 
            backdrop-filter: blur(8px); 
            z-index: 9999; 
            justify-content: center; 
            align-items: center; 
            transition: all 0.3s ease;
        }
 
        .modal-content-custom { 
            background: #ffffff; 
            padding: 40px 30px; 
            border-radius: 28px; 
            text-align: center; 
            max-width: 440px; 
            width: 90%; 
            box-shadow: var(--shadow-lg);
            transform: scale(0.9);
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            border: 1px solid rgba(0, 0, 0, 0.03);
        }
 
        .modal-content-custom h3 {
            color: var(--color-primary);
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }
 
        .modal-content-custom p {
            color: var(--color-muted);
            font-size: 0.98rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }
 
        .modal-content-custom strong {
            color: var(--color-dark-charcoal);
            font-weight: 700;
        }
 
        .contenedor-botones {
            display: flex;
            gap: 12px;
            justify-content: center;
        }
 
        .btn-modal { 
            flex: 1;
            padding: 12px 24px; 
            border: none; 
            border-radius: 30px; 
            cursor: pointer; 
            font-weight: 700; 
            font-size: 0.95rem;
            transition: var(--transition);
        }
 
        .btn-confirmar { 
            background-color: var(--color-secondary); 
            color: white; 
            box-shadow: 0 4px 10px rgba(31, 166, 122, 0.2);
        }
 
        .btn-confirmar:hover {
            background-color: #178d67;
            transform: translateY(-2px);
        }
 
        .btn-cancelar { 
            background-color: #f1f5f9;
            color: var(--color-muted); 
        }
 
        .btn-cancelar:hover {
            background-color: #e2e8f0;
            color: var(--color-dark-charcoal);
            transform: translateY(-2px);
        }
 
        .alert-custom { 
            padding: 18px 24px; 
            margin: 25px auto; 
            border-radius: 16px; 
            max-width: 700px; 
            text-align: center; 
            font-weight: 700; 
            font-size: 1rem;
            box-shadow: var(--shadow-sm);
        }
        .alert-success { 
            background-color: #ecfdf5; 
            color: #065f46; 
            border: 1px solid #a7f3d0; 
        }
        .alert-error { 
            background-color: #fef2f2; 
            color: #991b1b; 
            border: 1px solid #fca5a5; 
        }
    </style>
@endpush

@section('content')
<main class="py-5">
    <div class="container text-center mb-5">
        <div class="etiquetas-container mb-3">
            <span class="tag-canjes-sub">¡NUEVO!</span>
            <br>
            <span class="tag-canjes-title shadow">PRODUCTOS A CANJEAR</span>
        </div>
        <p class="mt-4 text-muted mx-auto" style="max-width: 650px; font-size: 1.05rem; line-height: 1.6;">
            ¡Tu esfuerzo por cuidar el planeta da frutos! Acumula puntos reciclando y canjéalos por excelentes beneficios, productos ecológicos y descuentos exclusivos provistos por nuestros aliados estratégicos.
        </p>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                @if(auth()->guard('colaborador')->check())
                    @php
                        $user = auth()->guard('colaborador')->user();
                        $pts = $user->puntos_acumulados;
                        $milestone = 2000;
                        $progress = min(100, ($pts / $milestone) * 100);
                    @endphp
                    <div class="points-dashboard-card text-start">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="points-title">Mi Eco-Saldo Actual</span>
                            <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill font-weight-bold">
                                <i class="fa-solid fa-leaf me-1"></i> Colaborador Activo
                            </span>
                        </div>
                        <div class="points-value mb-3">
                            {{ number_format($pts, 0, '', '.') }} <span>pts</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="progress-milestone-text">Progreso a mi siguiente meta ({{ number_format($milestone, 0, '', '.') }} pts)</span>
                            <span class="progress-milestone-text fw-bold">{{ round($progress) }}%</span>
                        </div>
                        <div class="progress dashboard-progress mb-3">
                            <div class="progress-bar dashboard-progress-bar" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="text-white-50 small mb-0">
                            💡 <em>Tip Eco: ¡Cada botella plástica o caja de Tetra Pak te suma puntos! Dirígete a nuestras estaciones para canjear más recompensas.</em>
                        </p>
                    </div>
                @else
                    <div class="guest-points-card text-center">
                        <div class="bg-light-sage rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background-color: var(--color-light-sage);">
                            <i class="fa-solid fa-lock-open text-success fs-3"></i>
                        </div>
                        <h4 class="guest-title mb-2">¿Quieres canjear premios?</h4>
                        <p class="text-muted small mb-4">
                            Inicia sesión en tu cuenta de colaborador para ver tus puntos acumulados, revisar tu progreso y desbloquear premios ecológicos exclusivos.
                        </p>
                        <a href="{{ route('login') }}" class="btn btn-guest-login px-5">Iniciar Sesión 🔐</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="filter-pills-container">
                    <span class="filter-pill active" data-filter="all">Todos los premios</span>
                    <span class="filter-pill" data-filter="300">Hasta 300 pts</span>
                    <span class="filter-pill" data-filter="700">301 - 700 pts</span>
                    <span class="filter-pill" data-filter="more">Más de 700 pts</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert-custom alert-success">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert-custom alert-error">
                <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="container py-4">
        @if($productos->isEmpty())
            <div class="text-center py-5">
                <i class="fa-solid fa-gift text-muted display-2 mb-3"></i>
                <h4 class="text-muted fw-bold">Próximamente más productos</h4>
                <p class="text-muted small">Estamos actualizando nuestra lista de premios. ¡Sigue acumulando puntos!</p>
            </div>
        @else
            @php
                $userLoggedIn = auth()->guard('colaborador')->check();
                $userPoints = $userLoggedIn ? auth()->guard('colaborador')->user()->puntos_acumulados : 0;
            @endphp
            
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" id="rewards-grid">
                @foreach($productos as $producto)
                    @php
                        $isLocked = $userLoggedIn && ($userPoints < $producto->costo_puntos);
                        $isOutOfStock = $producto->stock <= 0;
                        
                        $filterCat = 'more';
                        if ($producto->costo_puntos <= 300) {
                            $filterCat = '300';
                        } elseif ($producto->costo_puntos <= 700) {
                            $filterCat = '700';
                        }
                    @endphp

                    <div class="col reward-item-wrapper" data-points-category="{{ $filterCat }}" data-points-value="{{ $producto->costo_puntos }}">
                        <div class="card-reward-premium {{ $isLocked ? 'reward-locked' : '' }} {{ $isOutOfStock ? 'reward-outofstock' : '' }}">
                            
                            <span class="cost-badge-floating shadow-sm">
                                {{ number_format($producto->costo_puntos, 0, '', '.') }} pts
                            </span>

                            @if($isOutOfStock)
                                <span class="stock-badge-floating stock-badge-empty shadow-sm">Agotado</span>
                            @elseif($producto->stock <= 3)
                                <span class="stock-badge-floating stock-badge-low shadow-sm">¡Últimos {{ $producto->stock }}!</span>
                            @else
                                <span class="stock-badge-floating stock-badge-ok shadow-sm">Stock: {{ $producto->stock }}</span>
                            @endif

                            <div class="reward-img-container">
                                @if($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="reward-img">
                                @else
                                    <img src="{{ asset('img/default-product.jpg') }}" alt="{{ $producto->nombre }}" class="reward-img">
                                @endif

                                @if($isLocked && !$isOutOfStock)
                                    <div class="locked-lock-indicator">
                                        <i class="fa-solid fa-lock"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="reward-body">
                                <h5 class="reward-title">{{ $producto->nombre }}</h5>
                                <p class="reward-desc text-muted">
                                    {{ Str::limit($producto->descripcion, 90) }}
                                </p>

                                @if(!$userLoggedIn)
                                    <a href="{{ route('login') }}" class="btn-redeem-action btn-redeem-login">
                                        Ingresa para Canjear
                                    </a>
                                @elseif($isOutOfStock)
                                    <button class="btn-redeem-action btn-redeem-outofstock" disabled>
                                        Agotado temporalmente
                                    </button>
                                @elseif($isLocked)
                                    <button class="btn-redeem-action btn-redeem-locked shadow-sm" disabled>
                                        Faltan {{ number_format($producto->costo_puntos - $userPoints, 0, '', '.') }} pts 🔒
                                    </button>
                                @else
                                    <button class="btn-redeem-action btn-redeem-enabled" onclick="abrirModal('{{ $producto->id }}', '{{ $producto->nombre }}', '{{ $producto->costo_puntos }}')">
                                        Canjear Premio 🎁
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="no-rewards-message" style="display: none; transition: opacity 0.3s ease; opacity: 0;" class="text-center py-5 mt-4">
                <i class="fa-solid fa-filter-circle-xmark text-muted display-3 mb-3"></i>
                <h5 class="text-muted fw-bold">No se encontraron premios</h5>
                <p class="text-muted small">No hay premios disponibles en este rango de puntos. ¡Sigue reciclando para acumular más!</p>
            </div>
        @endif
    </div>
</main>

<div id="modalCanje" class="modal-back">
    <div class="modal-content-custom shadow" id="modalContent">
        <div class="text-center mb-3">
            <div class="bg-success bg-opacity-10 text-success rounded-circle mx-auto d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background-color: rgba(31, 166, 122, 0.1);">
                <i class="fa-solid fa-circle-question fs-3"></i>
            </div>
        </div>
        <h3>¿Confirmar Canje?</h3>
        <p id="modalMensaje"></p>
        
        <form id="formCanje" method="POST" action="">
            @csrf
            <div class="contenedor-botones">
                <button type="button" class="btn-modal btn-cancelar" onclick="cerrarModal()">Cancelar</button>
                <button type="submit" class="btn-modal btn-confirmar shadow-sm">Sí, canjear</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pills = document.querySelectorAll('.filter-pill');
        const cards = document.querySelectorAll('.reward-item-wrapper');
        const noResults = document.getElementById('no-rewards-message');

        pills.forEach(pill => {
            pill.addEventListener('click', function () {
                pills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');
                let visibleCount = 0;

                cards.forEach(card => {
                    const cardCat = card.getAttribute('data-points-category');
                    
                    let matches = false;
                    if (filter === 'all') {
                        matches = true;
                    } else if (filter === '300' && cardCat === '300') {
                        matches = true;
                    } else if (filter === '700' && cardCat === '700') {
                        matches = true;
                    } else if (filter === 'more' && cardCat === 'more') {
                        matches = true;
                    }

                    if (matches) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 10);
                        visibleCount++;
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });

                if (noResults) {
                    if (visibleCount === 0) {
                        noResults.style.display = 'block';
                        setTimeout(() => { noResults.style.opacity = '1'; }, 10);
                    } else {
                        noResults.style.opacity = '0';
                        setTimeout(() => { noResults.style.display = 'none'; }, 300);
                    }
                }
            });
        });
    });

    function abrirModal(id, nombre, puntos) {
        const form = document.getElementById('formCanje');
        form.action = `/canjes/${id}`;

        const puntosFormateados = Number(puntos).toLocaleString('de-DE');

        const mensaje = document.getElementById('modalMensaje');
        mensaje.innerHTML = `¿Estás seguro que deseas canjear <strong>${nombre}</strong> por <strong>${puntosFormateados} puntos</strong>? <br><small class="text-muted">Se enviará un comprobante a tu correo registrado.</small>`;

        const modal = document.getElementById('modalCanje');
        const content = document.getElementById('modalContent');
        
        modal.style.display = 'flex';
        setTimeout(() => {
            content.style.transform = 'scale(1)';
        }, 10);
    }

    function cerrarModal() {
        const content = document.getElementById('modalContent');
        const modal = document.getElementById('modalCanje');
        
        content.style.transform = 'scale(0.9)';
        setTimeout(() => {
            modal.style.display = 'none';
        }, 150);
    }
</script>
@endpush