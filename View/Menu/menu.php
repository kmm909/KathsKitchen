<?php
include_once '../layoutInterno.php';
ValidarVistaAdmin();
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/MenuController.php';
$datos = ConsultarMenuAdmin();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de catering | Kath's Kitchen</title>
    <?php IncludeMenuCSS(); IncludeCSS(); ?>
</head>
<body>
    <?php MostrarSidebar(); ?>
    <div class="main-wrapper">
        <?php MostrarHeader(); ?>
        <main class="app-contenido">
            <div class="page-header">
                <div>
                    <span class="page-eyebrow">KATH'S KITCHEN · CATERING</span>
                    <h1 class="page-title">Nuestro menú</h1>
                    <p class="app-subtitulo">Administra los platillos, sus presentaciones y disponibilidad.</p>
                </div>
                <a href="agregarPlato.php" class="btn-login menu-add"><i class="bi bi-plus-lg me-2"></i>Agregar platillo</a>
            </div>
            <?php if ($datos === null) { ?>
                <div class="alert alert-secondary" role="alert">No se pudo cargar el menú. Verifique la instalación del bloque Menú de catering de Respaldo.sql.</div>
            <?php } ?>
            <div class="card p-4">
                <p class="menu-table-note">El precio corresponde al total de porciones de cada presentación, en colones.</p>
                <table id="tablaPrincipal" class="table align-middle w-100 menu-table" data-token="<?php echo htmlspecialchars($_SESSION['TokenMenu'], ENT_QUOTES, 'UTF-8'); ?>">
                    <thead><tr>
                        <th>#</th><th>Platillo</th><th>Descripción</th><th>Porciones</th><th>Precio total</th><th>Estado</th><th>Acciones</th>
                    </tr></thead>
                    <tbody>
                    <?php foreach ($datos ?? [] as $plato) { ?>
                        <tr>
                            <td><?php echo (int) $plato['Consecutivo']; ?></td>
                            <td><div class="menu-item-cell">
                                <?php if ($plato['Imagen'] !== '') { ?>
                                    <img class="menu-thumbnail" src="<?php echo htmlspecialchars($plato['Imagen'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($plato['Nombre'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" referrerpolicy="no-referrer">
                                <?php } else { ?>
                                    <span class="menu-thumbnail menu-no-image" aria-hidden="true"><i class="bi bi-egg-fried"></i></span>
                                <?php } ?>
                                <strong><?php echo htmlspecialchars($plato['Nombre'], ENT_QUOTES, 'UTF-8'); ?></strong>
                            </div></td>
                            <td class="menu-description"><?php echo htmlspecialchars($plato['Descripcion'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo (int) $plato['Porciones']; ?></td>
                            <td class="text-nowrap">₡<?php echo number_format((float) $plato['Precio'], 2, ',', '.'); ?></td>
                            <td><span class="menu-status <?php echo $plato['Disponible'] ? 'is-available' : 'is-unavailable'; ?>"><?php echo $plato['Disponible'] ? 'Disponible' : 'No disponible'; ?></span></td>
                            <td><div class="d-flex gap-2">
                                <a href="actualizarPlato.php?id=<?php echo (int) $plato['Consecutivo']; ?>" class="btn menu-action" title="Editar platillo" aria-label="Editar platillo"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn menu-action btn-inactivar" data-id="<?php echo (int) $plato['Consecutivo']; ?>" title="Cambiar disponibilidad" aria-label="Cambiar disponibilidad"><i class="bi bi-arrow-repeat"></i></button>
                            </div></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
        <?php MostrarFooter(); ?>
    </div>
    <?php IncludeJS(); IncludeMenuJS(); ?>
    <script src="../assets/js/menu.js?v=<?php echo filemtime($_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/View/assets/js/menu.js'); ?>"></script>
</body>
</html>
