<?php
include_once '../layoutInterno.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Kath's Kitchen</title>
    <?php IncludeCSS(); ?>
</head>
<body>
    <?php MostrarHeader(); ?>

    <div class="app-cuerpo">
        <?php MostrarSidebar(); ?>

        <main class="app-contenido">
            <div class="page-header">
                <div>
                    <h1 class="page-title app-titulo">Dashboard</h1>
                </div>
            </div>

            <div class="row g-4">
            </div>
        </main>
    </div>

    <?php MostrarFooter(); ?>

    <?php IncludeJS(); ?>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
