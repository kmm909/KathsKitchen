// Interacciones de las páginas de acceso: inicio de sesión y recuperación de contraseña
$(function () {

    // Mostrar u ocultar la contraseña
    $('#btnMostrarContrasenna').on('click', function () {
        var $campo = $('#txtContrasenna');
        var mostrar = $campo.attr('type') === 'password';

        $campo.attr('type', mostrar ? 'text' : 'password');
        $('#iconoContrasenna').toggleClass('bi-eye', !mostrar).toggleClass('bi-eye-slash', mostrar);
        $(this).attr('aria-label', mostrar ? 'Ocultar contraseña' : 'Mostrar contraseña');
    });

    // Validación del inicio de sesión. Sin submitHandler, el formulario se envía normal
    // y el servidor recibe el nombre del botón (btnIngresar).
    $('#formLogin').validate({
        errorClass: 'is-invalid',
        rules: {
            txtIdentificacion: { required: true, maxlength: 20 },
            txtContrasenna: { required: true }
        }
    });

    // Validación de la recuperación de acceso
    $('#formRecuperar').validate({
        errorClass: 'is-invalid',
        rules: {
            txtCorreoElectronico: { required: true, email: true, maxlength: 120 }
        }
    });

});
