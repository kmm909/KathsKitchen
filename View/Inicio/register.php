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
    <title>Crear cuenta | Sarab</title>
    <?php IncludeCSS(); ?>
</head>
<body>
    <main class="login-wrapper">
        <div class="login-card">
            <div class="login-brand">
                <h1>Sarab</h1>
                <p>Cree su cuenta</p>
            </div>

            

            <?php if (isset($_POST['mensaje'])) { ?>
                <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($_POST['mensaje'], ENT_QUOTES, 'UTF-8'); ?></div>
            <?php } ?>
            <form id="formRegistro" method="POST" action="register.php" novalidate>
                <div class="login-form-group">
                    <label for="txtNombre" class="login-form-label">Nombre completo</label>
                    <input type="text" id="txtNombre" name="txtNombre" class="login-input"
                           value="<?php echo htmlspecialchars($_POST['txtNombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Ingrese su nombre completo" autocomplete="name">
                </div>

                <div class="login-form-group">
                    <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                    <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="login-input"
                           value="<?php echo htmlspecialchars($_POST['txtIdentificacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Ingrese su identificación">
                </div>

                <div class="login-form-group">
                    <label for="txtCorreoElectronico" class="login-form-label">Correo electrónico</label>
                    <input type="email" id="txtCorreoElectronico" name="txtCorreoElectronico" class="login-input"
                           value="<?php echo htmlspecialchars($_POST['txtCorreoElectronico'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="nombre@ejemplo.com" autocomplete="email">
                </div>

                <div class="login-form-group">
                    <label for="txtContrasenna" class="login-form-label">Contraseña</label>
                    <input type="password" id="txtContrasenna" name="txtContrasenna" class="login-input"
                           placeholder="Mínimo 6 caracteres" autocomplete="new-password">
                </div>

                <div class="login-form-group">
                    <label for="txtConfirmacion" class="login-form-label">Confirmar contraseña</label>
                    <input type="password" id="txtConfirmacion" name="txtConfirmacion" class="login-input"
                           placeholder="Repita su contraseña" autocomplete="new-password">
                </div>

                <button type="submit" name="btnRegistro" class="btn-login">Crear cuenta</button>
            </form>

            <div class="login-divider"></div>

            <p class="login-footer-text">
                ¿Ya tiene una cuenta?
                <a href="login.php">Inicie sesión</a>
            </p>

            <div class="back-home">
                <a href="landing.php">Volver al inicio</a>
            </div>
        </div>
    </main>

    <?php IncludeJS(); ?>
    <script src="../assets/js/register.js"></script>
</body>
</html>
