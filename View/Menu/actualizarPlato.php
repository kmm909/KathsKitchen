<?php
include_once '../layoutInterno.php';
ValidarVistaAdmin();
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/MenuController.php';
$platoId = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
$plato = $platoId ? ConsultarPlato($platoId) : null;
if (!$plato) {
    header('Location: /KathsKitchen/View/Menu/menu.php');
    exit();
}
$esEdicion = true;
include 'formularioPlato.php';
