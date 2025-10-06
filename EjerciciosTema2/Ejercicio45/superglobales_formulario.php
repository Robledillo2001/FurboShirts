<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Superglobales en formularios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<style>
  form{
    text-align: justify;
    font-size: 23px;
  }
</style>
<body>
  <form action="" method="get">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"><br>
    <label for="apellido">Apellido</label>
    <input type="text" name="apellido"><br>
    <label for="email">EMAIL</label>
    <input type="text" name="email" id=""><br>
    <button type="submit">Enviar</button>
  </form>
  <?php
      if(isset($_GET['nombre'])&&isset($_GET['apellido'])&&isset($_GET['email'])){
        $nombre=$_GET['nombre'];
        $apellido=$_GET['apellido'];
        $email=$_GET['email'];
        echo "<h3> Nombre:$nombre</h3><br><h3> Apellido:$apellido</h3><br><h3> EMAIL:$email</h3>";
      }
  ?>
</body>
</html>
