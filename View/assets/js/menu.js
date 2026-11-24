$(document).ready(function () {
    $.validator.addMethod('enteroPositivo', function (value, element) {
        return this.optional(element) || /^[1-9]\d*$/.test(value);
    }, 'Ingrese un número entero mayor a 0');

    $.validator.addMethod('decimalPositivo', function (value, element) {
        return this.optional(element) || (/^\d+(\.\d{1,2})?$/.test(value) && parseFloat(value) > 0);
    }, 'Ingrese un precio mayor a 0 (máximo 2 decimales)');

    $('#txtPorciones').on('input', function () {
        this.value = this.value.replace(/\D/g, '');
    });

    $('#txtPrecio').on('input', function () {
        let valor = this.value.replace(/[^\d.]/g, '');
        const punto = valor.indexOf('.');
        if (punto !== -1) {
            valor = valor.substring(0, punto + 1) + valor.substring(punto + 1).replace(/\./g, '').substring(0, 2);
        }
        this.value = valor;
    });

    if ($('#tablaPrincipal').length && $.fn.DataTable) {
        $('#tablaPrincipal').DataTable({
            responsive: true,
            pageLength: 10,
            processing: true,
            language: { url: '../assets/json/datatables-es.json' },
            columnDefs: [{ targets: [6], orderable: false, searchable: false }]
        });
    }

    $('#platoForm').validate({
        rules: {
            txtNombre: { required: true, maxlength: 150 },
            txtPorciones: { required: true, enteroPositivo: true, max: 100000 },
            txtPrecio: { required: true, decimalPositivo: true, max: 99999999.99 },
            txtDescripcion: { required: true, maxlength: 500 },
            txtImagen: { required: true, maxlength: 500 }
        },
        messages: {
            txtNombre: { required: 'El nombre del platillo es obligatorio' },
            txtPorciones: { required: 'Indique las porciones', enteroPositivo: 'Ingrese un número entero mayor a 0', max: 'Ingrese hasta 100000 porciones' },
            txtPrecio: { required: 'El precio es obligatorio', decimalPositivo: 'Ingrese un precio mayor a 0 (máximo 2 decimales)' },
            txtDescripcion: { required: 'La descripción es obligatoria' },
            txtImagen: { required: 'La imagen del plato es obligatoria' }
        },
        errorElement: 'div',
        errorClass: 'login-error-message',
        errorPlacement: function (error, element) { error.insertAfter(element.closest('.login-input-group')); },
        highlight: function (element) { $(element).addClass('login-input-invalid'); },
        unhighlight: function (element) { $(element).removeClass('login-input-invalid'); }
    });

    $('#imgVistaPrevia')
        .on('load', function () {
            if ($('#txtImagen').val().trim() === '') return;
            $(this).removeClass('d-none');
            $('#sinVistaPrevia').addClass('d-none');
        })
        .on('error', function () {
            if ($('#txtImagen').val().trim() !== '') {
                MostrarMensajeVistaPrevia('No se pudo cargar la imagen de la dirección indicada');
            }
        });

    $('#txtImagen').on('input change', function () {
        const url = $(this).val().trim();
        if (url === '') {
            $('#imgVistaPrevia').removeAttr('src');
            MostrarMensajeVistaPrevia('Ingrese la dirección de la imagen para visualizarla');
            return;
        }
        if (!/^https?:\/\//i.test(url) && !/^\.\.\/assets\/images\/[a-zA-Z0-9_./-]+$/.test(url)) {
            $('#imgVistaPrevia').removeAttr('src');
            MostrarMensajeVistaPrevia('Utilice una URL http(s) o una ruta de ../assets/images/');
            return;
        }
        MostrarMensajeVistaPrevia('Cargando vista previa…');
        $('#imgVistaPrevia').attr('src', url);
        // Una imagen en caché puede estar completa sin emitir un nuevo evento load.
        const imagen = $('#imgVistaPrevia')[0];
        if (imagen && imagen.complete && imagen.naturalWidth > 0) {
            $('#imgVistaPrevia').trigger('load');
        }
    }).trigger('change');
});

function MostrarMensajeVistaPrevia(mensaje) {
    $('#imgVistaPrevia').addClass('d-none');
    $('#sinVistaPrevia small').text(mensaje);
    $('#sinVistaPrevia').removeClass('d-none');
}

$(document).on('click', '.btn-inactivar', function () {
    const boton = $(this);
    const platoId = boton.data('id');
    Swal.fire({
        text: '¿Deseas cambiar la disponibilidad de este platillo?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3b493c',
        cancelButtonColor: '#85776a',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
    }).then(function (result) {
        if (!result.isConfirmed) return;
        boton.prop('disabled', true);
        $.ajax({
            url: '../../Controller/MenuController.php',
            type: 'POST',
            dataType: 'json',
            data: {
                platoId: platoId,
                action: 'btnInactivarPlato',
                tokenMenu: $('#tablaPrincipal').attr('data-token')
            },
            success: function (response) {
                Swal.fire({
                    text: response.mensaje,
                    icon: response.success ? 'success' : 'error',
                    confirmButtonColor: '#3b493c',
                    confirmButtonText: 'Aceptar'
                }).then(function () { if (response.success) location.reload(); });
            },
            error: function (xhr) {
                Swal.fire({
                    text: xhr.responseJSON && xhr.responseJSON.mensaje ? xhr.responseJSON.mensaje : 'No se pudo completar la solicitud. Intente nuevamente.',
                    icon: 'error',
                    confirmButtonColor: '#3b493c'
                });
            },
            complete: function () { boton.prop('disabled', false); }
        });
    });
});
