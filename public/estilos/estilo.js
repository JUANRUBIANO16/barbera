document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.agenda-formulario');
    form.addEventListener('submit', function (e) {
        // Obtener valores
        const nombre = form.querySelector('input[placeholder="Tu nombre"]').value.trim();
        const contacto = form.querySelector('input[placeholder="Num contacto"]').value.trim();
        const email = form.querySelector('input[type="email"]').value.trim();
        const servicio = form.querySelector('select').value;

        // Validaciones
        let errores = [];
        if (nombre.length < 3) {
            errores.push('El nombre debe tener al menos 3 caracteres.');
        }
        if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(nombre)) {
            errores.push('El nombre solo puede contener letras y espacios.');
        }
        if (!/^\d{7,}$/.test(contacto)) {
            errores.push('El número de contacto debe ser numérico y tener al menos 7 dígitos.');
        }
        if (!/^[\w\.-]+@[\w\.-]+\.\w{2,}$/.test(email)) {
            errores.push('El correo electrónico no es válido.');
        }
        if (!servicio) {
            errores.push('Selecciona un servicio.');
        }

        // Mostrar errores o enviar
        if (errores.length > 0) {
            alert(errores.join('\n'));
            e.preventDefault();
        }
    });

    // Evitar ingreso de números en nombre (keydown)
    const nombreInput = form.querySelector('input[placeholder="Tu nombre"]');
    nombreInput.addEventListener('keydown', function (e) {
        // Permitir teclas de control, espacio y letras
        if (
            !e.ctrlKey && !e.metaKey && !e.altKey &&
            !(
                (e.key >= 'a' && e.key <= 'z') ||
                (e.key >= 'A' && e.key <= 'Z') ||
                ['á','é','í','ó','ú','Á','É','Í','Ó','Ú','ñ','Ñ',' '].includes(e.key) ||
                e.key === 'Backspace' || e.key === 'Tab' || e.key === 'ArrowLeft' || e.key === 'ArrowRight' || e.key === 'Delete'
            )
        ) {
            e.preventDefault();
        }
    });

    // También limpiar si se pega texto inválido en nombre
    nombreInput.addEventListener('input', function () {
        this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, '');
    });

    // Evitar ingreso de letras en contacto (keydown)
    const contactoInput = form.querySelector('input[placeholder="Num contacto"]');
    contactoInput.addEventListener('keydown', function (e) {
        // Permitir solo números y teclas de control
        if (
            !e.ctrlKey && !e.metaKey && !e.altKey &&
            !(
                (e.key >= '0' && e.key <= '9') ||
                e.key === 'Backspace' || e.key === 'Tab' || e.key === 'ArrowLeft' || e.key === 'ArrowRight' || e.key === 'Delete'
            )
        ) {
            e.preventDefault();
        }
    });

    // También limpiar si se pega texto inválido en contacto
    contactoInput.addEventListener('input', function () {
        this.value = this.value.replace(/[^\d]/g, '');
    });
});

