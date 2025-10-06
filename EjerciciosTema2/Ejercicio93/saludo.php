<?php
  declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Saludo en PHP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      padding: 20px;
    }
    form {
      margin-bottom: 20px;
      font-size: 23px;
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
<h1>Saludo en PHP</h1>
  <form action="" method="get">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"><br>
    <label for="saludo">Saludo:</label>
    <input type="text" name="saludo"><br>
    <button type="submit">SALUDAR!!!</button>
  </form>
  
  <div class="resultado">
    <?php
      function saludar(string $nombre,string $saludo="Hola"):string{
        return "$saludo $nombre";
      }

      if (isset($_GET['nombre'],$_GET['saludo'])) {
        // Convertir los parámetros a valores flotantes y validar
        $nombre = $_GET['nombre'];
        $saludo=$_GET['saludo'];
        $cadena="";
        if($nombre!=""){
          if($saludo==""){
            $cadena= saludar($nombre);
           }elseif($saludo!=""){
             $cadena=saludar($nombre,$saludo);
           }
        }else{
          $cadena="El nombre no puede estar VACIO!!!!";
        }
        echo $cadena;
      }
    ?>
  </div>
</body>
</html>
