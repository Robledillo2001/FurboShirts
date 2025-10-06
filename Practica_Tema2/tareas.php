<?php
declare(strict_types=1);
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, redirigir al login
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Opciones para modificar datos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      padding: 20px;
    }
    a {
      margin: 10px;
      display: inline-block;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    a:hover {
      background-color: #45a049;
    }
    .resultado {
      margin-top: 20px;
      padding: 15px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 20px;
    }
  </style>
</head>
<body>
  <!--?php
    //echo "Hola ".$_SESSION['usuario'];
    ?>-->
  <h1>Opciones para modificar datos</h1>

  <!-- Menú de opciones -->
  <a href="añadir.php">Añadir</a>
  <a href="eliminar.php">Eliminar</a>
  <a href="mostrar.php">Mostrar</a>
  <a href="actualizar.php">Actualizar</a>
  <a href="consultar.php">Consultar</a>
  <a href="logout.php">Logout</a> <!-- Este enlace debe ir al script para cerrar sesión -->
</body>
</html>
