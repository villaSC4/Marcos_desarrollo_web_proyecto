document.addEventListener("DOMContentLoaded", function() {
    const nombresInput = document.getElementById('nombres');
    const nombresError = document.getElementById('nombres-error');
    
    const apellidosInput = document.getElementById('apellidos');
    const apellidosError = document.getElementById('apellidos-error');
    
    const fechaInput = document.getElementById('fecha_nacimiento');
    const fechaError = document.getElementById('fecha-error');
    
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('email-error');

    nombresInput.addEventListener('input', function() {
        nombresInput.value = nombresInput.value.replace(/[0-9]/g, '');
        
        if (nombresInput.validity.patternMismatch) {
            nombresError.textContent = "El nombre no puede contener números ni caracteres especiales.";
            nombresError.style.display = "block";
        } else {
            nombresError.style.display = "none";
        }
    });


    apellidosInput.addEventListener('input', function() {
        apellidosInput.value = apellidosInput.value.replace(/[0-9]/g, '');
        
        if (apellidosInput.validity.patternMismatch) {
            apellidosError.textContent = "El apellido no puede contener números ni caracteres especiales.";
            apellidosError.style.display = "block";
        } else {
            apellidosError.style.display = "none";
        }
    });


    fechaInput.addEventListener('change', function() {
        const fechaNacimiento = new Date(fechaInput.value);
        const fechaActual = new Date();

        if (isNaN(fechaNacimiento.getTime())) return;


        let edad = fechaActual.getFullYear() - fechaNacimiento.getFullYear();
        const diferenciaMeses = fechaActual.getMonth() - fechaNacimiento.getMonth();
        const diferenciaDias = fechaActual.getDate() - fechaNacimiento.getDate();

        if (diferenciaMeses < 0 || (diferenciaMeses === 0 && diferenciaDias < 0)) {
            edad--;
        }

        if (edad < 18) {
            fechaError.textContent = `Debes ser mayor de edad para registrarte (Tienes ${edad} años).`;
            fechaError.style.display = "block";
            fechaInput.setCustomValidity("Debes ser mayor de 18 años.");
        } else if (fechaNacimiento.getFullYear() < 1900 || fechaNacimiento > fechaActual) {
            fechaError.textContent = "Por favor, ingresa una fecha de nacimiento coherente.";
            fechaError.style.display = "block";
            fechaInput.setCustomValidity("Fecha inválida.");
        } else {
            fechaError.style.display = "none";
            fechaInput.setCustomValidity(""); 
        }
    });

    emailInput.addEventListener('input', function() {
        const email = emailInput.value;
        const arrobas = (email.match(/@/g) || []).length;


        const reglaEstricta = /^[a-zA-Z0-9._%+-]+@(gmail|outlook)\.com(\.pe)?$/;

        if (arrobas > 1) {
            emailError.textContent = "El correo no puede tener más de una '@'.";
            emailError.style.display = "block";
            emailInput.setCustomValidity("Más de una arroba.");
        } else if (arrobas === 0 && email.length > 0) {
            emailError.textContent = "El correo debe incluir una '@'.";
            emailError.style.display = "block";
            emailInput.setCustomValidity("Falta la arroba.");
        } else if (email.length > 0 && !reglaEstricta.test(email)) {
            emailError.textContent = "Solo se permiten cuentas de @gmail.com o @outlook.com";
            emailError.style.display = "block";
            emailInput.setCustomValidity("Dominio no permitido.");
        } else {
            emailError.style.display = "none";
            emailInput.setCustomValidity("");
        }
    });
});