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
  </style>
</head>
<body>
  <?php
    // Inicializamos el resultado
    $resultado = "";

    // Función para realizar cálculos
    function calcularGlobal($num1, $num2, $operacion) {
        global $resultado; // Usamos la variable global $resultado
        switch ($operacion) {
            case '+':
                $resultado = "El resultado de $num1 $operacion $num2 = " . ($num1 + $num2);
                break;
            case '-':
                $resultado = "El resultado de $num1 $operacion $num2 = " . ($num1 - $num2);
                break;
            case '*':
                $resultado = "El resultado de $num1 $operacion $num2 = " . ($num1 * $num2);
                break;
            case '/':
                if ($num2 == 0) {
                    $resultado = "No se puede dividir entre 0";
                } else {
                    $resultado = "El resultado de $num1 $operacion $num2 = " . ($num1 / $num2);
                }
                break;
            default:
                $resultado = "Operación no válida.";
                break;
        }
    }

    // Ejecución de la función con diferentes operaciones
    calcularGlobal(10, 5, '+');
    echo "<p>$resultado</p>";

    calcularGlobal(27, 8, '-');
    echo "<p>$resultado</p>";

    calcularGlobal(21, 2, '*');
    echo "<p>$resultado</p>";

    calcularGlobal(0, 5, '/');
    echo "<p>$resultado</p>";

    calcularGlobal(2, 0, '/');
    echo "<p>$resultado</p>";
  ?>
</body>
</html>
