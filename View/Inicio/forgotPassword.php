<?php
// Vista de la plantilla Sarab; formulario sin procesamiento de acceso.
include_once __DIR__ . '/../../Controller/InicioController.php';
include_once __DIR__ . '/../layoutExterno.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar acceso | Sarab</title>
    <?php IncludeCSS(); ?>
</head>
<body>
    <main class="login-wrapper">
        <div class="login-card">
            <div class="login-brand">
                <h1>Sarab</h1>
                <p>Recupere su acceso</p>
            </div>

            

            
                <form id="formRecuperar" method="POST" action="forgotPassword.php" novalidate>
                    <div class="login-form-group">
                        <label for="txtCorreoElectronico" class="login-form-label">Correo electrónico</label>
                        <input type="email" id="txtCorreoElectronico" name="txtCorreoElectronico" class="login-input"
                               value="<?php echo htmlspecialchars($_POST['txtCorreoElectronico'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="nombre@ejemplo.com" autocomplete="email">
                    </div>
                    <button type="submit" name="btnRecuperar" class="btn-login">Recuperar acceso</button>
                </form>


            <div class="login-divider"></div>

            <p class="login-footer-text">
                ¿Recordó su contraseña?
                <a href="login.php">Inicie sesión</a>
            </p>

            <div class="back-home">
                <a href="landing.php">Volver al inicio</a>
            </div>
        </div>
    </main>

    <?php IncludeJS(); ?>
    <script src="../assets/js/auth.js"></script>
</body>
</html>
