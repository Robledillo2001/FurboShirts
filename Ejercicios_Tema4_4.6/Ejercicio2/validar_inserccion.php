<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Comentarios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <a href="formulario_inserccion.php">Volver</a><br>
  <?php
    $user = "root";
    $pass = "";
    $red = "localhost";
    $BaseDatos = "curso_php";

    // Conectar a la base de datos
    $conexion = @mysqli_connect($red, $user, $pass, $BaseDatos);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    if (isset($_POST['nombre'], $_POST['email'])) {
        $nombre = mysqli_real_escape_string($conexion, trim($_POST['nombre']));
        $email = mysqli_real_escape_string($conexion, trim($_POST['email']));

        // Validar campos vacíos
        if (empty($nombre) || empty($email)) {
            die("Error: Los campos no deben estar vacíos.");
        }

        // Verificar si el email ya existe en la base de datos
        $verificarEmail = "SELECT * FROM usuarios WHERE EMAIL = '$email'";
        $resultado = @mysqli_query($conexion, $verificarEmail);

        if (mysqli_num_rows($resultado) > 0) {
            die("Error: El correo ya está registrado.");
        } else {
            // Insertar datos en la tabla
            $insertar = "INSERT INTO usuarios (USUARIO, EMAIL) VALUES ('$nombre', '$email')";
            $consulta = @mysqli_query($conexion, $insertar);

            if ($consulta) {
                echo "Usuario registrado con éxito.";
            } else {
                die("Error al insertar datos: " . mysqli_error($conexion));
            }
        }
    } else {
        echo "Error: No se recibieron datos del formulario.";
    }

    // Cerrar conexión
    mysqli_close($conexion);
  ?>
</body>
</html>
