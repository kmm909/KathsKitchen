<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar acceso | Kath's Kitchen</title>
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
                <p>Recupere su acceso</p>
            </div>

            <div id="vistaFormulario">
                <form id="recuperarForm" onsubmit="return false;">
                    <div class="login-form-group">
                        <label for="txtCorreo" class="login-form-label">Correo electrónico</label>
                        <input type="email" id="txtCorreo" class="login-input" placeholder="nombre@ejemplo.com" autocomplete="email">
                    </div>
                    <button type="button" id="btnRecuperar" class="btn-login">Recuperar acceso</button>
                </form>

                <div class="login-divider"></div>
                <p class="login-footer-text">
                    ¿Recordó su contraseña?
                    <a href="login.php">Inicie sesión</a>
                </p>
                <div class="back-home">
                    <a href="../index.php">Volver al inicio</a>
                </div>
            </div>

            <div id="vistaConfirmacion" class="d-none">
                <p class="login-footer-text">
                    Se ha enviado un correo con las instrucciones para recuperar el acceso.
                </p>

                <div class="login-divider"></div>

                <form action="../index.php" method="GET">
                    <button type="submit" class="btn-login">Volver al inicio</button>
                </form>
            </div>
        </div>
    </main>

    <script src="../js/bootstrap.bundle.min.js"></script>

    <script>
        const btnRecuperar = document.getElementById("btnRecuperar");
        const vistaFormulario = document.getElementById("vistaFormulario");
        const vistaConfirmacion = document.getElementById("vistaConfirmacion");

        btnRecuperar.addEventListener("click", function () {
            vistaFormulario.classList.add("d-none");
            vistaConfirmacion.classList.remove("d-none");
        });
    </script>
</body>
</html>