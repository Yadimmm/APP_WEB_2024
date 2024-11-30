<?php
include("conexion.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") { //si el método fue post entonces 
    // obtengo los datos del formulario
    $username = mysqli_real_escape_string($conexion, $_POST['username']);
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $password = mysqli_real_escape_string($conexion, $_POST['password']); //ojo, que tiene que ser el name igual
    $confirmar_pass = $_POST['confirmar_pass'];

    // Validar si las contraseñas coinciden
    if ($password !== $confirmar_pass) {
         $mensaje = "Las contraseñas no coinciden. Por favor, intenta nuevamente.";
    } else {
        // Validar campos vacíos
        if (empty($username) || empty($password)) {
            $mensaje = "Todos los campos son obligatorios.";
        } else {
            // Encriptar la contraseña
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);

            // Insertar en la base de datos
            $sql = "INSERT INTO usuarios (username, nombre, apellidos, correo, passwordd, privilegio) VALUES ('$username', '$nombre', '$apellidos', '$correo', '$password_hashed', 'usuario')";
            //insertamos una pass encriptada para mejor seguridad eeeh
            if (mysqli_query($conexion, $sql)) {
                $mensajee = "Registro exitoso. Ahora puedes iniciar sesión.";
            } else {
                $mensaje = "Error al registrar: " . mysqli_error($conexion);
            }
        }

    }

    
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Registro|PHP Proyecto UTD
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
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="login.php">Iniciar Sesión</a></li>
            <li><a href="registro.php">Registro</a></li>

        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Registrarse</h1>
            
            <hr>
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

            <form method="POST" action="registro.php">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="correo">Correo Electrónico</label>
            <input type="email" id="correo" name="correo" required><br>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="apellidos">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" required><br>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="confirmar_contraseña">Confirmar Contraseña:</label>
            <input type="password" id="confirmar_pass" name="confirmar_pass" required><br>

            <button type="submit">Registrarse</button>
        </form>

           
       </div>
    </section>
    <footer>
        <p>Curso de PHP con YADIMMMLINE &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>