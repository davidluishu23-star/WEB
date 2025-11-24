document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.querySelector('.contact-form');

    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const nombre = document.getElementById('nombre').value.trim();
            const email = document.getElementById('email').value.trim();
            const mensaje = document.getElementById('mensaje').value.trim();
            let isValid = true;
            
            // Reset previous error messages
            removeErrorMessages();

            if (nombre === '') {
                showError('nombre', 'Por favor, ingrese su nombre.');
                isValid = false;
            }

            if (email === '') {
                showError('email', 'Por favor, ingrese su correo electrónico.');
                isValid = false;
            } else if (!validarEmail(email)) {
                showError('email', 'Por favor, ingrese un correo electrónico válido.');
                isValid = false;
            }

            if (mensaje === '') {
                showError('mensaje', 'Por favor, ingrese su mensaje.');
                isValid = false;
            }

            if (isValid) {
                // Si todo es válido
                alert('Formulario enviado con éxito.');
                contactForm.reset();
            }
        });
    }

    function validarEmail(email) {
        const re = /^(([^<>()[\\]\\.,;:\\s@\"]+(\\.[^<>()[\\]\\.,;:\\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const error = document.createElement('div');
        error.className = 'error-message';
        error.style.color = 'red';
        error.style.fontSize = '0.9em';
        error.style.marginTop = '5px';
        error.innerText = message;
        field.parentNode.insertBefore(error, field.nextSibling);
    }

    function removeErrorMessages() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(el => el.remove());
    }
});
