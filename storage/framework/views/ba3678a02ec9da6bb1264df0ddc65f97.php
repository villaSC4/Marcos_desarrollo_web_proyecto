

<?php $__env->startSection('title', 'Inicio - Recicla Consciente'); ?>

<?php $__env->startSection('content'); ?>

    <section class="recicla-hero">
        <div class="container d-flex align-items-center justify-content-between flex-wrap">
            <div class="hero-texto">
               <div class="etiquetas-container" style="line-height: 1.1; margin-bottom: 20px;">
                    <span class="tag-en" style="font-size: 30px; font-weight: bold; display: inline-block;">EN</span>
                    <span class="tag-recicla" style="font-size: 64px ; margin-left: 10px;">RECICLA</span>
                    <br>
                    <span class="tag-consciente" style="font-size: 64px ;  margin-top: 5px;">CONSCIENTE</span>
</div>
                <p class="hero-descripcion">
                    Unimos empresas, municipalidades, recicladoras, y a ciudadanos como tú para cambiar esta realidad
                </p>
            </div>
            <div class="hero-imagen-wrapper">
                <img src="<?php echo e(asset('img/señora_inicio.png')); ?>" alt="Recicladora consciente" class="img-curva">
            </div>
        </div>
    </section>

    <section class="seccion-videos-casa">
        <div class="container text-center">
            <div class="titulo-seccion-wrapper">
                <span class="subtitulo-seccion-videos">Eco-Tutoriales</span>
                <br>
                <div class="titulo-seccion">EN CASA</div>
            </div>
            
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
                <!-- Video 1 -->
                <div class="col">
                    <div class="video-card-eco h-100">
                        <div class="video-wrapper-inner">
                            <video controls poster="<?php echo e(asset('img/video1.png')); ?>">
                                <source src="<?php echo e(asset('video/diaDelRecicladorMotivoTetraPak.mp4')); ?>" type="video/mp4">
                                Tu navegador no soporta videos.
                            </video>
                        </div>
                        <div class="video-card-body">
                            <h4 class="video-card-title">Día del Reciclador</h4>
                            <p class="video-descripcion">
                                Conoce cómo la recolección de envases de Tetra Pak impacta positivamente en el trabajo y vida de las familias recicladoras.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="col">
                    <div class="video-card-eco h-100">
                        <div class="video-wrapper-inner">
                            <video controls poster="<?php echo e(asset('img/video2.png')); ?>">
                                <source src="<?php echo e(asset('video/familiaDe3.mp4')); ?>" type="video/mp4">
                            </video>
                        </div>
                        <div class="video-card-body">
                            <h4 class="video-card-title">Depa de Soltero</h4>
                            <p class="video-descripcion">
                                Ideas y consejos prácticos para organizar tu espacio y reciclar botellas plásticas en departamentos pequeños.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Video 3 -->
                <div class="col">
                    <div class="video-card-eco h-100">
                        <div class="video-wrapper-inner">
                            <video controls poster="<?php echo e(asset('img/video3.png')); ?>">
                                <source src="<?php echo e(asset('video/motivo.mp4')); ?>" type="video/mp4">
                            </video>
                        </div>
                        <div class="video-card-body">
                            <h4 class="video-card-title">Familia de 5</h4>
                            <p class="video-descripcion">
                                Descubre dinámicas y hábitos divertidos para involucrar a todos los miembros de tu hogar en el reciclaje diario.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="seccion-estaciones">
        <div class="container text-center">
            <p class="texto-previo">Y DÉJALOS EN NUESTRAS</p>
            <div class="titulos-estaciones">
                <h2 class="bloque-verde">ESTACIONES</h2>
                <h2 class="bloque-oscuro">DE RECICLAJE</h2>
            </div>
            <div class="contenedor-estacion-img">
                <img src="<?php echo e(asset('img/estaciones.png')); ?>" alt="Estación de Reciclaje" class="img-fluida">
            </div>
        </div>
    </section>

    <section class="contenedor-papel">
        <div class="tarjeta-informativa">
            <div class="encabezado-azul">
                <h2 class="titulo-verde">Papel y Cartón</h2>
            </div>
            <div class="cuerpo-imagen">
                <img src="<?php echo e(asset('img/recicla.png')); ?>" alt="Información sobre reciclaje de papel" class="img-contenido">
            </div>
        </div>
    </section>

    <section class="seccion-listado-sedes py-5">
        <div class="container">
            <div class="text-center mb-5" style="margin-bottom: 3rem !important;">
                <p class="texto-ubica" style="font-size: 24px !important; font-weight: bold; margin-bottom: 15px; letter-spacing: 1px;">UBICA NUESTRAS</p>
                <div class="rc-bloque-negro titulo-estaciones" style="font-size: 42px !important; padding: 12px 30px !important; display: inline-block; line-height: 1.2;">ESTACIONES</div>
                <br>
                <div class="rc-bloque-negro titulo-estaciones" style="font-size: 42px !important; padding: 12px 30px !important; display: inline-block; line-height: 1.2; margin-top: 10px;">DE RECICLAJE</div>
            </div>

            <div class="mb-5" style="border-radius: 15px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                <iframe 
                    id="mapa-sedes"
                    src="https://www.google.com/maps/d/u/0/embed?mid=11gFhwRO_yezrYgC26vrr2TNZLY7I96k&ehbc=2E312F" 
                    width="100%" 
                    height="450" 
                    style="border: 0; display: block;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    $mapaBase = 'https://www.google.com/maps/d/u/0/embed?mid=11gFhwRO_yezrYgC26vrr2TNZLY7I96k&ehbc=2E312F';

                    $sedes = [
                        // Las 6 sedes iniciales (Visibles desde el principio)
                        [
                            'nombre' => 'SEDE MORALES', 
                            'img' => 'estacion1 (1).png',
                            'mapa_url' => $mapaBase . '&ll=-12.0463,-77.0427&z=17',
                            'dir_url' => 'https://www.google.com/maps/search/?api=1&query=-12.0463,-77.0427'
                        ],
                        [
                            'nombre' => 'SEDE FRANCISCO CUELLAR', 
                            'img' => 'estacion1 (2).png',
                            'mapa_url' => $mapaBase . '&ll=-12.0831,-77.0024&z=17',
                            'dir_url' => 'https://www.google.com/maps/search/?api=1&query=-12.0831,-77.0024'
                        ],
                        [
                            'nombre' => 'Av. Sebastián Lorente 610', 
                            'img' => 'estacion1 (3).png',
                            'mapa_url' => $mapaBase . '&ll=-12.0475,-77.0182&z=17',
                            'dir_url' => 'https://www.google.com/maps/search/?api=1&query=Av.+Sebastian+Lorente+610,+Lima'
                        ],
                        [
                            'nombre' => 'SEDE SAN MARTÍN', 
                            'img' => 'estacion1 (4).png',
                            'mapa_url' => $mapaBase . '&ll=-12.0284,-77.0492&z=17',
                            'dir_url' => 'https://www.google.com/maps/search/?api=1&query=-12.0284,-77.0492'
                        ],
                        [
                            'nombre' => 'Av. Enrique Meiggs', 
                            'img' => 'estacion1 (5).png',
                            'mapa_url' => $mapaBase . '&ll=-12.0411,-77.0645&z=17',
                            'dir_url' => 'https://www.google.com/maps/search/?api=1&query=Av.+Enrique+Meiggs,+Lima'
                        ],
                        [
                            'nombre' => 'SEDE CAJA DE AGUA', 
                            'img' => 'estacion1 (6).png',
                            'mapa_url' => $mapaBase . '&ll=-12.0271,-77.0148&z=17',
                            'dir_url' => 'https://www.google.com/maps/search/?api=1&query=-12.0271,-77.0148'
                        ],
                        // Las 3 sedes nuevas (Se ocultarán al inicio)
                        [
                            'nombre' => 'SEDE SAN HILARION', 
                            'img' => 'estacion1 (2).png',
                            'mapa_url' => $mapaBase . '&ll=-11.9982,-77.0021&z=17',
                            'dir_url' => 'https://www.google.com/maps/search/?api=1&query=-11.9982,-77.0021'
                        ],
                        [
                            'nombre' => 'SEDE BAYOVAR', 
                            'img' => 'estacion1 (3).png',
                            'mapa_url' => $mapaBase . '&ll=-11.9754,-76.9932&z=17',
                            'dir_url' => 'https://www.google.com/maps/search/?api=1&query=-11.9754,-76.9932'
                        ],
                        [
                            'nombre' => 'SEDE GRAU', 
                            'img' => 'estacion1 (6).png',
                            'mapa_url' => $mapaBase . '&ll=-12.0545,-77.0253&z=17',
                            'dir_url' => 'https://www.google.com/maps/search/?api=1&query=-12.0545,-77.0253'
                        ],
                    ];
                ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $sedes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $sede): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="col <?php echo e($index >= 6 ? 'sede-nueva d-none' : ''); ?>">
                    <div class="tarjeta-sede btn-cambiar-mapa" data-map-url="<?php echo e($sede['mapa_url']); ?>">
                        <div class="contenedor-img-estacion">
                            <img src="<?php echo e(asset('img/' . $sede['img'])); ?>" alt="<?php echo e($sede['nombre']); ?>">
                        </div>
                        <div class="nombre-sede-bloque">
                            <span><i class="fa-solid fa-location-dot me-2 text-success"></i><?php echo e($sede['nombre']); ?></span>
                        </div>
                        <a href="<?php echo e($sede['dir_url']); ?>" target="_blank" rel="noopener noreferrer" class="btn-como-llegar" onclick="event.stopPropagation();">
                            Cómo llegar <i class="fa-solid fa-location-arrow"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="text-center mt-5">
                <button id="btn-ver-mas" class="btn-carga-mas">CARGA MÁS</button>
            </div>
        </div>
    </section>

    <section class="seccion-impacto">
        <div class="container h-100 d-flex flex-column align-items-center justify-content-center text-center">
            <p class="texto-impacto-superior">Durante el 2025, juntos reciclamos</p>
            <h2 class="cifra-reciclaje">123.456 kg</h2>
        </div>
    </section>

    <section class="seccion-gracias py-5">
        <div class="container text-center">
            <h2 class="titulo-gracias">¡GRACIAS!</h2>
            <p class="texto-apoyo mx-auto">
                Con tu apoyo logramos reducir el consumo de recursos naturales y compensamos al planeta de la siguiente manera,
            </p>

            <div class="row row-cols-2 row-cols-md-5 g-4 justify-content-center mt-5">
                <div class="col">
                    <div class="impacto-item">
                        <div class="circulo-icono"><i class="fas fa-tree"></i></div>
                        <p class="impacto-label">Número de árboles</p>
                        <p class="impacto-valor">655</p>
                    </div>
                </div>
                <div class="col">
                    <div class="impacto-item">
                        <div class="circulo-icono"><i class="fas fa-tint"></i></div>
                        <p class="impacto-label">Agua ahorrada</p>
                        <p class="impacto-valor">1,002 m3</p>
                    </div>
                </div>
                <div class="col">
                    <div class="impacto-item">
                        <div class="circulo-icono"><i class="fas fa-cloud"></i></div>
                        <p class="impacto-label">CO2 no emitido</p>
                        <p class="impacto-valor">+63,308 kg</p>
                    </div>
                </div>
                <div class="col">
                    <div class="impacto-item">
                        <div class="circulo-icono"><i class="fas fa-gas-pump"></i></div>
                        <p class="impacto-label">Petróleo ahorrado</p>
                        <p class="impacto-valor">12,564 lt</p>
                    </div>
                </div>
                <div class="col">
                    <div class="impacto-item">
                        <div class="circulo-icono"><i class="fas fa-bolt"></i></div>
                        <p class="impacto-label">Energía ahorrada</p>
                        <p class="impacto-valor">+499,724 Kwh</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tarjetas = document.querySelectorAll('.btn-cambiar-mapa');
            const elMapa = document.getElementById('mapa-sedes');

            tarjetas.forEach(tarjeta => {
                tarjeta.addEventListener('click', function () {
                    const nuevaUrl = this.getAttribute('data-map-url');
                    if (nuevaUrl && elMapa) {
                        elMapa.src = nuevaUrl;
                        elMapa.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                });
            });


            const btnVerMas = document.getElementById('btn-ver-mas');
            const nuevasSedes = document.querySelectorAll('.sede-nueva');

            if (btnVerMas) {
                btnVerMas.addEventListener('click', function () {
                    nuevasSedes.forEach(sede => {
                        sede.classList.remove('d-none');
                    });
                    this.style.display = 'none';
                });
            }
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Desktop\recicla-web\recicla-web\resources\views/index.blade.php ENDPATH**/ ?>