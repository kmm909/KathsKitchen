<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Model/InicioModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Model/PersonalModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/ConfigController.php';

if(isset($_POST['btnCambiarContrasenna'])) {
    $contrasennaActual = $_POST['txtContrasenaActual'];
    $contrasennaNueva = $_POST['txtContrasenaNueva'];
    $consecutivoUsuario = $_SESSION['ConsecutivoUsuario'];

    $response = ActualizarContrasennaModel($consecutivoUsuario,$contrasennaNueva,$contrasennaActual);

    if($response) {
        $correoEnviado = false;
        try {
            $fechaCambio = new DateTime('now', new DateTimeZone('America/Costa_Rica'));
            $plantilla = CargarPlantillaCorreo('CambioAcceso.html', [
                '{{FECHAHORA}}' => $fechaCambio->format('Y-m-d H:i:s'),
                '{{NOMBRE}}' => $_SESSION['NombreUsuario']
            ]);
            $correoEnviado = EnviarCorreoElectronico('Cambio de Acceso', $plantilla, $_SESSION['CorreoElectronico']);
        } catch (Throwable $exc) {
            RegistrarFalloCorreo($exc, 'NotificarCambioAcceso');
        }

        $_POST['mensajePassword'] = $correoEnviado
            ? 'Su contraseña se ha actualizado correctamente y se envió la notificación por correo.'
            : 'Su contraseña se actualizó, pero no se pudo enviar la notificación. Puede iniciar sesión con su nueva contraseña.';
    }
    else {
        $_POST["mensajePassword"] = "Su contraseña no se ha podido actualizar correctamente, verifique sus datos";
    }
}

function ConsultarUsuario()
{
    $consecutivoUsuario = $_SESSION['ConsecutivoUsuario'];
    return ConsultarUsuarioModel($consecutivoUsuario);
}

if(isset($_POST['btnCambiarDatosCuenta'])) {
    $identificacion = $_POST['txtIdentificacion'];
    $nombre = $_POST['txtNombre'];
    $correoElectronico = $_POST['txtCorreoElectronico'];
    $consecutivoUsuario = $_SESSION['ConsecutivoUsuario'];

    $response = ActualizarDatosCuentaModel($consecutivoUsuario, $identificacion, $nombre, $correoElectronico);

    if($response) {
        $_SESSION['NombreUsuario'] = $nombre;
        $_SESSION['CorreoElectronico'] = $correoElectronico;

        $_POST["mensajeDatosCuenta"] = "Su información se ha actualizado correctamente";
    }
    else {
        $_POST["mensajeDatosCuenta"] = "Su información no se ha podido actualizar correctamente, verifique sus datos";
    }
}
