<?php
include_once '../layoutInterno.php';
ValidarVistaAdmin();
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/MenuController.php';
$esEdicion = false;
$plato = [];
include 'formularioPlato.php';
