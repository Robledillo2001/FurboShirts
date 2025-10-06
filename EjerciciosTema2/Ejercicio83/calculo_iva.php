<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>IVA!!!!!!!!!!!!!!!!!!!!!!!</title>
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
  <h1>Calcular IVA</h1>
  <form action="" method="get">
    <label for="precio">Ingresa precio</label>
    <input type="text" name="precio" ><br>
    <label for="iva">IVA!!!:</label>
    <input type="text" name="iva"><br>
    <button type="submit">CALCULAR!!!</button>
  </form>
  
  <div class="resultado">
    <?php
      function conversionIva($precio,$IVA=21){
        $precio = floatval($precio);
        $IVA = floatval($IVA);
        if ($precio <= 0 || $IVA < 0) {
          return "Error: Precio debe ser mayor que 0 y el IVA no puede ser negativo.";
        }
       $IVA=$IVA/100;
       $total=$precio+($precio*$IVA);
       return "El total del producto de $precio € con el IVA de $IVA es de $total €";
      }

      if(isset($_GET['precio'])&&isset($_GET['iva'])){
        if($_GET['iva']==""){
          $resultado=conversionIva($_GET['precio']);
        }else{
          $resultado=conversionIva($_GET['precio'],$_GET['iva']);
        }
        echo$resultado;
      }
    ?>
  </div>
</body>
</html>
