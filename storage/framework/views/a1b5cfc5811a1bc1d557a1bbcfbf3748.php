 

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/Style.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <header class="mb-4 text-center">
                <h1 class="titulo-detalle-noticia rc-bloque-negro-noticia text-white" style="font-weight: bold; font-family: 'Agbalumo', cursive;">
                    <?php echo e($noticia->titulo); ?>

                </h1>
                <div class="fecha-detalle text-muted mb-3">
                    <i class="bi bi-calendar-event"></i> 
                    <?php echo e(\Carbon\Carbon::parse($noticia->fecha_publicacion)->translatedFormat('d \d\e F, Y')); ?>

                </div>
            </header>

            <div class="imagen-destacada-contenedor mb-5 text-center">
                <img src="<?php echo e(asset('storage/' . $noticia->imagen_portada)); ?>" 
                     class="img-fluid rounded shadow" 
                     alt="<?php echo e($noticia->titulo); ?>"
                     style="max-height: 500px; width: 100%; object-fit: cover;">
            </div>

            <div class="contenido-noticia-detalle px-md-4">
                <?php echo $noticia->contenido; ?>

            </div>

            <div class="mt-5 text-center">
                <a href="<?php echo e(route('prensa')); ?>" class="btn btn-outline-success rounded-pill px-4">
                    <i class="bi bi-arrow-left"></i> Volver a Prensa
                </a>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Desktop\recicla-web\recicla-web\resources\views/pages/detalle-noticia.blade.php ENDPATH**/ ?>