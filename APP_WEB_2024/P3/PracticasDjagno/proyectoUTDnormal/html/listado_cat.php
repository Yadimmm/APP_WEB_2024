<?php
header('Content-Type: text/html; charset=utf-8');
require_once '../php/conexion.php';

// categorias
$sql = "SELECT descripcion, titulo, fecha FROM categoria";
$result = $conexion->query($sql);

?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Categorias|PHP Proyecto UTD
    </title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen Django" title="Django">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php" >Inicio</a></li>
            <li><a href="mision.html">Mision</a></li>
            <li><a href="vision.html">Vision</a></li>
            <li><a href="about.html">Acerca de </a></li>
            <li><a href="listado_art.php">Articulos</a></li>
            <li><a href="listado_cat.php">Categorias</a></li>
            <li><a href="../php/logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1 class="title">Listado de Categorias</h1>
            <hr>
            <h1 align="center">Listado</h1> <hr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <article class="article-item">
                        <div class="data">
                            <h2><?= htmlspecialchars($row['titulo']) ?></h2>
                            <p>Descripción: <?= htmlspecialchars($row['descripcion']) ?></p>
                            <span class="date">
                                <?= htmlspecialchars($row['fecha']) ?>
                            </span>
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
       </div>
    </section>
   
    <footer>
        <p>Curso de PHP con YADIMMMLINE &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>