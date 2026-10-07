// Interacciones del panel principal
$(function () {

    // Pedir confirmación antes de cerrar sesión
    $('#formCerrarSesion').on('submit', function (evento) {
        if (!window.confirm('¿Desea cerrar sesión?')) {
            evento.preventDefault();
        }
    });

});
