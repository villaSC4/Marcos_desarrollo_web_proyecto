<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - EcoSeguro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/ReciclaCasa.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
</head>
<body>

<section class="container d-flex justify-content-center">
    <div class="login-card row g-0">
        <div class="col-md-6 left-panel d-none d-md-flex">
            <img src="<?php echo e(asset('img/image 209.png')); ?>" alt="Eco Lock">
        </div>

        <div class="col-md-6 form-panel">
            <h2 class="text-center mb-4" style="color: var(--dark-green); font-family: 'Alfa Slab One', cursive;">Iniciar Sesión</h2>
            
            <form action="<?php echo e(route('login.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                
                <div class="mb-4">
                    <label class="form-label small fw-bold">Correo Electrónico</label>
                    <div class="custom-input-group">
                        <i class="bi bi-envelope"></i>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="ejemplo@correo.com" required autofocus>
                    </div>
                </div>

                <div class="mb-1">
                    <label class="form-label small fw-bold">Contraseña</label>
                    <div class="custom-input-group">
                        <i class="bi bi-lock"></i>
                        <input type="password" name="password" id="password" placeholder="••••••••" required>
                        <i class="bi bi-eye ms-auto" style="cursor: pointer;" onclick="togglePassword()"></i>
                    </div>
                </div>
                
                <div class="text-end mb-4">
                    <a href="#" class="text-muted small text-decoration-none">¿Olvidaste tu Contraseña?</a>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                    <div class="alert alert-danger py-2 mb-4" style="font-size: 0.85rem;">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?php echo e($errors->first()); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <button type="submit" class="btn btn-ingresar mb-4 w-100">Ingresar</button>

                <div class="text-center position-relative mb-4">
                    <hr>
                    <span class="bg-white px-2 small text-muted" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">O continúa con</span>
                </div>

                <div class="text-center mb-4">
                    <a href="#" class="btn border shadow-sm mx-1"><i class="bi bi-google text-danger"></i></a>
                    <a href="#" class="btn border shadow-sm mx-1"><i class="bi bi-facebook text-primary"></i></a>
                </div>

                <div class="text-center small">
                    ¿No tienes cuenta? <a href="<?php echo e(route('register')); ?>" class="text-success fw-bold text-decoration-none">Regístrate</a>
                </div>
            </form>
        </div> 
    </div>
</section>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\ASUS\Desktop\recicla-web\recicla-web\resources\views/pages/login.blade.php ENDPATH**/ ?>