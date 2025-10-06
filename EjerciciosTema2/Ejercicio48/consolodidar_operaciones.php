<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Calculadora Global</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
  <style>
    form {
      text-align: justify;
      font-size: 23px;
    }
    h4{
        color:red;
        font-size: 25px;
    }
    .total{
        background-color: red;
        color: white;
        font-size: 30px;

    }
  </style>
</head>
<body>
  <?php
   function realizarOperacion($num1,$num2,$operacion){
    switch ($operacion) {
        case '+':
            $resultado = "<h4>El resultado de $num1 $operacion $num2 =  <b class='total'>" . ($num1 + $num2)."</b></h4>";
            break;
        case '-':
            $resultado = "<h4>El resultado de $num1 $operacion $num2 = <b class='total'>" . ($num1 - $num2)."</b></h4>";
            break;
        case '*':
            $resultado = "<h4>El resultado de $num1 $operacion $num2 = <b class='total'>" . ($num1 * $num2)."</b></h4>";
            break;
        case '/':
            if ($num2 == 0) {
                $resultado = "<h4>No se puede dividir entre 0";
            } else {
                $resultado = "<h4>El resultado de $num1 $operacion $num2 = <b class='total'>" . (floatval($num1) / floatval($num2))."</b></h4>";
            }
            break;
        case 'increment':
            $resultado = "<h4>El resultado de $num1 $operacion $num2 = <b class='total'>" . (++$num1).",".(++$num2)."</b></h4>";
            break;
        case 'decrement':
            $resultado = "<h4>El resultado de $num1 $operacion $num2 = <b class='total'>" . (--$num1).",".(--$num2)."</b></h4>";
            break;
        default:
            $resultado = "<h4>Operación no válida.</h4>";
            break;
    }
    echo $resultado;
   }
   realizarOperacion(10, 5, '+');
    echo "<br>";
    realizarOperacion(27, 8, '-');
    echo "<br>";
    realizarOperacion(21, 2, '*');
    echo "<br>";
    realizarOperacion(0, 5, '/');
    echo "<br>";
    realizarOperacion(2, 0, '/');
    echo "<br>";
    realizarOperacion(3, 8, 'increment');
    echo "<br>";
    realizarOperacion(0, 4, 'decrement');
    echo "<br>";
  ?>
</body>
</html>
