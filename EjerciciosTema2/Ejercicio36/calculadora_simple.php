<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Include y cosas magicas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
       function calcularoda($num1,$num2,$operacion){
        switch($operacion){
          case "+":
            $total=$num1+$num2;
            echo "El total de la operacion es de $total";
          break;
          case "-":
            $total=$num1-$num2;
            echo "El total de la operacion es de $total";
          break;
          case "*":
            $total=$num1*$num2;
            echo "El total de la operacion es de $total";
          break;
          case "/":
            if($num2==0){
              echo "No se puede dividir entre 0";
            }else{
              $total=$num1/$num2;
              echo "El total de la operacion es de $total";
            }
          break;
        }
       }
       calcularoda(6,100,"/");
    ?>
</body>
</html>
