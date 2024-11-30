<?php
header('Content-Type: text/html; charset=utf-8');
require_once '../php/conexion.php';

// Obtener información de los artículos en orden descendente por fecha
$sql = "SELECT titulo, descripcion, pu, cantidad, archivo, id_categoria, usuario, fecha 
        FROM articulos 
        ORDER BY fecha DESC";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos | PHP Proyecto UTD</title>
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
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="mision.html">Misión</a></li>
            <li><a href="vision.html">Visión</a></li>
            <li><a href="about.html">Acerca de</a></li>
            <li><a href="listado_art.php">Artículos</a></li>
            <li><a href="listado_cat.php">Categorías</a></li>
            <li><a href="../php/logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <section id="content">
       <div class="box">
        <h1 class="title">Listado de Artículos</h1>
        <hr>
        <h1 align="center">Listado</h1>
        <hr>

        <?php if ($result->num_rows > 0): //si hay resultados ?> 
            <?php while ($row = $result->fetch_assoc()): //un ciclo según los resultados obtenidos ?>
                <?php 
                    $categoria = $row['id_categoria']; //variable que guarda el id de la cate
                    $autor = $row['usuario']; //el usuario

                    // obtener el nombre de la categoría
                    $sql2 = "SELECT titulo FROM categoria WHERE id = $categoria";
                    $result1 = $conexion->query($sql2);
                    if ($result1->num_rows > 0) {
                        $row1 = $result1->fetch_assoc();
                        $categoria_titulo = $row1['titulo'];
                    } 
                    // Obtener el nombre de usuario (autor)
                    $sql3 = "SELECT username FROM usuarios WHERE id = $autor";
                    $result3 = $conexion->query($sql3);
                    if ($result3->num_rows > 0) {
                        $row2 = $result3->fetch_assoc();
                        $autor_nombre = $row2['username'];
                    }
                ?>
                <article class="article-item">
                    <div>
                        <img src="../img/<?= htmlspecialchars($row['archivo']) ?>" alt="Imagen del artículo" />
                    </div>
                    <div class="data">
                        <h2><?= htmlspecialchars($row['titulo']) ?></h2>
                        <p>Descripción: <?= htmlspecialchars($row['descripcion']) ?></p>
                        <p>Categoría: <?= htmlspecialchars($categoria_titulo) ?></p>
                        <p>Precio Unitario: <?= htmlspecialchars($row['pu']) ?> </p>
                        <p>Cantidad: <?= htmlspecialchars($row['cantidad']) ?></p>
                        <span class="date">
                            <?= htmlspecialchars($autor_nombre) ?>
                            <br />
                            <?= htmlspecialchars($row['fecha']) ?>
                        </span>
                        <hr>
                    </div>
                    <div class="clearfix"></div>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No se encontraron artículos. Regrese pronto y si no hay pues caímos en mi mayor miedo: LA POBREZA</p>
        <?php endif; ?>
       </div>
    </section>

    <footer>
        <p>Curso de PHP con YADIMMMLINE &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>
