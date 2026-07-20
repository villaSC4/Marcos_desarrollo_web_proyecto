<?php $__env->startSection('title', 'Recicla en Casa - Tottus'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/ReciclaCasa.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="rc-decoracion">
        <img src="<?php echo e(asset('img/deco1.png')); ?>" alt="decoracion 1" class="deco1" />
        <img src="<?php echo e(asset('img/deco1.png')); ?>" alt="decoracion 2" class="deco2" />
    </div>

    <main class="container py-5 text-center">
        <nav class="mb-5">
            <div class="rc-bloque-negro">RECICLA</div>
            <br />
            <div class="rc-bloque-negro grande">EN CASA</div>
            <p class="mt-3 rc-texto-guia">
                Haz click en cada habitación y aprende cómo reciclar sus envases y/o empaques paso a paso.
            </p>
        </nav>

        <section class="rc-casa-total mx-auto">
            <div class="rc-techo"></div>
            <nav class="rc-cuarto-grid">
                <div class="rc-celda" onclick="abrirPopUp(0)">
                    <img src="<?php echo e(asset('img/baño.webp')); ?>" alt="Baño" />
                    <div class="rc-capa"><h3>Baño</h3></div>
                </div>
                <div class="rc-celda" onclick="abrirPopUp(1)">
                    <img src="<?php echo e(asset('img/cuarto.webp')); ?>" alt="Cuarto" />
                    <div class="rc-capa"><h3>Dormitorio</h3></div>
                </div>
                <div class="rc-celda" onclick="abrirPopUp(2)">
                    <img src="<?php echo e(asset('img/cocina.avif')); ?>" alt="Cocina" />
                    <div class="rc-capa"><h3>Cocina</h3></div>
                </div>
                <div class="rc-celda" onclick="abrirPopUp(3)">
                    <img src="<?php echo e(asset('img/lavanderia.jpg')); ?>" alt="Lavanderia" />
                    <div class="rc-capa"><h3>Lavanderia</h3></div>
                </div>
            </nav>
            <div class="rc-suelo">TOMAR BEBIDAS ALCOHÓLICAS EN EXCESO ES DAÑINO</div>
        </section>

        <div class="rc-decoracion-2">
            <img src="<?php echo e(asset('img/deco2.png')); ?>" alt="decoracion 1" class="deco3" />
            <img src="<?php echo e(asset('img/deco2.png')); ?>" alt="decoracion 2" class="deco4" />
        </div>

        <section id="overlay" class="rc-overlay-centrado">
            <nav class="rc-cuadrante-info">
                <button class="rc-cerrar-x" onclick="cerrarPopUp()">&times;</button>
                <button class="rc-flecha-nav ant" onclick="navegar(-1)">&#10094;</button>
                <button class="rc-flecha-nav sig" onclick="navegar(1)">&#10095;</button>
                <div id="contenido-dinamico"></div>
            </nav>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/ReciclaCasa.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Usuario\Documents\marcos_web\Marcos_desarrollo_web_proyecto\Marcos_desarrollo_web_proyecto\resources\views/pages/recicla-casa.blade.php ENDPATH**/ ?>