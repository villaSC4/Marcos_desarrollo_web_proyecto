<?php $__env->startSection('title', 'Prensa - Recicla Consciente'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/prensa.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php
    if (!function_exists('obtenerCategoria')) {
        function obtenerCategoria($titulo) {
            $titulo = mb_strtolower($titulo);
            if (Str::contains($titulo, ['playa', 'limpieza', 'campaña', 'día', 'voluntario', 'concurso', 'evento', 'talleres'])) {
                return 'Eventos';
            }
            if (Str::contains($titulo, ['alianza', 'convenio', 'socio', 'aliado', 'británico', 'unió', 'tottus', 'plaza vea', 'municipalidad', 'llegará', 'llega'])) {
                return 'Alianzas';
            }
            if (Str::contains($titulo, ['comunicado', 'declaración', 'oficial', 'lanzamiento', 'anuncio'])) {
                return 'Comunicados';
            }
            return 'Noticias';
        }
    }
?>

<main>
    <div class="prensa-hero py-5 text-center position-relative">
        <img src="<?php echo e(asset('img/decoracion1.png')); ?>" alt="Planta decorativa" class="planta-decorativa-hero planta-left">
        <img src="<?php echo e(asset('img/decoracion1.png')); ?>" alt="Planta decorativa" class="planta-decorativa-hero planta-right">

        <div class="container py-4 position-relative z-2">
            <div class="etiquetas-container mb-3">
                <span class="tag-prensa-sub">SALA DE</span>
                <br>
                <span class="tag-prensa-title shadow">PRENSA Y NOTICIAS</span>
            </div>
            <p class="mt-4 text-muted mx-auto" style="max-width: 800px; font-size: 1.15rem; line-height: 1.6;">
                Encuentra noticias, comunicados, videos y publicaciones sobre nuestras actividades y avances de <strong>Recicla Consciente</strong> para seguir impulsando la cultura de reciclaje y motivando a más personas al cuidado de nuestro planeta.
            </p>
            
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 col-lg-5 mb-4">
                    <div class="input-group shadow-sm rounded-pill overflow-hidden bg-white border p-1">
                        <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input id="search-news-input" type="text" class="form-control border-0 px-2 py-2" placeholder="Buscar noticias..." aria-label="Buscar noticias">
                        <button id="search-news-btn" class="btn btn-eco-primary rounded-pill px-4" type="button">Buscar</button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="filter-pills-container">
                        <span class="filter-pill active" data-filter="all">Todos</span>
                        <span class="filter-pill" data-filter="Noticias">Noticias</span>
                        <span class="filter-pill" data-filter="Eventos">Eventos</span>
                        <span class="filter-pill" data-filter="Comunicados">Comunicados</span>
                        <span class="filter-pill" data-filter="Alianzas">Alianzas</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($noticias->isEmpty()): ?>
            <div class="text-center py-5">
                <i class="fa-regular fa-folder-open text-muted display-1 mb-3"></i>
                <h4 class="text-muted fw-bold">No se encontraron noticias publicadas</h4>
                <p class="text-muted small">Regresa más tarde para mantenerte informado.</p>
            </div>
        <?php else: ?>
            <?php
                $destacada = $noticias->first();
                $restantes = $noticias->slice(1);
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($destacada): ?>
                <?php $catDestacada = obtenerCategoria($destacada->titulo); ?>
                <div class="mb-5 featured-card-wrapper" data-category="<?php echo e($catDestacada); ?>">
                    <div class="featured-card">
                        <div class="row g-0">
                            <div class="col-lg-7">
                                <div class="featured-img-wrapper">
                                    <a href="<?php echo e(route('noticia.detalle', $destacada->slug)); ?>">
                                        <img src="<?php echo e(asset('storage/' . $destacada->imagen_portada)); ?>" alt="<?php echo e($destacada->titulo); ?>" class="featured-img">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="featured-body">
                                    <span class="badge-eco <?php echo e($catDestacada === 'Eventos' ? 'badge-eventos' : ($catDestacada === 'Alianzas' ? 'badge-alianzas' : ($catDestacada === 'Comunicados' ? 'badge-comunicados' : ''))); ?> mb-3">
                                        <?php echo e($catDestacada); ?>

                                    </span>
                                    <div class="featured-meta mb-3">
                                        <i class="fa-regular fa-calendar-days me-1 text-success"></i> 
                                        <?php echo e(\Carbon\Carbon::parse($destacada->fecha_publicacion)->translatedFormat('d \d\e F, Y')); ?>

                                    </div>
                                    <h2 class="featured-title mb-3">
                                        <a href="<?php echo e(route('noticia.detalle', $destacada->slug)); ?>"><?php echo e($destacada->titulo); ?></a>
                                    </h2>
                                    <p class="featured-excerpt mb-4">
                                        <?php echo e($destacada->resumen); ?>

                                    </p>
                                    <a href="<?php echo e(route('noticia.detalle', $destacada->slug)); ?>" class="btn btn-eco-primary align-self-start">
                                        Leer Nota Completa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($restantes->isNotEmpty()): ?>
                <div class="my-5">
                    <div class="d-flex align-items-center mb-4 pb-2 border-bottom">
                        <div class="bg-primary-green text-white rounded-circle p-2 d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; background-color: #2D4F32;">
                            <i class="fa-solid fa-newspaper fs-5"></i>
                        </div>
                        <div>
                            <h3 class="mb-0 fw-bold" style="color: #2D4F32; font-family: 'Montserrat', sans-serif; font-size: 1.35rem;">MÁS NOTICIAS</h3>
                            <p class="text-muted mb-0 small">Explora nuestro historial de actividades y logros ambientales.</p>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $restantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $cat = obtenerCategoria($noticia->titulo); ?>
                            <div class="col news-card-wrapper" data-category="<?php echo e($cat); ?>">
                                <article class="card h-100 news-card border-0">
                                    <div class="news-img-wrapper">
                                        <a href="<?php echo e(route('noticia.detalle', $noticia->slug)); ?>">
                                            <img src="<?php echo e(asset('storage/' . $noticia->imagen_portada)); ?>" alt="<?php echo e($noticia->titulo); ?>" class="news-img">
                                        </a>
                                    </div>
                                    <div class="news-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="badge-eco <?php echo e($cat === 'Eventos' ? 'badge-eventos' : ($cat === 'Alianzas' ? 'badge-alianzas' : ($cat === 'Comunicados' ? 'badge-comunicados' : ''))); ?>">
                                                <?php echo e($cat); ?>

                                            </span>
                                            <span class="text-muted small fw-semibold">
                                                <?php echo e(\Carbon\Carbon::parse($noticia->fecha_publicacion)->translatedFormat('d M, Y')); ?>

                                            </span>
                                        </div>
                                        <h5 class="news-title">
                                            <a href="<?php echo e(route('noticia.detalle', $noticia->slug)); ?>"><?php echo e($noticia->titulo); ?></a>
                                        </h5>
                                        <p class="news-excerpt text-muted small">
                                            <?php echo e(Str::limit($noticia->resumen, 130)); ?>

                                        </p>
                                        <a href="<?php echo e(route('noticia.detalle', $noticia->slug)); ?>" class="btn-read-more mt-auto">
                                            Leer nota completa <i class="fa-solid fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div id="no-results-message" style="display: none; transition: opacity 0.3s ease; opacity: 0;" class="text-center py-5">
                <i class="fa-solid fa-filter-circle-xmark text-muted display-3 mb-3"></i>
                <h5 class="text-muted fw-bold">No se encontraron artículos</h5>
                <p class="text-muted small">No coinciden resultados con los filtros aplicados. ¡Prueba otra búsqueda!</p>
            </div>

            <div id="pagination-wrapper" class="d-flex justify-content-center mt-5">
                <nav aria-label="Paginación de noticias">
                    <ul class="pagination pagination-eco">
                        <li class="page-item disabled"><span class="page-link">Anterior</span></li>
                        <li class="page-item active"><span class="page-link">1</span></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                    </ul>
                </nav>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <section class="section-videos-prensa text-center">
        <div class="container position-relative z-2">
            <div class="mb-5">
                <div class="tag-video-section shadow">EN ACCIÓN</div>
                <h2 class="text-dark fw-bold mt-4" style="font-size: 2.2rem; letter-spacing: -0.5px; color: var(--color-primary-green) !important;">RECICLA CONSCIENTE</h2>
                <p class="text-muted mx-auto" style="max-width: 600px; font-size: 1.05rem;">
                    Descubre y comparte nuestros videos de concientización y las actividades que realizamos junto a nuestros socios y aliados estratégicos.
                </p>
            </div>
            
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-5 text-start">
                    <div class="video-card-premium d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="video-iframe-container">
                                <iframe src="https://www.youtube.com/embed/18cCEeyGivU" title="Cómo reciclar correctamente" allowfullscreen></iframe>
                            </div>
                            <h5 class="video-premium-title">Cómo reciclar correctamente</h5>
                        </div>
                        <p class="video-premium-text mt-2 mb-0">🌎 Descubre qué pasos debes seguir para reciclar de manera correcta y conviértete en un experto del reciclaje ♻️💚</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 text-start">
                    <div class="video-card-premium d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="video-iframe-container">
                                <iframe src="https://www.youtube.com/embed/2uHO8Qn-stE" title="Lo mejor de Recicla Consciente 2024" allowfullscreen></iframe>
                            </div>
                            <h5 class="video-premium-title">Lo mejor de Recicla Consciente 2024</h5>
                        </div>
                        <p class="video-premium-text mt-2 mb-0">Revive los mejores momentos de nuestra campaña 2024, junto a socios, aliados, recicladores y comunidades que apuestan por un Perú más consciente. ♻️</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 text-start">
                    <div class="video-card-premium d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="video-iframe-container">
                                <iframe src="https://www.youtube.com/embed/XojzZQub4c8" title="Limpieza de Playa Márquez 2025" allowfullscreen></iframe>
                            </div>
                            <h5 class="video-premium-title">Limpieza de Playa Márquez 2025</h5>
                        </div>
                        <p class="video-premium-text mt-2 mb-0">El 17 de mayo de 2025, celebramos el Día Mundial del Reciclaje con una limpieza en la Playa Márquez, junto a más de 100 voluntari@s de 26 empresas. ¡Recolectamos más de 5,360 kg de residuos por un futuro más sostenible! 🌊♻️</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 text-start">
                    <div class="video-card-premium d-flex flex-column justify-content-between h-100">
                        <div>
                            <div class="video-iframe-container">
                                <iframe src="https://www.youtube.com/embed/qOoNgWltXuk" title="RC llega al Británico – Concurso Intercentros 2025" allowfullscreen></iframe>
                            </div>
                            <h5 class="video-premium-title">RC llega al Británico – Concurso 2025</h5>
                        </div>
                        <p class="video-premium-text mt-2 mb-0">Del 7 al 19 de julio, el Británico se unió a Recicla Consciente y recolectó más de 4,2 toneladas de materiales reciclables. 💚 Gracias al@s estudiantes, profesor@s y familias que lo hicieron posible.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pills = document.querySelectorAll('.filter-pill');
        const cards = document.querySelectorAll('.news-card-wrapper');
        const featuredCard = document.querySelector('.featured-card-wrapper');
        const noResults = document.getElementById('no-results-message');
        const pagination = document.getElementById('pagination-wrapper');
        
        const searchInput = document.getElementById('search-news-input');
        const searchBtn = document.getElementById('search-news-btn');

        function applyFilters() {
            const activePill = document.querySelector('.filter-pill.active');
            const activeFilter = activePill ? activePill.getAttribute('data-filter') : 'all';
            const searchQuery = searchInput.value.toLowerCase().trim();

            let visibleCount = 0;

            function checkAndAnimateCard(card, category, title, body) {
                const matchesCategory = (activeFilter === 'all' || category === activeFilter);
                const matchesSearch = (searchQuery === '' || 
                                       title.toLowerCase().includes(searchQuery) || 
                                       body.toLowerCase().includes(searchQuery));

                if (matchesCategory && matchesSearch) {
                    card.style.display = 'block';
                    setTimeout(() => { 
                        card.style.opacity = '1'; 
                        card.style.transform = 'scale(1)';
                    }, 10);
                    return true;
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => { card.style.display = 'none'; }, 300);
                    return false;
                }
            }

            if (featuredCard) {
                const featuredCat = featuredCard.getAttribute('data-category');
                const featuredTitle = featuredCard.querySelector('.featured-title').innerText;
                const featuredDesc = featuredCard.querySelector('.featured-excerpt').innerText;
                
                if (checkAndAnimateCard(featuredCard, featuredCat, featuredTitle, featuredDesc)) {
                    visibleCount++;
                }
            }

            cards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                const cardTitle = card.querySelector('.news-title').innerText;
                const cardDesc = card.querySelector('.news-excerpt').innerText;

                if (checkAndAnimateCard(card, cardCat, cardTitle, cardDesc)) {
                    visibleCount++;
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

            if (pagination) {
                if (visibleCount === 0) {
                    pagination.style.display = 'none';
                } else {
                    pagination.style.display = 'flex';
                }
            }
        }

        pills.forEach(pill => {
            pill.addEventListener('click', function () {
                pills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                applyFilters();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', applyFilters);
            
            searchInput.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    applyFilters();
                }
            });
        }

        if (searchBtn) {
            searchBtn.addEventListener('click', applyFilters);
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Desktop\recicla-web\recicla-web\resources\views/pages/prensa.blade.php ENDPATH**/ ?>