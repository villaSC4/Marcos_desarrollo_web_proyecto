<header class="navbar navbar-expand-lg navbar-dark nav-sup">
    <div class="container d-flex align-items-center">
        <nav class="Logo">
            <a href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo Recicla" />
            </a>
        </nav>

        <div class="ms-auto d-flex flex-column align-items-end">
            
            <div class="d-flex align-items-center mb-2">
                <div class="auth-buttons d-flex gap-2 me-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard('colaborador')->check()): ?>
                        <div class="dropdown">
                            <button class="btn-blanco-redondo dropdown-toggle d-flex flex-column align-items-end" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false" style="line-height: 1.2; padding: 5px 20px;">
                                <span class="fw-bold" style="font-size: 0.9rem;"><?php echo e(auth()->guard('colaborador')->user()->nombres); ?></span>
                                <span class="text-success" style="font-size: 0.75rem;">
                                    <i class="bi bi-star-fill"></i> <?php echo e(auth()->guard('colaborador')->user()->puntos_acumulados); ?> pts
                                </span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="userMenu">
                                <li>
                                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2">
                                            <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn-blanco-redondo">Iniciar Sesión</a>
                        <a href="<?php echo e(route('register')); ?>" class="btn-blanco-redondo">Crear Cuenta</a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                
                <div class="bg-white p-1 rounded">
                    <img src="<?php echo e(asset('img/tottus.png')); ?>" alt="Tottus" style="height: 45px; display: block;" />
                </div>
            </div>

            <nav class="collapse navbar-collapse show" id="menu">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->is('/') ? 'activo' : ''); ?>" href="<?php echo e(url('/')); ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('canjes') ? 'activo' : ''); ?>" href="<?php echo e(route('canjes')); ?>">Productos Reciclables</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('recicla.casa') ? 'activo' : ''); ?>" href="<?php echo e(route('recicla.casa')); ?>">Recicla en casa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('socios') ? 'activo' : ''); ?>" href="<?php echo e(route('socios')); ?>">Socios y Aliados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('prensa') ? 'activo' : ''); ?>" href="<?php echo e(route('prensa')); ?>">Prensa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('unete') ? 'activo' : ''); ?>" href="<?php echo e(route('unete')); ?>">Únete</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header><?php /**PATH C:\Users\Usuario\Documents\marcos_web\Marcos_desarrollo_web_proyecto\Marcos_desarrollo_web_proyecto\resources\views/partials/header.blade.php ENDPATH**/ ?>