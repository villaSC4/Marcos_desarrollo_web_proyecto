<?php $__env->startSection('title', 'Únete al Reciclaje - Recicla Consciente'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/unete.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        .seccion-actividades { font-family: 'Montserrat', sans-serif; max-width: 900px; margin: 50px auto; padding: 0 20px; }
        .titulo-actividades { text-align: center; color: #1e293b; font-weight: 700; margin-bottom: 30px; }
        .grid-actividades { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .card-actividad { background: white; border: 1px solid #e2e8f0; border-radius: 16px; padding: 24px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); display: flex; flex-direction: column; justify-content: space-between; }
        .actividad-nombre { font-size: 1.2rem; font-weight: 700; color: #0f172a; margin: 0 0 10px 0; }
        .actividad-desc { color: #64748b; font-size: 0.9rem; line-height: 1.5; margin-bottom: 15px; }
        .actividad-meta { font-size: 0.85rem; color: #475569; margin-bottom: 8px; font-weight: 600; }
        .actividad-puntos { color: #10b981; font-weight: 700; }
        .btn-participar { background: #10b981; color: white; border: none; padding: 10px 20px; border-radius: 10px; font-weight: 600; cursor: pointer; width: 100%; transition: all 0.2s; text-align: center; text-decoration: none; display: inline-block; margin-top: 15px; }
        .btn-participar:hover { background: #059669; }
        .btn-ya-inscrito { background: #cbd5e1; color: #64748b; cursor: not-allowed; }

        .toast-container {
            position: fixed;
            top: 30px;
            right: 30px;
            z-index: 10000;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast-premium {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-left: 5px solid #10b981; 
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.1), 0 8px 10px -6px rgba(15, 23, 42, 0.05);
            padding: 16px 24px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            min-width: 320px;
            max-width: 420px;
            transform: translateX(120%);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .toast-premium.show {
            transform: translateX(0);
        }

        .toast-premium.toast-error {
            border-left-color: #ef4444;
        }

        .toast-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .toast-icon {
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toast-text {
            color: #334155;
            font-size: 0.95rem;
            font-weight: 600;
            line-height: 1.4;
        }

        .toast-close {
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            transition: color 0.2s;
        }

        .toast-close:hover {
            color: #475569;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<main>
    <div class="toast-container">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="toast-premium" id="toastNotification">
                <div class="toast-content">
                    <span class="toast-icon">🎉</span>
                    <span class="toast-text"><?php echo e(session('success')); ?></span>
                </div>
                <button class="toast-close" onclick="dismissToast()">✕</button>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
            <div class="toast-premium toast-error" id="toastNotification">
                <div class="toast-content">
                    <span class="toast-icon">⚠️</span>
                    <span class="toast-text"><?php echo e(session('error')); ?></span>
                </div>
                <button class="toast-close" onclick="dismissToast()">✕</button>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <section class="seccion-inscripcion">
        <div class="banner-superior-verde">
            <img src="<?php echo e(asset('img/plantadecorativa.webp')); ?>" class="planta-decorativa left" alt="Planta decorativa izquierda"/>
            <img src="<?php echo e(asset('img/plantadecorativa.webp')); ?>" class="planta-decorativa right" alt="Planta decorativa derecha">
            
            <div class="header-sticker">
                <span class="txt-unete">¡ÚNETE</span>
                <h2 class="txt-reciclaje">AL RECICLAJE!</h2>
            </div>

            <div class="container text-center text-white mt-4">
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
            <img src="<?php echo e(asset('img/Persona.webp')); ?>" alt="Persona Limpiando" class="img-persona">
        </section>
    </section>

    <section class="seccion-actividades">
        <h2 class="titulo-actividades">PRÓXIMAS ACTIVIDADES COMUNITARIAS</h2>

        <div class="grid-actividades">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($actividades->isEmpty()): ?>
                <p style="text-align: center; color: #64748b; width: 100%; grid-column: 1/-1;">No hay actividades programadas por el momento. ¡Vuelve pronto!</p>
            <?php else: ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-actividad">
                        <div>
                            <h3 class="actividad-nombre"><?php echo e($actividad->nombre); ?></h3>
                            <p class="actividad-desc"><?php echo e($actividad->descripcion ?? 'Únete a nosotros en esta jornada en favor del medio ambiente.'); ?></p>
                            <p class="actividad-meta">📅 Fecha: <?php echo e(\Carbon\Carbon::parse($actividad->fecha_activity)->format('d/m/Y')); ?></p>
                            <p class="actividad-meta">📍 Lugar: <?php echo e($actividad->direccion ?? 'Por definir'); ?></p>
                            <p class="actividad-meta">⭐ Recompensa: <span class="actividad-puntos">+<?php echo e($actividad->puntos_otorgados); ?> Puntos</span></p>
                        </div>

                        <form method="POST" action="<?php echo e(route('actividades.participar', $actividad->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard('colaborador')->check() && auth()->guard('colaborador')->user()->actividades()->where('actividad_id', $actividad->id)->exists()): ?>
                                <button type="button" class="btn-participar btn-ya-inscrito" disabled>Ya estás inscrito</button>
                            <?php else: ?>
                                <button type="submit" class="btn-participar">Participar</button>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <section class="seccion-aliados py-5">
        <div class="text-center">
            <h2 class="contenedor-titulo-aliados">MUNICIPALIDADES</h2>
            <span class="sticker-aliados">ALIADAS</span>
        </div>

        <div class="grid-logos mt-5">
            <div class="circulo-logo"><img src="<?php echo e(asset('img/MUNILIMA.webp')); ?>" alt="Muni Lima"></div>
            <div class="circulo-logo"><img src="<?php echo e(asset('img/MUNILINCE.webp')); ?>" alt="Muni Lince"></div>
            <div class="circulo-logo"><img src="<?php echo e(asset('img/MUNIRIMAC.webp')); ?>" alt="Muni Rimac"></div>
            <div class="circulo-logo"><img src="<?php echo e(asset('img/MUNISJL.webp')); ?>" alt="Muni SJL"></div>
            <div class="circulo-logo"><img src="<?php echo e(asset('img/MUNIVICTORIA.webp')); ?>" alt="Muni La Victoria"></div>
            <div class="circulo-logo"><img src="<?php echo e(asset('img/SanBorja.webp')); ?>" alt="Muni San Borja"></div>
        </div>
    </section>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toast = document.getElementById('toastNotification');
        if (toast) {
            setTimeout(() => {
                toast.classList.add('show');
            }, 150);

            setTimeout(() => {
                dismissToast();
            }, 4500);
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Desktop\recicla-web\recicla-web\resources\views/pages/unete.blade.php ENDPATH**/ ?>