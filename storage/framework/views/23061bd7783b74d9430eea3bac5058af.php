

<?php $__env->startSection('title', 'Prensa - Recicla Consciente'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/Style.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main>
    <div class="Prensa">
        <img src="<?php echo e(asset('img/decoracion1.png')); ?>" class="planta-colgante p-izq">
        <img src="<?php echo e(asset('img/decoracion1.png')); ?>" class="planta-colgante p-der">

        <div class="container-prensa">
            <h1 class="titulo-inclinado">PRENSA</h1>
            <p>Aquí encontrarás noticias, videos y publicaciones sobre nuestras actividades y avances de Recicla Consciente para seguir impulsando la cultura de reciclaje y motivando a más personas a sumarse al cuidado del planeta.
            Te invitamos a mantenerte al tanto y compartir esta información para seguir sumando más personas al cambio.</p>
        </div>
    </div>

    <div class="Noticias">
        <h1 class="titulo-inclinado">NOTICIAS</h1>
        <p>Accede a nuestras notas de prensa y entérate de nuestras actividades y logros en la industria reciclaje. 
        Puedes leerlas, descargarlas y compartirlas para inspirar a más personas.</p>
        
        <div class="contenedor-noticias">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="noticia-card">
                    <a href="<?php echo e(route('noticia.detalle', $noticia->slug)); ?>">
                        <img src="<?php echo e(asset('storage/' . $noticia->imagen_portada)); ?>" alt="<?php echo e($noticia->titulo); ?>">
                    </a>

                    <div class="cuerpo-card">
                        <h3 ><?php echo e($noticia->titulo); ?></h3>
                        
                        <span class="fecha">
                            📆 <?php echo e(\Carbon\Carbon::parse($noticia->fecha_publicacion)->translatedFormat('F d, Y')); ?>

                        </span>

                        <p><?php echo e($noticia->resumen); ?></p>

                        <a href="<?php echo e(route('noticia.detalle', $noticia->slug)); ?>" class="boton-nota">
                            Leer nota completa aquí
                        </a>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    <div class="Videos text-center">
        <h3 class="rot">RECICLA CONSCIENTE</h3><br>
        <h1>EN ACCIÓN</h1>
        <p>Descubre y comparte nuestros videos sobre reciclaje y las actividades que realizamos junto a nuestros socios y aliados.</p>
        
        <div class="row justify-content-center">
            <div class="video-card col-md-5 m-3">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/18cCEeyGivU" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                <h5>Cómo reciclar correctamente</h5>
                <p>🌎 Descubre qué pasos debes seguir para reciclar de manera correcta y conviértete en un experto del reciclaje ♻️💚</p>
            </div>

            <div class="video-card col-md-5 m-3">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/2uHO8Qn-stE" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                <h5>Lo mejor de Recicla Consciente 2024</h5>
                <p>Revive los mejores momentos de nuestra campaña 2024, junto a socios, aliados, recicladores y comunidades que apuestan por un Perú más consciente. ♻️</p>
            </div>

            <div class="video-card col-md-5 m-3">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/XojzZQub4c8" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                <h5>Limpieza de Playa Márquez 2025</h5>
                <p>El 17 de mayo de 2025, celebramos el Día Mundial del Reciclaje con una limpieza en la Playa Márquez, junto a más de 100 voluntari@s de 26 empresas. ¡Recolectamos más de 5,360 kg de residuos por un futuro más sostenible! 🌊♻️</p>
            </div>

            <div class="video-card col-md-5 m-3">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/qOoNgWltXuk" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                <h5>RC llega al Británico – Concurso Intercentros 2025</h5>
                <p>Del 7 al 19 de julio, el Británico se unió a Recicla Consciente y recolectó más de 4,2 toneladas de materiales reciclables. 💚 Gracias al@s estudiantes, profesor@s y familias que lo hicieron posible.</p>
            </div>
        </div>

    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Desktop\recicla-web\recicla-web\resources\views/pages/prensa.blade.php ENDPATH**/ ?>