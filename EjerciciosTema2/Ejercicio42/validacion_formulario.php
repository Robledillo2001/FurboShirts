<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Validacion Formulario</title>
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
  <form method="get">
    <label for="num1">Numero1</label>
    <input type="text" name="num1"><br>
    <label for="num2">Numero2</label>
    <input type="text" name="num2"><br>
    <input type="submit" value="Validar y sumar">
  </form>
  <?php
  if(isset($_GET['num1'])&&isset($_GET['num2'])){
    $num1=$_GET['num1'];
    $num2=$_GET['num2'];

    function validarNumeros($n1,$n2){
      return is_numeric($n1) && is_numeric($n2);
    }
    if(validarNumeros($num1,$num2)){
      $resultado=$num1+$num2;
    }else{
      $resultado="No son numeros y no se puede sumar";
    }
    echo "$num1+$num2=$resultado";
  }
  ?>
</body>
</html>
