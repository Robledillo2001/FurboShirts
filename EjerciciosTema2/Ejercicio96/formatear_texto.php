<?php
  declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Conversion Texto</title>
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
<h1>Conversión de Texto</h1>
  <form action="" method="get">
    <label for="texto">Texto 1:</label>
    <input type="text" name="texto1"><br>
    <label for="texto2">Texto 2:</label>
    <input type="text" name="texto2"><br>
    <label for="texto3">Texto 3:</label>
    <input type="text" name="texto3"><br>
    <select name="estilo" id="">
      <option value="">Seleccionar Opción</option>
      <option value="negrita">Negrita</option>
      <option value="cursiva">Cursiva</option>
      <option value="subrayado">Subrayado</option>
    </select>
    <button type="submit">ENVIAR</button>
  </form>
  
  <div class="resultado">
    <?php
      
      if (isset($_GET['texto1'], $_GET['texto2'], $_GET['texto3'], $_GET['estilo'])) {
        // Asignar valores de los parámetros
        $texto1 = $_GET['texto1'];
        $texto2 = $_GET['texto2'];
        $texto3 = $_GET['texto3'];
        $estilo = $_GET['estilo'];

        // Verificar que ningún campo esté vacío
        if ($estilo !== "" && $texto1 !== "" && $texto2 !== "" && $texto3 !== "") {
          // Llamar a la función formatearTexto y mostrar el resultado
          $resultado = formatearTexto($estilo, $texto1, $texto2, $texto3);
          echo $resultado;
        } else {
          echo "Ningún parámetro puede estar vacío, por favor vuelve a enviarlo.";
        }
      }

      function formatearTexto(string $estilo,string $t1,string $t2,string $t3):string{
       if($estilo=='negrita'){
        return "<b><h1>$t1</h1><br><h1>$t2</h1><br><h1>$t3</h1></b>";
       }elseif($estilo=='cursiva'){
        return "<i><h1>$t1</h1><br><h1>$t2</h1><br><h1>$t3</h1></i>";
       }elseif($estilo=='subrayado'){
        return "<u><h1>$t1</h1><br><h1>$t2</h1><br><h1>$t3</h1></u>";
       }
      }
    ?>
  </div>
</body>
</html>
