<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Números Pares</title>
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
  <form action="" method="get">
    <label for="precio">Precio:</label>
    <input type="text" name="precio"><br>
    <label for="tipo">Tipo de proe¡ducto:</label>
    <input type="text" name="tipo"><br>
    <button type="submit">Calcular</button>
  </form>
  
  <div class="resultado">
    <?php
      if (isset($_GET['precio'])&&isset($_GET['tipo'])) {
        $precio = $_GET['precio'];
        $tipoProducto=$_GET['tipo'];
        $descuento=0;
        $precioFinal=0;
        
        // Verificar si la entrada es numérica
        if (is_numeric($precio)) {
          switch($tipoProducto){
            case 'Alientacion':
              $descuento=0.05;
              break;
            case 'Ropa':
              $descuento=0.10;
              break;
            case 'Electronica':
              $descuento=0.20;
              break;
            default:
              echo "Tipo de producto no válido.";
            exit;
          }
          $contador=1;
          while($contador<=5){
            $impuesto=$precio*$descuento;
            $total=$precio+$impuesto;

            $precioFinal+=$total;
            $contador++;
          }
          echo"<h2>El total de los 5 productos de $precio € con el impuesto de $descuento es de $precioFinal €</h2>";
        } else {
          echo"<h2>Inserte un numero</h2>";
        }
      }
    ?>
  </div>
</body>
</html>
