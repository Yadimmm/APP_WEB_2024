<?php
    session_start();


if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $us=$_POST['username'];
    $ps=$_POST['password'];

    include_once("conexion.php");

    // Consulta a la base de datos para buscar al usuario.
    $sql = "select * from usuarios where username = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $us);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica si se encontró al usuario.
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Extrae los datos del usuario.
        // Verifica la contraseña.
        if (password_verify($ps, $user['passwordd'])) {
            // Inicia sesión y guarda los datos del usuario en la sesión.
            $_SESSION['username'] = $user['username'];
            $_SESSION['privilegio'] = $user['privilegio']; // Guarda el privilegio del usuario (opcional).

            // Redirige al índice o a la página de inicio.
            header("Location: ../index.php"); // Asegúrate de que la ruta sea la correcta
            exit();
        } else {
            $mensaje = "Contraseña incorrecta.";
        }
    } else {
        $mensaje = "Usuario no encontrado.";
    }
    $stmt->close();
}


   
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Inicio Sesion|PHP Proyecto UTD
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
            <!-- Opciones visibles solo si el usuario está logueado -->
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="../html/mision.html">Misión</a></li>
                <li><a href="../html/vision.html">Visión</a></li>
                <li><a href="../html/about.html">Acerca de</a></li>
                <li><a href="../html/listado_art.php">Articulos</a></li>
                <li><a href="../html/listado_cat.php">Categorias</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>

            <?php else: ?>
                <!-- Opciones visibles solo si el usuario NO está logueado -->
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
                <li><a href="registro.php">Registro</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Iniciar Sesion</h1> 
            <hr><br>
            <?php if (!empty($mensaje)): ?>
                <div class="alert alert-warning">
                    <p><?php echo $mensaje; ?></p> 
                </div>
            <?php endif; ?>
            <?php if (!empty($mensajee)): ?>
                <div class="alert alert-success">
                    <p><?php echo $mensajee; ?></p> 
                </div>
            <?php endif; ?>
            <br>
            <form method="POST">
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username" autofocus required><br>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required><br>

                <input type="submit" value="Entrar" name="entrar">
                <input type="reset" value="Borrar" name="borrar">
                          
            </form>
           
       </div>
    </section>
    <footer>
        <p>Curso de PHP con YADIMMMLINE &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>