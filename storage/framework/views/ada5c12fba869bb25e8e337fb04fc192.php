<?php $__env->startSection('title', 'Productos de Canje'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/canjes.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        .etiqueta1, .titulo-productos, .etiqueta2, .titulo3, .descripcion, .nombre-prod, .puntos, .modal-content, .alert {
            font-family: 'Montserrat', sans-serif;
        }

        .modal-back { 
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(15, 23, 42, 0.6); 
            backdrop-filter: blur(6px); 
            z-index: 9999; 
            justify-content: center; 
            align-items: center; 
            transition: all 0.3s ease;
        }

        .modal-content { 
            background: #ffffff; 
            padding: 40px 30px; 
            border-radius: 24px; 
            text-align: center; 
            max-width: 420px; 
            width: 90%; 
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: scale(0.9);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .modal-content h3 {
            color: #1e293b;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .modal-content p {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .modal-content strong {
            color: #0f172a;
            font-weight: 600;
        }

        .contenedor-botones {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .btn-modal { 
            flex: 1;
            padding: 14px 24px; 
            border: none; 
            border-radius: 12px; 
            cursor: pointer; 
            font-weight: 600; 
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .btn-confirmar { 
            background-color: #10b981; 
            color: white; 
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.2);
        }

        .btn-confirmar:hover {
            background-color: #059669;
            transform: translateY(-2px);
        }

        .btn-cancelar { 
            background-color: #f1f5f9;
            color: #64748b; 
        }

        .btn-cancelar:hover {
            background-color: #e2e8f0;
            color: #334155;
            transform: translateY(-2px);
        }

        .producto { 
            cursor: pointer; 
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        .producto:hover { 
            transform: translateY(-8px); 
        }

        /* Alertas estilizadas */
        .alert { 
            padding: 16px; 
            margin: 20px auto; 
            border-radius: 14px; 
            max-width: 600px; 
            text-align: center; 
            font-weight: 600; 
            font-size: 0.95rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .alert-success { background-color: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-error { background-color: #fef2f2; color: #991b1b; border: 1px solid #fca5a5; }
    </style>
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

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
        <div class="alert alert-error"><?php echo e(session('error')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard('colaborador')->check()): ?>
        <div style="text-align: center; margin: 15px 0;">
            <span style="background: #ecfdf5; color: #10b981; padding: 8px 20px; border-radius: 30px; font-weight: 700; font-size: 1.05rem; border: 1px solid #a7f3d0;">
                Tus Puntos: <?php echo e(number_format(auth()->guard('colaborador')->user()->puntos_acumulados, 0, '', '.')); ?> pts
            </span>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

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
                <div class="producto" onclick="abrirModal('<?php echo e($producto->id); ?>', '<?php echo e($producto->nombre); ?>', '<?php echo e($producto->costo_puntos); ?>')">
                    <div class="circulo">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($producto->imagen): ?>
                            <img src="<?php echo e(asset('storage/' . $producto->imagen)); ?>" alt="<?php echo e($producto->nombre); ?>">
                        <?php else: ?>
                            <img src="<?php echo e(asset('img/default-product.jpg')); ?>" alt="<?php echo e($producto->nombre); ?>">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <p class="nombre-prod"><?php echo e($producto->nombre); ?></p>
                    <p class="puntos"><?php echo e(number_format($producto->costo_puntos, 0, '', '.')); ?> puntos</p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </section>
</main>

<div id="modalCanje" class="modal-back">
    <div class="modal-content" id="modalContent">
        <h3>¿Confirmar Canje?</h3>
        <p id="modalMensaje"></p>
        
        <form id="formCanje" method="POST" action="">
            <?php echo csrf_field(); ?>
            <div class="contenedor-botones">
                <button type="button" class="btn-modal btn-cancelar" onclick="cerrarModal()">Cancelar</button>
                <button type="submit" class="btn-modal btn-confirmar">Sí, canjear</button>
            </div>
        </form>
    </div>
</div>

<script>
    function abrirModal(id, nombre, puntos) {
        const estaLogueado = <?php echo json_encode(auth()->guard('colaborador')->check(), 15, 512) ?>;

        if (!estaLogueado) {
            alert("¡Hola! Primero debes iniciar sesión para poder canjear productos.");
            window.location.href = "<?php echo e(route('login')); ?>";
            return;
        }

        const form = document.getElementById('formCanje');
        form.action = `/canjes/${id}`;

        const puntosFormateados = Number(puntos).toLocaleString('de-DE');

        const mensaje = document.getElementById('modalMensaje');
        mensaje.innerHTML = `¿Estás seguro que deseas canjear <strong>${nombre}</strong> por <strong>${puntosFormateados} puntos</strong>?`;

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Desktop\recicla-web\recicla-web\resources\views/pages/canjes.blade.php ENDPATH**/ ?>