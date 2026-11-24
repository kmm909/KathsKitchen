<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Model/ConfigModel.php';

function ConsultarMenuAdminModel()
{
    try {
        $context = Conectar();
        $response = $context->query('CALL spConsultarMenuAdmin()');
        $data = [];
        while ($row = $response->fetch_assoc()) {
            $data[] = $row;
        }
        Cerrar($context);
        return $data;
    } catch (Exception $exc) {
        RegistrarError($exc, 'ConsultarMenuAdminModel');
        return null;
    }
}

function ConsultarPlatoModel($platoId)
{
    try {
        $context = Conectar();
        $platoId = (int) $platoId;
        $response = $context->query("CALL spConsultarPlato('$platoId')");
        $data = $response->fetch_assoc();
        Cerrar($context);
        return $data;
    } catch (Exception $exc) {
        RegistrarError($exc, 'ConsultarPlatoModel');
        return null;
    }
}

function InactivarPlatoModel($platoId)
{
    try {
        $context = Conectar();
        $platoId = (int) $platoId;
        $response = $context->query("CALL spInactivarPlato('$platoId')");
        $actualizado = (bool) $response->fetch_row()[0];
        Cerrar($context);
        return $actualizado;
    } catch (Exception $exc) {
        RegistrarError($exc, 'InactivarPlatoModel');
        return false;
    }
}

function AgregarPlatoModel($nombre, $porciones, $precio, $descripcion, $imagen)
{
    try {
        $context = Conectar();
        $nombre = $context->real_escape_string($nombre);
        $descripcion = $context->real_escape_string($descripcion);
        $imagen = $context->real_escape_string($imagen);
        $porciones = (int) $porciones;
        $precio = number_format((float) $precio, 2, '.', '');
        $sql = "CALL spRegistrarPlato('$nombre','$porciones','$precio','$descripcion','$imagen')";
        $response = $context->query($sql);
        Cerrar($context);
        return $response;
    } catch (Exception $exc) {
        RegistrarError($exc, 'AgregarPlatoModel');
        return false;
    }
}

function ActualizarPlatoModel($platoId, $nombre, $porciones, $precio, $descripcion, $imagen)
{
    try {
        $context = Conectar();
        $platoId = (int) $platoId;
        $nombre = $context->real_escape_string($nombre);
        $descripcion = $context->real_escape_string($descripcion);
        $imagen = $context->real_escape_string($imagen);
        $porciones = (int) $porciones;
        $precio = number_format((float) $precio, 2, '.', '');
        $sql = "CALL spActualizarPlato('$platoId','$nombre','$porciones','$precio','$descripcion','$imagen')";
        $response = $context->query($sql);
        $actualizado = (bool) $response->fetch_row()[0];
        Cerrar($context);
        return $actualizado;
    } catch (Exception $exc) {
        RegistrarError($exc, 'ActualizarPlatoModel');
        return false;
    }
}
