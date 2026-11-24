<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Model/MenuModel.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$esAjaxMenu = isset($_POST['action']);
if (!isset($_SESSION['ConsecutivoUsuario']) || (int) ($_SESSION['ConsecutivoRol'] ?? 0) !== 2) {
    if ($esAjaxMenu) {
        http_response_code(403);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => false, 'mensaje' => 'No tiene permiso para administrar el menú.']);
    } else {
        header('Location: /KathsKitchen/View/Inicio/home.php');
    }
    exit();
}

if (!isset($_SESSION['TokenMenu'])) {
    $_SESSION['TokenMenu'] = bin2hex(random_bytes(32));
}

function ConsultarMenuAdmin()
{
    return ConsultarMenuAdminModel();
}

function ConsultarPlato($platoId)
{
    return ConsultarPlatoModel($platoId);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['TokenMenu'], (string) ($_POST['tokenMenu'] ?? ''))) {
        http_response_code(403);
        if ($esAjaxMenu) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['success' => false, 'mensaje' => 'Recargue la página e intente nuevamente.']);
            exit();
        }
        $_POST['mensaje'] = 'Recargue la página e intente nuevamente.';
    } elseif ($esAjaxMenu) {
        header('Content-Type: application/json; charset=utf-8');
        $platoId = filter_var($_POST['platoId'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        if ($_POST['action'] !== 'btnInactivarPlato' || !$platoId) {
            http_response_code(400);
            echo json_encode(['success' => false, 'mensaje' => 'La solicitud no es válida.']);
            exit();
        }
        $response = InactivarPlatoModel($platoId);
        echo json_encode(['success' => $response, 'mensaje' => $response ? 'Disponibilidad actualizada correctamente.' : 'No se pudo actualizar la disponibilidad.']);
        exit();
    } elseif (isset($_POST['btnAgregarPlato']) || isset($_POST['btnActualizarPlato'])) {
        $nombre = trim((string) ($_POST['txtNombre'] ?? ''));
        $porciones = filter_var($_POST['txtPorciones'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100000]]);
        $precioTexto = trim((string) ($_POST['txtPrecio'] ?? ''));
        $precioValido = preg_match('/^\d+(\.\d{1,2})?$/D', $precioTexto);
        $precio = filter_var($precioTexto, FILTER_VALIDATE_FLOAT);
        $descripcion = trim((string) ($_POST['txtDescripcion'] ?? ''));
        $imagen = trim((string) ($_POST['txtImagen'] ?? ''));
        $platoId = filter_var($_POST['txtPlatoId'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $imagenValida = $imagen !== '' && (preg_match('~^https?://~i', $imagen) || preg_match('~^\.\./assets/images/[a-zA-Z0-9_./-]+$~', $imagen));

        if (!$precioValido || $precio === false || !is_finite($precio) || $precio <= 0 || $precio > 99999999.99) {
            $_POST['mensaje'] = 'Ingrese un precio mayor a 0, con máximo dos decimales y hasta 99999999.99.';
        } elseif ($imagen === '') {
            $_POST['mensaje'] = 'La imagen del plato es obligatoria.';
        } elseif ($nombre === '' || mb_strlen($nombre) > 150 || !$porciones || $descripcion === '' || mb_strlen($descripcion) > 500 || mb_strlen($imagen) > 500 || !$imagenValida || (isset($_POST['btnActualizarPlato']) && !$platoId)) {
            $_POST['mensaje'] = 'Revise el nombre, las porciones, el precio, la descripción y la dirección de imagen.';
        } else {
            $response = isset($_POST['btnAgregarPlato'])
                ? AgregarPlatoModel($nombre, $porciones, $precio, $descripcion, $imagen)
                : ActualizarPlatoModel($platoId, $nombre, $porciones, $precio, $descripcion, $imagen);
            if ($response) {
                header('Location: /KathsKitchen/View/Menu/menu.php');
                exit();
            }
            $_POST['mensaje'] = 'La información del platillo no se ha podido guardar correctamente.';
        }
    }
}
