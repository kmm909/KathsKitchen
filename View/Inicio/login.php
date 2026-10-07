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
    <title>Iniciar sesión | Sarab</title>
    <?php IncludeCSS(); ?>
</head>
<body>
    <main class="login-wrapper">
        <div class="login-card">
            <div class="login-brand">
                <h1>Sarab</h1>
                <p>Bienvenido</p>
            </div>

            
            

            <form id="formLogin" method="POST" action="login.php" novalidate>
                <div class="login-form-group">
                    <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                    <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="login-input"
                           value="<?php echo htmlspecialchars($_POST['txtIdentificacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" autocomplete="username">
                </div>

                <div class="login-form-group">
                    <label for="txtContrasenna" class="login-form-label">Contraseña</label>
                    <div class="login-input-group password-wrapper">
                        <input type="password" id="txtContrasenna" name="txtContrasenna" class="login-input" autocomplete="current-password">
                        <button type="button" class="password-toggle-btn" id="btnMostrarContrasenna" aria-label="Mostrar contraseña">
                            <i class="bi bi-eye" id="iconoContrasenna"></i>
                        </button>
                    </div>
                </div>

                <div class="login-options">
                    <a href="forgotPassword.php" class="forgot-password-link">¿Olvidó su contraseña?</a>
                </div>

                <button type="submit" name="btnIngresar" class="btn-login">Iniciar sesión</button>
            </form>

            <div class="login-divider"></div>

            <p class="login-footer-text">
                ¿No tiene una cuenta?
                <a href="register.php">Regístrese ahora</a>
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
