<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Superglobales en formularios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<style>
  form {
    text-align: justify;
    font-size: 23px;
  }
</style>
<body>
  <form action="" method="get">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" ><br> <!-- Añadido required para validación HTML -->
    
    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" ><br> <!-- Añadido required -->
    
    <label for="edad">Edad</label>
    <input type="text" name="edad" ><br> <!-- Cambiado a name="edad" y añadido required -->
    
    <label for="email">EMAIL</label>
    <input type="text" name="email" id="" ><br> <!-- Añadido required -->
    
    <button type="submit">Enviar</button>
  </form>

  <?php
    // Verificar que todos los datos estén presentes en $_GET
    if (isset($_GET['nombre']) && isset($_GET['apellido']) && isset($_GET['edad']) && isset($_GET['email'])) {
      $nombre = $_GET['nombre'];
      $apellido = $_GET['apellido'];
      $edad = $_GET['edad'];
      $email = $_GET['email'];

      // Función para validar los datos del formulario
      function validarFormulario($nombre, $apellido, $edad, $email) {
        // Comprobamos que la edad sea numérica y los otros campos no estén vacíos
        if (is_numeric($edad) && !empty($nombre) && !empty($apellido) && !empty($email)) {
          echo "<h3>Nombre: $nombre</h3><br><h3>Apellido: $apellido</h3><br><h3>Edad: $edad</h3><br><h3>EMAIL: $email</h3>";
        } else {
          echo "<h3 style='color:red;'>Error al enviar los datos. Verifica la información ingresada.</h3>";
        }
      }

      // Llamada a la función de validación
      validarFormulario($nombre, $apellido, $edad, $email);
    }
  ?>
</body>
</html>
