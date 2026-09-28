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

    <style>
        body {
            margin: 0;
            background-color: #fff8f3;
            font-family: Arial, sans-serif;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 15px;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.10);
        }

        .login-brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-brand h2 {
            margin-bottom: 8px;
            font-size: 32px;
            font-weight: 700;
            color: #ef3f2f;
        }

        .login-brand p {
            margin: 0;
            color: #777777;
        }

        .login-form-group {
            margin-bottom: 20px;
        }

        .login-form-label {
            display: block;
            margin-bottom: 8px;
            color: #222222;
            font-weight: 600;
        }

        .login-input-group {
            position: relative;
        }

        .login-input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dddddd;
            border-radius: 10px;
            outline: none;
            box-sizing: border-box;
            transition: 0.3s;
        }

        .login-input:focus {
            border-color: #ef3f2f;
            box-shadow: 0 0 0 3px rgba(239, 63, 47, 0.10);
        }

        .password-wrapper .login-input {
            padding-right: 50px;
        }

        .password-toggle-btn {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            padding: 0;
            border: none;
            background-color: transparent;
            color: #777777;
            cursor: pointer;
        }

        .password-toggle-btn:hover {
            color: #ef3f2f;
        }

        .login-options {
            margin-bottom: 20px;
            text-align: right;
        }

        .forgot-password-link {
            color: #ef3f2f;
            font-size: 14px;
            text-decoration: none;
        }

        .forgot-password-link:hover {
            color: #d93427;
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 10px;
            background-color: #ef3f2f;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #d93427;
        }

        .login-divider {
            margin: 25px 0;
            border-top: 1px solid #eeeeee;
        }

        .login-footer-text {
            margin: 0;
            color: #666666;
            text-align: center;
        }

        .login-footer-text a {
            color: #ef3f2f;
            font-weight: 600;
            text-decoration: none;
        }

        .login-footer-text a:hover {
            color: #d93427;
            text-decoration: underline;
        }

        .back-home {
            margin-top: 25px;
            text-align: center;
        }

        .back-home a {
            color: #777777;
            font-size: 14px;
            text-decoration: none;
        }

        .back-home a:hover {
            color: #ef3f2f;
        }
    </style>

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