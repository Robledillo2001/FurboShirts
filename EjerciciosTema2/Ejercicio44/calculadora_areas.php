<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Funcion_matematica</title>
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
    <label for="base">Base</label>
    <input type="text" name="base"><br>
    <label for="altua">Altura</label>
    <input type="text" name="altura"><br>
    <label for="radio">Radio</label>
    <input type="text" name="radio"><br>
    <button type="submit">Calcular</button>

  </form>
  <?php
      function areaCirculo($radio){
        $area=2*3.14*$radio;
        echo "Area del circulo=$area";
      }
      function areaRectangulo($base,$altura){
        $area=$base*$altura;
        echo "Area del rectangulo=$area";
      }

      if(isset($_GET['base'])&&isset($_GET['altura'])&&isset($_GET['radio'])){
        $radio=$_GET['radio'];
        $altura=$_GET['altura'];
        $base=$_GET['base'];

        areaCirculo($radio);
        echo "<br>";
        areaRectangulo($base,$altura);
        echo "<br>";
      }
  ?>
</body>
</html>
