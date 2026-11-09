<?php
// Layout para las páginas de acceso: inicio de sesión, registro y recuperación.
// Cada página incluye solo un layout, porque layoutInterno.php define funciones con los mismos nombres.

// Estilos: se llama dentro del head
function IncludeCSS()
{
    $versionCSS = filemtime($_SERVER['DOCUMENT_ROOT'] . '/KathsKitchen/View/assets/css/main.css');
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/libs/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/main.css?v=<?php echo $versionCSS; ?>">
<?php
}

// Scripts: se llama al final del body, antes de los scripts específicos de la página
function IncludeJS()
{
?>
    <script src="../assets/libs/jquery/jquery-3.7.1.min.js"></script>
    <script src="../assets/libs/jquery-validation/jquery.validate.min.js"></script>
    <script src="../assets/libs/jquery-validation/localization/messages_es.min.js"></script>
    <script src="../assets/libs/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/auth.js"></script>
<?php
}
