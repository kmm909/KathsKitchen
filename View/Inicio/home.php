<?php
include_once '../layoutInterno.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Kath's Kitchen</title>
    <?php IncludeCSS(); ?>
</head>
<body>
    <?php MostrarSidebar(); ?>
    <div class="main-wrapper">
        <?php MostrarHeader(); ?>

        <main class="app-contenido home-content">
            <div class="page-header">
                <div>
                    <span class="page-eyebrow">KATH'S KITCHEN · TU ESPACIO PERSONAL</span>
                    <h1 class="page-title app-titulo">Qué bueno tenerte aquí.</h1>
                    <p class="app-subtitulo">Tu cuenta, tus datos y tu seguridad. Todo a mano.</p>
                </div>
                <a class="home-account-link" href="../Personal/cuenta.php"><i class="bi bi-person-circle"></i> Mi cuenta</a>
            </div>

            <div class="row g-4">
                <div class="col-12 col-xl-8">
                    <section class="panel-welcome">
                        <span class="panel-eyebrow">TU CUENTA</span>
                        <div class="welcome-mark" aria-hidden="true"><i class="bi bi-cup-hot"></i></div>
                        <h2>Un espacio<br>hecho para ti.</h2>
                        <p>Consulta las opciones de tu perfil y administra el acceso a tu cuenta de Kath's Kitchen.</p>
                        <a class="btn btn-panel" href="../Personal/cuenta.php">Explorar mi cuenta <i class="bi bi-arrow-right ms-2"></i></a>
                    </section>
                </div>
                <div class="col-12 col-xl-4">
                    <a class="panel-shortcut" href="../Personal/cuenta.php#PasswordForm">
                        <div class="shortcut-top"><i class="bi bi-shield-lock"></i><i class="bi bi-arrow-up-right"></i></div>
                        <h2>Tu tranquilidad<br>empieza aquí.</h2>
                        <p>Encuentra el formulario para actualizar tu contraseña y mantener tu acceso al día.</p>
                        <span>Administrar contraseña <i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="home-bottom-note"><i class="bi bi-lock"></i><span>Este es tu espacio privado. Recuerda cerrar sesión si utilizas un equipo compartido.</span></div>
        </main>
        <?php MostrarFooter(); ?>
    </div>

    <?php IncludeJS(); ?>
</body>
</html>
