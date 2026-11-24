<?php
// Esta plantilla se incluye desde agregarPlato.php o actualizarPlato.php.
if (!isset($esEdicion, $plato)) {
    header('Location: /KathsKitchen/View/Menu/menu.php');
    exit();
}
$titulo = $esEdicion ? 'Editar platillo' : 'Agregar platillo';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?> | Kath's Kitchen</title>
    <?php IncludeCSS(); ?>
</head>
<body>
    <?php MostrarSidebar(); ?>
    <div class="main-wrapper">
        <?php MostrarHeader(); ?>
        <main class="app-contenido">
            <div class="page-header">
                <div><span class="page-eyebrow">MENÚ DE CATERING</span><h1 class="page-title"><?php echo $titulo; ?></h1></div>
                <a class="home-account-link" href="menu.php"><i class="bi bi-arrow-left"></i>Volver al menú</a>
            </div>
            <div class="row g-4 align-items-start">
            <div class="col-12 col-xl-8">
            <section class="card p-4 menu-form-card">
                <h2 class="card-title mb-4">Datos del plato</h2>
                <form action="" method="POST" id="platoForm" novalidate>
                    <input type="hidden" name="tokenMenu" value="<?php echo htmlspecialchars($_SESSION['TokenMenu'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php if ($esEdicion) { ?>
                        <input type="hidden" name="txtPlatoId" value="<?php echo (int) $plato['Consecutivo']; ?>">
                    <?php } ?>
                    <?php if (isset($_POST['mensaje'])) { ?>
                        <div class="alert alert-secondary" role="alert"><?php echo htmlspecialchars($_POST['mensaje'], ENT_QUOTES, 'UTF-8'); ?></div>
                    <?php } ?>
                    <div class="login-form-group">
                        <label class="login-form-label" for="txtNombre">Nombre del platillo</label>
                        <div class="login-input-group"><input class="login-input" id="txtNombre" name="txtNombre" maxlength="150" value="<?php echo htmlspecialchars($_POST['txtNombre'] ?? $plato['Nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Ej. Arroz con pollo" required></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 login-form-group">
                            <label class="login-form-label" for="txtPorciones">Porciones por presentación</label>
                            <div class="login-input-group"><input type="text" inputmode="numeric" class="login-input" id="txtPorciones" name="txtPorciones" value="<?php echo htmlspecialchars((string) ($_POST['txtPorciones'] ?? $plato['Porciones'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required></div>
                        </div>
                        <div class="col-md-6 login-form-group">
                            <label class="login-form-label" for="txtPrecio">Precio total de la presentación (₡)</label>
                            <div class="login-input-group"><input type="text" inputmode="decimal" class="login-input" id="txtPrecio" name="txtPrecio" value="<?php echo htmlspecialchars((string) ($_POST['txtPrecio'] ?? $plato['Precio'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>" required></div>
                        </div>
                    </div>
                    <div class="login-form-group">
                        <label class="login-form-label" for="txtDescripcion">Descripción</label>
                        <div class="login-input-group"><textarea class="login-input" id="txtDescripcion" name="txtDescripcion" rows="4" maxlength="500" placeholder="Ingredientes, acompañamientos y presentación." required><?php echo htmlspecialchars($_POST['txtDescripcion'] ?? $plato['Descripcion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea></div>
                    </div>
                    <div class="login-form-group">
                        <label class="login-form-label" for="txtImagen">Dirección de imagen</label>
                        <div class="login-input-group"><input class="login-input" id="txtImagen" name="txtImagen" maxlength="500" value="<?php echo htmlspecialchars($_POST['txtImagen'] ?? $plato['Imagen'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="https://… o ../assets/images/…" required></div>
                        <p class="menu-table-note mt-2">Utiliza una URL de imagen o la ruta de una imagen existente. Este formulario no sube archivos.</p>
                    </div>
                    <div class="d-flex gap-3 justify-content-end align-items-center">
                        <a href="menu.php" class="home-account-link">Cancelar</a>
                        <button class="btn-login" type="submit" name="<?php echo $esEdicion ? 'btnActualizarPlato' : 'btnAgregarPlato'; ?>">Guardar platillo</button>
                    </div>
                </form>
            </section>
            </div>
            <aside class="col-12 col-xl-4">
                <section class="card p-4 menu-preview-card" aria-labelledby="tituloVistaPrevia">
                    <h2 class="card-title mb-3" id="tituloVistaPrevia">Vista previa</h2>
                    <div class="menu-preview-frame">
                        <img id="imgVistaPrevia" alt="Vista previa del plato de catering" class="d-none" referrerpolicy="no-referrer">
                        <div id="sinVistaPrevia" class="menu-preview-placeholder" role="status" aria-live="polite">
                            <i class="bi bi-image" aria-hidden="true"></i>
                            <small>Ingrese la dirección de la imagen para visualizarla</small>
                        </div>
                    </div>
                    <p class="menu-table-note mt-3 mb-0">La vista previa se actualiza al cambiar la dirección de imagen.</p>
                </section>
            </aside>
            </div>
        </main>
        <?php MostrarFooter(); ?>
    </div>
    <?php IncludeJS(); ?>
    <script src="../assets/js/menu.js?v=<?php echo filemtime($_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/View/assets/js/menu.js'); ?>"></script>
</body>
</html>
