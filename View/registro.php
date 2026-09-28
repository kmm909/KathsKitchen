<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta | Kath's Kitchen</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
    <main class="login-wrapper">
        <div class="login-card">
            <div class="login-brand">
                <h1>Kath's Kitchen</h1>
                <p>Cree su cuenta</p>
            </div>

            <!-- Vista de diseño: el formulario no envía ni almacena datos. -->
            <form id="registroForm" onsubmit="return false;">
                <div class="login-form-group">
                    <label for="txtNombre" class="login-form-label">Nombre completo</label>
                    <input type="text" id="txtNombre" class="login-input" placeholder="Ingrese su nombre completo" autocomplete="name">
                </div>
                <div class="login-form-group">
                    <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                    <input type="text" id="txtIdentificacion" class="login-input" placeholder="Ingrese su identificación">
                </div>
                <div class="login-form-group">
                    <label for="txtCorreo" class="login-form-label">Correo electrónico</label>
                    <input type="email" id="txtCorreo" class="login-input" placeholder="nombre@ejemplo.com" autocomplete="email">
                </div>
                <div class="login-form-group">
                    <label for="txtContrasenna" class="login-form-label">Contraseña</label>
                    <input type="password" id="txtContrasenna" class="login-input" placeholder="Ingrese su contraseña" autocomplete="new-password">
                </div>
                <div class="login-form-group">
                    <label for="txtConfirmacion" class="login-form-label">Confirmar contraseña</label>
                    <input type="password" id="txtConfirmacion" class="login-input" placeholder="Repita su contraseña" autocomplete="new-password">
                </div>
                <button type="button" class="btn-login">Crear cuenta</button>
            </form>

            <div class="login-divider"></div>
            <p class="login-footer-text">
                ¿Ya tiene una cuenta?
                <a href="login.php">Inicie sesión</a>
            </p>
            <div class="back-home">
                <a href="../index.php">Volver al inicio</a>
            </div>
        </div>
    </main>
</body>
</html>
