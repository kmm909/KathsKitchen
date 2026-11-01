<?php
// Layout para las páginas del panel: encabezado, menú lateral, contenido y footer.
// Cada página incluye solo un layout, porque layoutExterno.php define funciones con los mismos nombres.
// Panel de muestra sin sesión ni autenticación.

// Estilos: se llama dentro del head
function IncludeCSS()
{
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/libs/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
<?php
}

// Scripts: se llama al final del body, antes de los scripts específicos de la página
function IncludeJS()
{
?>
    <script src="../assets/libs/jquery/jquery-3.7.1.min.js"></script>
    <script src="../assets/libs/bootstrap/bootstrap.bundle.min.js"></script>
<?php
}

// Encabezado superior de la plantilla Kath's Kitchen
function MostrarHeader()
{
?>
    <header class="app-header">
        <div class="d-flex align-items-center gap-2">
            <button class="btn app-boton-menu d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral" aria-controls="menuLateral" aria-label="Abrir menú">
                <i class="bi bi-list"></i>
            </button>
            <span class="app-marca">Kath's Kitchen</span>
        </div>
        <div class="app-usuario">
            <i class="bi bi-person-circle me-1"></i>
            <span>Invitado</span>
        </div>
    </header>
<?php
}

// Menú lateral: en escritorio es fijo; en móvil se abre como panel deslizable
function MostrarSidebar()
{
?>
    <aside class="offcanvas-lg offcanvas-start app-sidebar" tabindex="-1" id="menuLateral" aria-labelledby="menuLateralTitulo">
        <div class="offcanvas-header d-lg-none">
            <h2 class="offcanvas-title h5" id="menuLateralTitulo">Menú</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column p-3">
            <nav class="nav flex-column gap-1">
                <a class="nav-link app-enlace active" href="home.php">
                    <i class="bi bi-house-door me-2"></i>Inicio
                </a>
            </nav>
            <a href="login.php" class="btn btn-outline-danger w-100 mt-auto">Volver al acceso</a>
        </div>
    </aside>
<?php
}

// Footer al final de la página
function MostrarFooter()
{
?>
    <footer class="app-footer">
        <small>&copy; <?php echo date('Y'); ?> Kath's Kitchen</small>
    </footer>
<?php
}
