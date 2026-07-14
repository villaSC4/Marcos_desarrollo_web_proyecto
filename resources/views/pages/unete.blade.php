@extends('layouts.app')

@section('title', 'Únete al Reciclaje - Recicla Consciente')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/unete.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')
<main class="unete-page-container">
    <div class="toast-container">
        @if(session('success'))
            <div class="toast-premium" id="toastNotification">
                <div class="toast-content">
                    <span class="toast-icon">🎉</span>
                    <span class="toast-text">{{ session('success') }}</span>
                </div>
                <button class="toast-close" onclick="dismissToast()">✕</button>
            </div>
        @endif

        @if(session('error'))
            <div class="toast-premium toast-error" id="toastNotification">
                <div class="toast-content">
                    <span class="toast-icon">⚠️</span>
                    <span class="toast-text">{{ session('error') }}</span>
                </div>
                <button class="toast-close" onclick="dismissToast()">✕</button>
            </div>
        @endif
    </div>

    <section class="seccion-inscripcion">
        <div class="banner-superior-verde">
            <img src="{{ asset('img/plantadecorativa.webp') }}" class="planta-decorativa left" alt="Planta decorativa izquierda"/>
            <img src="{{ asset('img/plantadecorativa.webp') }}" class="planta-decorativa right" alt="Planta decorativa derecha">
            
            <div class="header-sticker">
                <span class="txt-unete">¡ÚNETE</span>
                <h2 class="txt-reciclaje">AL RECICLAJE!</h2>
            </div>

            <div class="container text-center mt-4">
                <p>Sé parte de #ReciclaConsciente llevando tus envases reciclables a las estaciones de reciclaje de Plaza Vea, Vivanda y Makro.</p>
                <p>Todos los residuos reciclables son gestionados por las Asociaciones de Recicladores formales que trabajan con las municipalidades aliadas de #ReciclaConsciente.</p>
            </div>
        </div>
        
        <section class="seccion-inscripcion-bloque">
            <div class="franja-inferior-verde">
                <div class="bloque-inscripcion">
                    <p class="texto llamado">
                        Te invitamos a conocerlas y a inscribirte al programa municipal de reciclaje de tu distrito, para junt@s seguir cuidando nuestro planeta.
                    </p>
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSeM3T5No9J6aG7DRGULVwy5vZYUXTi98kVI5XIE5g_yLa2x9A/viewform?usp=publish-editor" class="boton-sticker-verde">
                        INSCRÍBETE AQUÍ
                    </a>
                </div>
            </div>
            <img src="{{ asset('img/Persona.webp') }}" alt="Persona Limpiando" class="img-persona">
        </section>
    </section>

    <section class="seccion-actividades py-5" id="actividades">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-uppercase tracking-wider text-success fw-bold">JORNADAS DE IMPACTO</span>
                <h2 class="section-title fw-bold text-dark-blue mt-2">Próximas Actividades Comunitarias</h2>
                <p class="text-muted max-w-600 mx-auto">Participa de las campañas de recojo de basura, educación ecológica y arborización en San Juan de Lurigancho para acumular eco-puntos directos.</p>
            </div>

            <div class="row g-4">
                @if($actividades->isEmpty())
                    <div class="col-12 text-center py-5">
                        <div class="p-5 bg-white rounded-4 border border-light shadow-xs max-w-600 mx-auto">
                            <i class="fa-solid fa-circle-exclamation text-muted fs-1 mb-3"></i>
                            <h5 class="fw-bold text-dark-blue">No hay actividades programadas por ahora</h5>
                            <p class="text-muted small mb-0">Estamos planificando las próximas jornadas. ¡Regístrate y te enviaremos una notificación cuando estén listas!</p>
                        </div>
                    </div>
                @else
                    @foreach($actividades as $actividad)
                        <div class="col-lg-4 col-md-6">
                            <div class="card-actividad-premium h-100 bg-white rounded-4 shadow-sm border-0 d-flex flex-column justify-content-between p-4">
                                <div>
                                    <h3 class="actividad-nombre-premium fw-bold text-dark-blue mb-1">{{ $actividad->nombre }}</h3>
                                    <p class="actividad-desc-premium text-muted mb-4">
                                        {{ $actividad->descripcion ?? 'Únete a nosotros en esta jornada en favor del medio ambiente y la sostenibilidad local.' }}
                                    </p>
                                    
                                    <div class="actividad-details-premium">
                                        <div class="d-flex align-items-center gap-2 mb-2 text-dark">
                                            <span>📅</span>
                                            <span><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($actividad->fecha_activity)->format('d/m/Y') }}</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 mb-2 text-dark">
                                            <span>📍</span>
                                            <span><strong>Lugar:</strong> {{ $actividad->direccion ?? 'Por definir' }}</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 mb-4 text-dark">
                                            <span>⭐</span>
                                            <span><strong>Recompensa:</strong> <span class="text-success-custom fw-bold">+{{ $actividad->puntos_otorgados }} Puntos</span></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <form method="POST" action="{{ route('actividades.participar', $actividad->id) }}">
                                    @csrf
                                    @if(auth()->guard('colaborador')->check() && auth()->guard('colaborador')->user()->actividades()->where('actividad_id', $actividad->id)->exists())
                                        <button type="button" class="btn-participar-premium btn-ya-inscrito w-100 py-2.5 rounded-3 fw-bold text-center" disabled>
                                            Ya estás inscrito
                                        </button>
                                    @else
                                        <button type="submit" class="btn-participar-premium w-100 py-2.5 rounded-3 fw-bold text-center">
                                            Participar
                                        </button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <section class="seccion-aliados py-5 bg-white border-top border-light">
        <div class="container text-center">
            <span class="text-uppercase tracking-wider text-success fw-bold">RED INSTITUCIONAL</span>
            <h2 class="section-title fw-bold text-dark-blue mt-2 mb-3">Municipalidades Aliadas</h2>
            <p class="text-muted max-w-600 mx-auto mb-5">Trabajamos de la mano con los gobiernos locales para asegurar que cada residuo recolectado se derive a asociaciones formales autorizadas.</p>

            <div class="row g-4 align-items-center justify-content-center logo-allied-grid">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="circulo-logo-premium mx-auto">
                        <img src="{{ asset('img/MUNILIMA.webp') }}" alt="Municipalidad de Lima" class="img-fluid logo-gray-to-color">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="circulo-logo-premium mx-auto">
                        <img src="{{ asset('img/MUNILINCE.webp') }}" alt="Municipalidad de Lince" class="img-fluid logo-gray-to-color">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="circulo-logo-premium mx-auto">
                        <img src="{{ asset('img/MUNIRIMAC.webp') }}" alt="Municipalidad del Rímac" class="img-fluid logo-gray-to-color">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="circulo-logo-premium mx-auto">
                        <img src="{{ asset('img/MUNISJL.webp') }}" alt="Municipalidad de San Juan de Lurigancho" class="img-fluid logo-gray-to-color">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="circulo-logo-premium mx-auto">
                        <img src="{{ asset('img/MUNIVICTORIA.webp') }}" alt="Municipalidad de La Victoria" class="img-fluid logo-gray-to-color">
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="circulo-logo-premium mx-auto">
                        <img src="{{ asset('img/SanBorja.webp') }}" alt="Municipalidad de San Borja" class="img-fluid logo-gray-to-color">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toast = document.getElementById('toastNotification');
            if (toast) {
                setTimeout(() => {
                    toast.classList.add('show');
                }, 150);

                setTimeout(() => {
                    dismissToast();
                }, 6000);
            }
        });

        function dismissToast() {
            const toast = document.getElementById('toastNotification');
            if (toast) {
                toast.classList.remove('show');
                setTimeout(() => {
                    toast.style.display = 'none';
                }, 400);
            }
        }
    </script>
@endpush