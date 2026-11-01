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
    <title>Iniciar sesión | Kath's Kitchen</title>
    <?php IncludeCSS(); ?>
</head>
<body>
    <main class="login-wrapper">
        <div class="login-card">
            <div class="login-brand">
                <h1>Kath's Kitchen</h1>
                <p>Iniciar sesión</p>
            </div>




            <form action="" method="POST" id="loginForm" class="needs-validation" novalidate>
                <?php if (isset($_POST['mensaje'])) { ?>
                    <div class="alert alert-secondary text-center" role="alert">
                        <?php echo htmlspecialchars($_POST['mensaje'], ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php } ?>
                <div class="login-form-group">
                    <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                    <div class="login-input-group">
                    <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="login-input"
                           value="<?php echo htmlspecialchars($_POST['txtIdentificacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" autocomplete="username">
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="txtContrasenna" class="login-form-label">Contraseña</label>
                    <div class="login-input-group password-wrapper">
                        <input type="password" id="txtContrasenna" name="txtContrasenna" class="login-input login-input-password" autocomplete="current-password">
                        <button type="button" class="password-toggle-btn" id="toggle-password" aria-label="Mostrar contraseña">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="login-options">
                    <a href="forgotPassword.php" class="forgot-password-link">¿Olvidó su contraseña?</a>
                </div>

                <button type="submit" id="btnInicioSesion" name="btnInicioSesion" class="btn-login"><span>Procesar</span></button>
            </form>

            <div class="login-divider"></div>

            <p class="login-footer-text">
                ¿No tiene una cuenta?
                <a href="register.php" id="link-register">Regístrese ahora</a>
            </p>

        </div>
    </main>

    <?php IncludeJS(); ?>
    <script src="../assets/js/login.js"></script>
</body>
</html>
