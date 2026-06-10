<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Recicla Consciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/ReciclaCasa.css')); ?>">
    <style>
        :root { --v-oscuro: #2d4f32; --f-verde: #f4fcf4; }
        body { 
            background: url("<?php echo e(asset('img/fondoRegistro.png')); ?>") no-repeat center center fixed; 
            background-size: cover;
            height: 100vh; 
            display: flex; 
            align-items: center; 
        }
        .register-card { 
            background: rgba(255, 255, 255, 0.95); 
            border-radius: 40px; 
            padding: 40px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            max-width: 1000px;
            width: 95%;
        }
        .form-label { font-family: 'monospace'; color: #888; margin-bottom: 2px; }
        .form-control { 
            border-radius: 10px; 
            border: 1px solid #ccc; 
            padding: 10px;
            font-size: 0.9rem;
        }
        /* Estilo visual nativo cuando el navegador detecta que un campo es inválido */
        .form-control:invalid:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }
        .btn-crear { 
            background-color: var(--v-oscuro); 
            color: white; 
            border-radius: 10px; 
            padding: 10px 60px; 
            font-weight: bold;
            border: none;
            transition: 0.3s;
        }
        .btn-crear:hover { background-color: #1e3621; transform: scale(1.05); }
        .titulo-registro { color: var(--v-oscuro); font-weight: bold; margin-bottom: 20px; }
        .social-btn { border-radius: 10px; font-size: 0.8rem; padding: 8px 15px; }
        .contenedor-ilustracion-registro {
            width: 85%;
            margin: 0 auto;
        }

        .contenedor-ilustracion-registro img {
            width: 700px;
            height: auto;
            display: block;
            margin-left: -120px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="register-card row align-items-center">
        
        <div class="col-md-7 pe-md-5">
            <h1 class="titulo-registro text-center">Crear Cuenta</h1>
            
            <div class="d-flex justify-content-center gap-2 mb-4">
                <button class="btn btn-outline-secondary social-btn"><img src="https://img.icons8.com/color/16/000000/google-logo.png"/> Sign in with Google</button>
                <button class="btn btn-primary social-btn"><i class="fab fa-facebook-f"></i> Sign in with Facebook</button>
            </div>

            <form action="#" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombres" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$" title="El nombre solo debe contener letras y espacios." required>
                        <div id="nombres-error" class="text-danger small mt-1" style="display: none;"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$" title="El apellido solo debe contener letras y espacios." required>
                        <div id="apellidos-error" class="text-danger small mt-1" style="display: none;"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required>
                        <div id="fecha-error" class="text-danger small mt-1" style="display: none;"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Género</label>
                        <select name="genero" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="O">Otro</option>
                        </select>
                    </div>
                </div>

<div class="mb-3">
    <label class="form-label">Correo electrónico</label>
    <input type="email" 
           id="email"
           name="email" 
           class="form-control" 
           placeholder="ejemplo@gmail.com" 
           pattern="^[a-zA-Z0-9._%+-]+@(gmail|outlook)\.com(\.pe)?$"
           title="Solo se permiten correos de Gmail o Outlook (ej: usuario@gmail.com o usuario@outlook.com)."
           required>
    <div id="email-error" class="text-danger small mt-1" style="display: none;"></div>
</div>
                <div class="mb-3">
                    <label class="form-label">Contraseña nueva</label>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña nueva" required>
                </div>

                <div class="mb-4">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Verificar contraseña" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-crear">Crear</button>
                </div>
            </form>
        </div>

        <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center">
            <div class="contenedor-ilustracion-registro">
                <img src="<?php echo e(asset('img/registrar.png')); ?>" alt="Ilustración Registro">
            </div>
        </div>

    </div>
</div>

<script src="<?php echo e(asset('js/registro.js')); ?>"></script>
<script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH C:\Users\ASUS\Desktop\recicla-web\recicla-web\resources\views/pages/registro.blade.php ENDPATH**/ ?>