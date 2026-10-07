<?php
// Vista de muestra del panel Sarab.
// Incluye el controlador y el layout del proyecto MVC.
include_once __DIR__ . '/../../Controller/InicioController.php';

include_once __DIR__ . '/../layoutInterno.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Sarab</title>
    <?php IncludeCSS(); ?>
</head>
<body>
    <?php MostrarHeader(); ?>

    <div class="app-cuerpo">
        <?php MostrarSidebar(); ?>

        <main class="app-contenido">
            <h1 class="app-titulo">Bienvenido, Sarab</h1>
            <p class="app-subtitulo">Pantalla de ejemplo: las tarjetas no muestran datos reales todavía.</p>

            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <div class="app-tarjeta">
                        <i class="bi bi-receipt"></i>
                        <h2 class="h5">Pedidos</h2>
                        <p class="mb-0">Ejemplo</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="app-tarjeta">
                        <i class="bi bi-egg-fried"></i>
                        <h2 class="h5">Menú</h2>
                        <p class="mb-0">Ejemplo</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="app-tarjeta">
                        <i class="bi bi-people"></i>
                        <h2 class="h5">Clientes</h2>
                        <p class="mb-0">Ejemplo</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php MostrarFooter(); ?>

    <?php IncludeJS(); ?>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
