<?php
// Vista de la plantilla Kath's Kitchen; formulario sin procesamiento de acceso.
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/View/layoutExterno.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/InicioController.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar acceso | Kath's Kitchen</title>
    <?php IncludeCSS(); ?>
</head>
<body>
    <main class="login-wrapper">
        <div class="login-card">
            <div class="login-brand">
                <h1>Kath's Kitchen</h1>
                <p>Recuperar contraseña</p>
            </div>




                <form action="" method="POST" id="forgotPasswordForm" class="needs-validation" novalidate>
                    <?php if (isset($_POST['mensaje'])) { ?>
                        <div class="alert alert-secondary text-center" role="alert">
                            <?php echo htmlspecialchars($_POST['mensaje'], ENT_QUOTES, 'UTF-8'); ?>
                        </div>
                    <?php } ?>
                    <div class="login-form-group">
                        <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                        <div class="login-input-group">
                            <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="login-input"
                                   value="<?php echo htmlspecialchars($_POST['txtIdentificacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Ingrese su identificación">
                        </div>
                    </div>
                    <button type="submit" id="btnRecuperarContrasenna" name="btnRecuperarContrasenna" class="btn-login"><span>Procesar</span></button>
                </form>


            <div class="login-divider"></div>

            <p class="login-footer-text">
                ¿Recordó su contraseña?
                <a href="login.php" id="link-register">Inicie sesión ahora</a>
            </p>

        </div>
    </main>

    <?php IncludeJS(); ?>
    <script src="../assets/js/forgotPassword.js"></script>
</body>
</html>
