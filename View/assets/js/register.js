// Validación del formulario de registro. Las reglas deben coincidir con ValidarDatosRegistro() en el controlador.
$(function () {

    // Identificación: letras, números, punto o guion
    $.validator.addMethod('identificacion', function (valor, elemento) {
        return this.optional(elemento) || /^[A-Za-z0-9.-]+$/.test(valor);
    }, 'Use solo letras, números, punto o guion.');

    $('#formRegistro').validate({
        errorClass: 'is-invalid',
        rules: {
            txtNombre: { required: true, maxlength: 100 },
            txtIdentificacion: { required: true, maxlength: 20, identificacion: true },
            txtCorreoElectronico: { required: true, email: true, maxlength: 120 },
            txtContrasenna: { required: true, minlength: 6 },
            txtConfirmacion: { required: true, equalTo: '#txtContrasenna' }
        }
    });

});
