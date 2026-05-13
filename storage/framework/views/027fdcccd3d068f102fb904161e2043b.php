

<?php $__env->startSection('title', 'Socios y Aliados - Recicla Consciente'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/StyleSocios.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main class="text-center py-5">
    <h1 class="etiqueta1">CONOCE A NUESTROS </h1>

    <h2 class="etiqueta2"><span>SOCIOS Y ALIADOS</span></h2>
    
    <div class="mt-5">
        <h2 class="titulo3">SOCIOS</h2>
        <section class="Socios">
            <div class="Socio">
                <img src="<?php echo e(asset('img/Socios1.png')); ?>" alt="Socio 1">
            </div>
        </section>
    </div>
    
    <div class="mt-5">
        <h2 class="titulo3">ALIADOS</h2>
        <section class="Socios">
            <div class="Socio">
                <img src="<?php echo e(asset('img/Socios2.png')); ?>" alt="Aliado 1">
            </div>
        </section>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Desktop\recicla-web\recicla-web\resources\views/pages/socios.blade.php ENDPATH**/ ?>