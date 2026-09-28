<?php
// Vista de inicio de sesión - Kath's Kitchen
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar Sesión | Kath's Kitchen</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Estilos de la plantilla -->
    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/auth.css">

</head>

<body>

    <div class="login-wrapper">

        <div class="login-card">

            <!-- Encabezado -->
            <div class="login-brand">
                <h2>Kath's Kitchen</h2>
                <p>Bienvenido</p>
            </div>

            <!-- Formulario de inicio de sesión -->
            <form action="../index.php" method="GET" id="loginForm">

                <!-- Identificación -->
                <div class="login-form-group">

                    <label for="txtIdentificacion" class="login-form-label">
                        Identificación
                    </label>

                    <div class="login-input-group">

                        <input
                            type="text"
                            id="txtIdentificacion"
                            name="identificacion"
                            class="login-input"
                            value="Administrador"
                            required>

                    </div>

                </div>

                <!-- Contraseña -->
                <div class="login-form-group">

                    <label for="txtContrasenna" class="login-form-label">
                        Contraseña
                    </label>

                    <div class="login-input-group password-wrapper">

                        <input
                            type="password"
                            id="txtContrasenna"
                            name="contrasenna"
                            class="login-input"
                            value="Adm123"
                            required>

                        <button
                            type="button"
                            class="password-toggle-btn"
                            id="togglePassword"
                            aria-label="Mostrar contraseña">

                            <i class="fas fa-eye" id="eyeIcon"></i>

                        </button>

                    </div>

                </div>

                <!-- Recuperación de contraseña -->
                <div class="login-options">

                    <a href="recuperar.php" class="forgot-password-link">
                        ¿Olvidó su contraseña?
                    </a>

                </div>

                <!-- Botón -->
                <button type="submit" class="btn-login">
                    Iniciar sesión
                </button>

            </form>

            <div class="login-divider"></div>

            <!-- Registro -->
            <p class="login-footer-text">

                ¿No tiene una cuenta?

                <a href="registro.php">
                    Regístrese ahora
                </a>

            </p>

            <!-- Regresar -->
            <div class="back-home">

                <a href="../index.php">
                    Volver al inicio
                </a>

            </div>

        </div>

    </div>

    <!-- Bootstrap -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Mostrar y ocultar contraseña -->
    <script>

        const togglePassword = document.getElementById("togglePassword");
        const password = document.getElementById("txtContrasenna");
        const eyeIcon = document.getElementById("eyeIcon");

        togglePassword.addEventListener("click", function () {

            if (password.type === "password") {

                password.type = "text";

                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");

                togglePassword.setAttribute(
                    "aria-label",
                    "Ocultar contraseña"
                );

            } else {

                password.type = "password";

                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");

                togglePassword.setAttribute(
                    "aria-label",
                    "Mostrar contraseña"
                );

            }

        });

    </script>

</body>

</html>