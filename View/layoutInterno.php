<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/Controller/InicioController.php';

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['NombreUsuario'])) {
    header('Location: ../../View/Inicio/login.php');
    exit();
}

function MostrarHeader()
{
    $nombreUsuario = "";
    $nombreRol = "";

    if(isset($_SESSION['NombreUsuario'])) {
        $nombreUsuario = $_SESSION['NombreUsuario'];
        $nombreRol = $_SESSION['NombreRol'];
    }
    else
    {
        header("Location: ../../View/Inicio/login.php");
        exit();
    }

    $inicialesUsuario = "";
    $partesNombre = preg_split('/\s+/u', trim($nombreUsuario), -1, PREG_SPLIT_NO_EMPTY);

    foreach (array_slice($partesNombre, 0, 2) as $parteNombre) {
        $inicialesUsuario .= mb_strtoupper(mb_substr($parteNombre, 0, 1, 'UTF-8'), 'UTF-8');
    }

    echo '
        <header class="navbar-custom app-header">
            <div class="navbar-left">
                <!-- Desktop sidebar toggle (visible on large screens only) -->
                <button class="btn-desktop-toggle d-none d-lg-flex align-items-center justify-content-center"
                id="desktop-sidebar-toggle" aria-label="Ocultar menú">
                <i class="bi bi-chevron-bar-left"></i>
                </button>
                <!-- Mobile sidebar toggle -->
                <button class="sidebar-toggle-btn me-2" id="sidebar-toggle" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-label="Toggle Navigation">
                <i class="bi bi-list"></i>
                </button>
            </div>

            <a class="navbar-home-link" href="../Inicio/home.php">MI ESPACIO <span>/</span> Kath\'s Kitchen</a>

            <!-- Right actions -->
            <div class="navbar-actions">       

                <!-- Profile Dropdown -->
                <div class="dropdown ms-2">
                <button class="navbar-profile-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false" id="profile-dropdown">
                    <span class="navbar-profile-initials" aria-hidden="true">' . htmlspecialchars($inicialesUsuario, ENT_QUOTES, 'UTF-8') . '</span>
                    <span class="d-none d-md-flex flex-column align-items-start">
                        <span class="navbar-profile-name">' . htmlspecialchars($nombreUsuario, ENT_QUOTES, 'UTF-8') . '</span>
                        <span class="navbar-profile-role">' . htmlspecialchars($nombreRol, ENT_QUOTES, 'UTF-8') . '</span>
                    </span>
                    <i class="bi bi-chevron-down navbar-profile-caret"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile" aria-labelledby="profile-dropdown">
                    <li><a class="dropdown-item" href="../Personal/cuenta.php"><i class="bi bi-person"></i> Mi Cuenta </a></li>
                    <li>
                    <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="" method="POST" id="formCerrarSesion">
                            <button type="submit" class="dropdown-item text-danger" id="btnCerrarSesion" name="btnCerrarSesion">
                                <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                            </button>
                        </form>
                    </li>
                </ul>
                </div>
            </div>
        </header>
    ';
}

function MostrarFooter()
{
    echo '
        <footer class="footer-custom app-footer">
        <div class="footer-left">
            <span class="footer-logo">
            Kath\'s Kitchen
            </span>
        </div>
        </footer>
    ';
}

function MostrarSidebar()
{
    echo '
        <div class="sidebar-wrapper offcanvas-lg offcanvas-start app-sidebar" id="sidebar" tabindex="-1" aria-label="Navegación principal">
            <button type="button" class="btn-close d-lg-none ms-auto m-3" data-bs-dismiss="offcanvas" data-bs-target="#sidebar" aria-label="Cerrar menú"></button>
            <!-- Brand Logo / Identity -->
            <a href="../Inicio/home.php" class="sidebar-brand">
            <i class="bi bi-cup-hot"></i>
            <span>Kath\'s Kitchen</span>
            </a>

            <!-- Navigation Menu -->
            <div class="flex-grow-1 overflow-y-auto">
            <!-- Group: Menu -->
            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title">Mi espacio</div>
                <ul class="sidebar-menu-list">
                <li class="sidebar-menu-item">
                    <a href="../Inicio/home.php" class="sidebar-menu-link" id="menu-overview" title="Overview">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                    </a>
                </li>
                </ul>
            </div>

            <div class="sidebar-menu-section">
                <ul class="sidebar-menu-list">
                <li class="sidebar-menu-item">
                    <a href="../Personal/cuenta.php" class="sidebar-menu-link" id="menu-cuenta" title="Mi cuenta">
                    <i class="bi bi-person-circle"></i>
                    <span>Mi cuenta</span>
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </div>
    ';
}

function IncludeCSS()
{
    $versionCSS = filemtime($_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/View/assets/css/main.css');
    echo '
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/libs/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/libs/bootstrap-icons/bootstrap-icons.min.css">
        <link rel="stylesheet" href="../assets/css/main.css?v=' . $versionCSS . '">
    ';
}

function IncludeJS()
{
    echo '
        <script src="../assets/libs/jquery/jquery-3.7.1.min.js"></script>
        <script src="../assets/libs/jquery-validation/jquery.validate.min.js"></script>
        <script src="../assets/libs/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/dashboard.js"></script>
        <script src="../assets/js/auth.js"></script>
    ';
}
