<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Model/ConfigModel.php';

function RegistroModel($identificacion,$nombre,$correoElectronico,$contrasenna)
{
    try{
        $context = Conectar();

        $sql = "CALL spRegistrarUsuario('$identificacion','$nombre','$correoElectronico','$contrasenna')";
        $response = $context -> query($sql);

        Cerrar($context);
        return $response;
    }
    catch (Exception $exc) {
        RegistrarError($exc, "RegistroModel");
        return false;
    }
}

function InicioSesionModel($identificacion,$contrasenna)
{
    try{
        $context = Conectar();

        $sql = "CALL spIniciarSesionUsuario('$identificacion','$contrasenna')";
        $response = $context -> query($sql);

        $data = null;
        While($row = $response -> fetch_assoc())
        {
            $data = $row;
        }

        Cerrar($context);
        return $data;
    }
    catch (Exception $exc) {
        RegistrarError($exc, "InicioSesionModel");
        return null;
    }
}

function ConsultarIdentificacionModel($identificacion)
{
    try{
        $context = Conectar();

        $sql = "CALL spConsultarIdentificacion('$identificacion')";
        $response = $context -> query($sql);

        $data = null;
        While($row = $response -> fetch_assoc())
        {
            $data = $row;
        }

        Cerrar($context);
        return $data;
    }
    catch (Exception $exc) {
        RegistrarError($exc, "ConsultarIdentificacionModel");
        return null;
    }
}

function ActualizarContrasennaModel($consecutivo, $contrasennaNueva, $contrasennaActual, $context = null)
{
    // Recuperación comparte la conexión para poder revertir si falla el correo.
    $cerrarConexion = $context === null;
    try{
        if ($cerrarConexion) {
            $context = Conectar();
        }

        $sql = 'CALL spActualizarContrasenna(?, ?, ?)';
        $statement = $context->prepare($sql);
        $statement->bind_param('iss', $consecutivo, $contrasennaNueva, $contrasennaActual);
        $statement->execute();
        $response = $statement->get_result();

        $actualizado = (bool) $response -> fetch_row()[0];
        $response->free();
        $statement->close();
        while ($context->more_results() && $context->next_result()) {
            $restante = $context->store_result();
            if ($restante) {
                $restante->free();
            }
        }

        return $actualizado;
    }
    catch (Exception $exc) {
        if (!$cerrarConexion) {
            throw $exc;
        }
        RegistrarError($exc, "ActualizarContrasennaModel");
        return false;
    } finally {
        if ($cerrarConexion && $context !== null) {
            Cerrar($context);
        }
    }
}
