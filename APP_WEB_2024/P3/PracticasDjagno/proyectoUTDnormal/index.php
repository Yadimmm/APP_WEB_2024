<?php
session_start();

// Verificar si el usuario está logueado
if (isset($_SESSION['username'])) {
    // Mostrar el mensaje de bienvenida solo la primera vez
    if (!isset($_SESSION['mensaje_mostrado'])) { // Usar una variable de control
        $mensajee = "Welcome to my project,haz iniciado sesión correctamente";
        $_SESSION['mensaje_mostrado'] = true; // Marcar que el mensaje ya se mostró
    } else {
        $mensajee = ""; // No mostrar mensaje si ya se mostró
    }
} else {
    $mensajee = ""; // No hay mensaje si no está logueado
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="img/logophp.png" alt="Imagen Django" title="Django">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="html/mision.html">Misión</a></li>
                <li><a href="html/vision.html">Visión</a></li>
                <li><a href="html/about.html">Acerca de</a></li>
                <li><a href="html/listado_art.php">Artículos</a></li>
                <li><a href="html/listado_cat.php">Categorías</a></li>
                <li><a href="php/logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="php/login.php">Iniciar Sesión</a></li>
                <li><a href="php/registro.php">Registro</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <?php if (isset($_SESSION['username'])): ?>
                <h1>Inicio</h1>
                <hr>
                <!-- Mostrar mensaje de bienvenida si está definido -->
                <?php if (!empty($mensajee)): ?>
                    <div class="alert alert-success">
                        <p><?php echo $mensajee; ?></p> 
                    </div>
                <?php endif; ?>
                <p>.:: ¡Bienvenid@ <?php echo $_SESSION['username']; ?> a la página de Inicio! ::.</p>
            <?php else: ?>
                <h1>Inicio</h1>
                <hr>
                <p>Por favor inicie sesión....</p>
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>PHP con YADIMMMLINE &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>
