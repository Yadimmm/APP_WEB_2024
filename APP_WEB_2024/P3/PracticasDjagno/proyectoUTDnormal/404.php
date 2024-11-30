<?php
// Establecer encabezado 404
http_response_code(404);

// Mostrar un mensaje o redirigir al inicio
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Página no encontrada</title>
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
    <header>
        <h1>Error 404</h1>
    </header>
    <main>
        <p>La página que buscas no existe. Haz clic <a href="/index.php">aquí</a> para regresar al inicio.</p>
    </main>
    <footer>
        <p>PHP Proyecto Web &copy; 2024</p>
    </footer>
</body>
</html>
