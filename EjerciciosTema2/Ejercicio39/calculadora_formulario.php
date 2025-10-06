<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Calculadora Formulario</title>
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
  <!-- Formulario para la calculadora -->
  <form method="GET" action="">
    <label for="num1">Numero1</label>
    <input type="text" name="num1" placeholder="Número 1" required><br>
    <label for="num2">Numero2</label>
    <input type="text" name="num2" placeholder="Número 2" required><br>
    <label for="operador">Operador</label>
    <select name="operador" required>
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select><br>
    <button type="submit">Calcular</button>
  </form>

  <?php
  // Verificar si los datos fueron enviados
  if (isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operador'])) {
    // Obtener los valores del formulario
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $operador = $_GET['operador'];

    // Realizar la operación seleccionada
    switch ($operador) {
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
        // Comprobar si num2 es diferente de cero antes de dividir
        if ($num2 != 0) {
          $resultado = $num1 / $num2;
        } else {
          $resultado = "Error: División por cero no permitida.";
        }
        break;
      default:
        $resultado = "Operador no válido.";
    }

    // Mostrar el resultado
    echo "<h2>$num1 + $num2 = $resultado</h2>";
  }
  ?>
</body>
</html>
