<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Model/InicioModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/ConfigController.php';

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['btnRegistro'])) {
    $identificacion = $_POST['txtIdentificacion'];
    $nombre = $_POST['txtNombre'];
    $correoElectronico = $_POST['txtCorreoElectronico'];
    $contrasenna = $_POST['txtContrasenna'];

    $response = RegistroModel($identificacion,$nombre,$correoElectronico,$contrasenna);

    if($response) {
        header("Location: ../../View/Inicio/login.php");
        exit();
    }

    $_POST["mensaje"] = "Su información no se ha podido registrar correctamente";
}

if(isset($_POST['btnInicioSesion'])) {
    $identificacion = $_POST['txtIdentificacion'];
    $contrasenna = $_POST['txtContrasenna'];

    $response = InicioSesionModel($identificacion,$contrasenna);

    if($response) {
        $_SESSION['NombreUsuario'] = $response['Nombre'];
        $_SESSION['NombreRol'] = $response['NombreRol'];
        $_SESSION['ConsecutivoRol'] = $response['ConsecutivoRol'];
        $_SESSION['ConsecutivoUsuario'] = $response['Consecutivo'];
        $_SESSION['CorreoElectronico'] = $response['CorreoElectronico'];

        header("Location: ../../View/Inicio/home.php");
        exit();
    }

    $_POST["mensaje"] = "Su información no se ha podido validar correctamente";
}

if(isset($_POST['btnRecuperarContrasenna'])) {
    $identificacion = $_POST['txtIdentificacion'];

    $response = ConsultarIdentificacionModel($identificacion);

    if($response) {
        $contrasennaTemporal = GenerarContrasennaTemporal();
        $context = null;
        $transaccionActiva = false;
        $recuperado = false;

        try {
            $plantilla = CargarPlantillaCorreo('RecuperarAcceso.html', [
                '{{TEMPORAL}}' => $contrasennaTemporal,
                '{{NOMBRE}}' => $response['Nombre']
            ]);

            $context = Conectar();
            $context->begin_transaction();
            $transaccionActiva = true;
            $responseUpdate = ActualizarContrasennaModel($response['Consecutivo'], $contrasennaTemporal, null, $context);

            if (!$responseUpdate || !EnviarCorreoElectronico('Recuperación de Acceso', $plantilla, $response['CorreoElectronico'])) {
                throw new RuntimeException('La recuperación no se completó; se revierte la contraseña temporal.');
            }

            $context->commit();
            $transaccionActiva = false;
            $recuperado = true;
        } catch (Throwable $exc) {
            if ($context !== null && $transaccionActiva) {
                try {
                    $context->rollback();
                } catch (Throwable $errorRollback) {
                    RegistrarFalloCorreo($errorRollback, 'RecuperarAccesoRollback');
                }
            }
            RegistrarFalloCorreo($exc, 'RecuperarAcceso');
        } finally {
            if ($context !== null) {
                Cerrar($context);
            }
        }

        if ($recuperado) {
            $_SESSION['mensajeAcceso'] = 'Revise su correo para obtener la contraseña temporal. Si no aparece, revise también la carpeta de spam.';
            header("Location: ../../View/Inicio/login.php");
            exit();
        }
    }

    $_POST["mensaje"] = "No se ha podido recuperar su acceso al sistema";
}

if(isset($_POST['btnCerrarSesion'])) {
    session_destroy();
    header("Location: ../../View/Inicio/login.php");
    exit();
}
