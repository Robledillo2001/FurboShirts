<?php
  if(isset($_POST['num1'])&& isset($_POST['num2'])&& isset($_POST['operador'])){
    $num1=(float)$_POST['num1'];
    $num2=(float)$_POST['num2'];
    $operador=$_POST['operador'];

    switch($operador) {
      case '+':
        $resultado = $num1 + $num2;
      break;
      case '-':
        $resultado = $num1 - $num2;
      break;
      case '*':
        $resultado = $num1 * $num2;
      break;
      case '/':
        if($num2 != 0) {
          $resultado = $num1 / $num2;
        } else {
          $resultado = "No se puede dividir entre 0";
        }
      break;
      default:
        $resultado = "Operador no válido.";
    }

    echo "<h2>$num1 $operador $num2 = <b>$resultado</b></h2>";
  }
?>