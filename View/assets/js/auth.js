// Interacciones de las páginas de acceso: inicio de sesión y recuperación de contraseña
$(function () {

    // Mostrar u ocultar la contraseña
    $('#btnMostrarContrasenna, #toggle-password').on('click', function () {
        var $campo = $('#txtContrasenna');
        var mostrar = $campo.attr('type') === 'password';

        $campo.attr('type', mostrar ? 'text' : 'password');
        $(this).find('i').toggleClass('bi-eye', !mostrar).toggleClass('bi-eye-slash', mostrar);
        $(this).attr('aria-label', mostrar ? 'Ocultar contraseña' : 'Mostrar contraseña');
    });

});
