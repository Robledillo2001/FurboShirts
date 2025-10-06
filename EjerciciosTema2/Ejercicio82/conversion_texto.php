<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Conversion de texto</title>
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
  <h1>Juego de Adivinanza Infinito</h1>
  <form action="" method="get">
    <label for="texto">Ingresa un texti</label>
    <input type="text" name="texto" ><br>
    <label for="tipo">Convierte el texto</label>
    <select name="tipo" id="">
      <option value="minusculas">minusculas</option>
      <option value="mayusculas">mayusculas</option>
      <option value="capitalizacion">capitalizacion</option>
    </select><br>
    <button type="submit">Convertir Texto!!!</button>
  </form>
  
  <div class="resultado">
    <?php
      function conversionTexto($texto,$conversion){
        switch($conversion){
          case 'minusculas':
            return strtolower($texto);
            break;
          case 'mayusculas':
            return strtoupper($texto);
            break;
          case 'capitalizacion':
            return ucwords($texto);
            break;
          default:
            return "ERROR EN LA CONVERSION";
          exit;
        }
      }

      if(isset($_GET['texto'])&&isset($_GET['tipo'])){
        $resultado=conversionTexto($_GET['texto'],$_GET['tipo']);
        echo$resultado;
      }
    ?>
  </div>
</body>
</html>
