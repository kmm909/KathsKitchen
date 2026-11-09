<?php include_once '../layoutInterno.php'; 
      include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/PersonalController.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de la cuenta | Kath's Kitchen</title>
    <?php IncludeCSS(); ?>
</head>

<body>

    <?php MostrarSidebar(); ?>

    <div class="main-wrapper">

        <?php MostrarHeader(); ?>

        <div class="page-header">
            <div>
                <h1 class="page-title">Datos de la Cuenta</h1>
            </div>
        </div>

        <div class="row g-4 mb-4">

            <!-- Column 1 -->
            <div class="col-12 col-lg-6">
                <div class="card border-light shadow-sm p-4">
                    <h5 class="card-title mb-4">Datos Personales</h5>

                    <form action="" method="POST" id="DatosCuentaForm" class="needs-validation" novalidate>

                        <?php if(isset($_POST["mensajeDatosCuenta"])) { ?>

                        <div class="alert alert-secondary text-center" role="alert">
                            <?php echo htmlspecialchars($_POST["mensajeDatosCuenta"], ENT_QUOTES, 'UTF-8'); ?>
                        </div>

                        <?php } ?>

                        <div class="login-form-group">
                            <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                            <div class="login-input-group">
                                <i class="bi bi-person input-icon"></i>
                                <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="login-input"
                                    onkeyup="ConsultarNombre()">
                            </div>
                        </div>

                        <div class="login-form-group">
                            <label for="txtNombre" class="login-form-label">Nombre Completo</label>
                            <div class="login-input-group">
                                <i class="bi bi-person-badge input-icon"></i>
                                <input type="text" id="txtNombre" name="txtNombre" class="login-input">
                            </div>
                        </div>

                        <div class="login-form-group">
                            <label for="txtCorreoElectronico" class="login-form-label">Correo Electrónico</label>
                            <div class="login-input-group">
                                <i class="bi bi-envelope input-icon"></i>
                                <input type="text" id="txtCorreoElectronico" name="txtCorreoElectronico"
                                    class="login-input">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" id="btnCambiarDatosCuenta" name="btnCambiarDatosCuenta"
                                class="btn-login w-25">
                                <span>Procesar</span>
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-12 col-lg-6">
                <div class="card border-light shadow-sm p-4">
                    <h5 class="card-title mb-4">Datos de Seguridad</h5>

                    <form action="" method="POST" id="PasswordForm" class="needs-validation" novalidate>

                        <?php if(isset($_POST["mensajePassword"])) { ?>

                        <div class="alert alert-secondary text-center" role="alert">
                            <?php echo htmlspecialchars($_POST["mensajePassword"], ENT_QUOTES, 'UTF-8'); ?>
                        </div>

                        <?php } ?>

                        <div class="mb-3">
                            <label for="txtContrasenaActual" class="form-label-custom">Contraseña Actual</label>
                            <div class="login-input-group">
                                <i class="bi bi-shield-lock input-icon"></i>
                                <input type="password" id="txtContrasenaActual" name="txtContrasenaActual"
                                    class="login-input login-input-password">
                                <button type="button" class="password-toggle-btn" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="txtContrasenaNueva" class="form-label-custom">Contraseña Nueva</label>
                            <div class="login-input-group">
                                <i class="bi bi-shield-lock input-icon"></i>
                                <input type="password" id="txtContrasenaNueva" name="txtContrasenaNueva"
                                    class="login-input login-input-password">
                                <button type="button" class="password-toggle-btn" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="txtConfirmarContrasena" class="form-label-custom">Confirmar Contraseña</label>
                            <div class="login-input-group">
                                <i class="bi bi-shield-lock input-icon"></i>
                                <input type="password" id="txtConfirmarContrasena" name="txtConfirmarContrasena"
                                    class="login-input login-input-password">
                                <button type="button" class="password-toggle-btn" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" id="btnCambiarContrasenna" name="btnCambiarContrasenna"
                                class="btn-login w-25">
                                <span>Procesar</span>
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

        <?php MostrarFooter(); ?>

    </div>

    <?php IncludeJS(); ?>
    <script src="../assets/js/cuenta.js"></script>

</body>

</html>
