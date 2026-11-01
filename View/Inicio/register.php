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
    <title>Crear cuenta | Kath's Kitchen</title>
    <?php IncludeCSS(); ?>
</head>
<body>
    <main class="login-wrapper">
        <div class="login-card">
            <div class="login-brand">
                <h1>Kath's Kitchen</h1>
                <p>Cree su cuenta</p>
            </div>



            <form id="registerForm" method="POST" action="" class="needs-validation" novalidate>
                <?php if (isset($_POST['mensaje'])) { ?>
                    <div class="alert alert-secondary text-center" role="alert"><?php echo htmlspecialchars($_POST['mensaje'], ENT_QUOTES, 'UTF-8'); ?></div>
                <?php } ?>

                <div class="login-form-group">
                    <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                    <div class="login-input-group">
                    <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="login-input" onkeyup="ConsultarNombre()"
                           value="<?php echo htmlspecialchars($_POST['txtIdentificacion'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Ingrese su identificación">
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="txtNombre" class="login-form-label">Nombre completo</label>
                    <div class="login-input-group">
                    <input type="text" id="txtNombre" name="txtNombre" class="login-input"
                           value="<?php echo htmlspecialchars($_POST['txtNombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Ingrese su nombre completo" autocomplete="name">
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="txtCorreoElectronico" class="login-form-label">Correo electrónico</label>
                    <div class="login-input-group">
                    <input type="email" id="txtCorreoElectronico" name="txtCorreoElectronico" class="login-input"
                           value="<?php echo htmlspecialchars($_POST['txtCorreoElectronico'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="nombre@ejemplo.com" autocomplete="email">
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="txtContrasenna" class="login-form-label">Contraseña</label>
                    <div class="login-input-group password-wrapper">
                    <input type="password" id="txtContrasenna" name="txtContrasenna" class="login-input login-input-password"
                           placeholder="Ingrese su contraseña" autocomplete="new-password">
                        <button type="button" class="password-toggle-btn" id="toggle-password" aria-label="Mostrar contraseña">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" id="btnRegistro" name="btnRegistro" class="btn-login"><span>Procesar</span></button>
            </form>

            <div class="login-divider"></div>

            <p class="login-footer-text">
                ¿Ya tiene una cuenta?
                <a href="login.php">Inicie sesión</a>
            </p>

        </div>
    </main>

    <?php IncludeJS(); ?>
    <script src="../assets/js/register.js"></script>
</body>
</html>
