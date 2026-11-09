// Interacciones del panel principal
$(function () {
    // Marcar la vista actual en la navegación.
    $('.sidebar-menu-link').each(function () {
        var activo = new URL(this.href).pathname === window.location.pathname;
        $(this).toggleClass('active', activo);
        if (activo) $(this).attr('aria-current', 'page');
    });

    $('#desktop-sidebar-toggle').on('click', function () {
        var minimizado = document.body.classList.toggle('sidebar-minimized');
        $(this).attr('aria-label', minimizado ? 'Mostrar menú' : 'Ocultar menú');
        $(this).find('i').attr('class', minimizado ? 'bi bi-chevron-bar-right' : 'bi bi-chevron-bar-left');
    });

    // Pedir confirmación antes de cerrar sesión
    $('#formCerrarSesion').on('submit', function (evento) {
        if (!window.confirm('¿Desea cerrar sesión?')) {
            evento.preventDefault();
        }
    });

});
