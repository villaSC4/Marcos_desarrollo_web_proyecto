

<?php $__env->startSection('title', 'Productos de Canje'); ?>

<?php $__env->startPush('styles'); ?>
    
    <link rel="stylesheet" href="<?php echo e(asset('css/canjes.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main>
    
    <div class="decoracion">
        <img src="<?php echo e(asset('img/decoracion1.png')); ?>" class="esquina arriba-izquierda">
        <img src="<?php echo e(asset('img/decoracion1.png')); ?>" class="esquina arriba-derecha">
        <img src="<?php echo e(asset('img/decoracion2.png')); ?>" class="esquina abajo-izquierda">
        <img src="<?php echo e(asset('img/decoracion2.png')); ?>" class="esquina abajo-derecha">
    </div>

    <h1 class="etiqueta1">¡NUEVO!</h1>
    <h2 class="titulo-productos">CONOCE LOS</h2>
    <h3 class="etiqueta2">PRODUCTOS</h3>
    <h4 class="titulo3">A CANJEAR</h4>

    <p class="descripcion">
        Los usuarios podrán acumular puntos cada vez que reciclen productos en los puntos de reciclaje registrados.
        Estos puntos podrán ser canjeados por diferentes productos y beneficios ofrecidos por las empresas aliadas.
    </p>

    <section class="productos">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($productos->isEmpty()): ?>
            
            <p class="descripcion" style="text-align: center; grid-column: 1 / -1; width: 100%;">
                Próximamente se añadirán nuevos productos para canje. ¡Sigue reciclando!
            </p>
        <?php else: ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="producto">
                    <div class="circulo">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($producto->imagen): ?>
                            
                            <img src="<?php echo e(asset('storage/' . $producto->imagen)); ?>" alt="<?php echo e($producto->nombre); ?>">
                        <?php else: ?>
                            
                            <img src="<?php echo e(asset('img/default-product.jpg')); ?>" alt="<?php echo e($producto->nombre); ?>">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <p class="nombre-prod"><?php echo e($producto->nombre); ?></p>
                    <p class="puntos"><?php echo e($producto->costo_puntos); ?> puntos</p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Desktop\recicla-web\recicla-web\resources\views/pages/canjes.blade.php ENDPATH**/ ?>