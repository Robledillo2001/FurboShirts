<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>ReversionCadena</title>
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
  <h1>ReversionCadena</h1>
  <form action="" method="get">
    <label for="cadena">Cadena:</label>
    <input type="text" name="cadena" ><br>
    <button type="submit">Enviar</button>
  </form>
  
  <div class="resultado">
    <?php
      function ReversionCadena($cadena){
        $resultado="";
        for($i=strlen($cadena)-1;$i>=0;$i--){
          $resultado.=$cadena[$i];
        }
        return $resultado;
      }

      if(isset($_GET['cadena'])){
        $cadena=$_GET['cadena'];
        
        echo "Cadena antes $cadena<br>";
        $cadenaRevertida=ReversionCadena($cadena);
        echo "Cadena Despues $cadenaRevertida<br>";
      }
    ?>
  </div>
</body>
</html>
