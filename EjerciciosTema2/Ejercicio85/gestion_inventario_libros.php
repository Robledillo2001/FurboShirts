<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>LIBRERUA</title>
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
  <h1>Inventario de Libros</h1>
  <form action="" method="get">
    <label for="inventario">Inventario Inicial</label>
    <input type="text" name="inventario" ><br>
    <label for="libro">Nº LIBROS</label>
    <input type="text" name="libro"><br>
    <button type="submit">GESTIONAR!!!</button>
  </form>
  
  <div class="resultado">
    <?php
      function cantidadLibros(&$inventario,&$librosAgregar){
        $inventario+=$librosAgregar;
      }

      if(isset($_GET['inventario'])&&isset($_GET['libro'])){
        $inventario=$_GET['inventario'];
        $librosAgregar=$_GET['libro'];

        if(is_numeric($inventario)&&is_numeric($librosAgregar)){
          cantidadLibros($inventario,$librosAgregar);
          echo"Inventario actualizado: $inventario";
        }else{
          echo"No se puede actualizar con mas de numeros";
        }

      }
    ?>
  </div>
</body>
</html>
