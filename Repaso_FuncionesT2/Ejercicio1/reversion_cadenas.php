<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      padding: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
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
    <form method="post">
        <label for="texto">Cadena</label>
        <input type="text" name="texto"><br>
        <button type="submit">Envair</button>
    </form>
  <div class="resultado">
    <?php
        function invertirCadena(string &$cadena){
            $reversa="";
            for($i=strlen($cadena)-1;$i>=0;$i--){
                $reversa.=$cadena[$i];
            }
            return $reversa;
        }
        if(isset($_POST['texto'])){
            $texto=$_POST['texto'];
            $resultado=invertirCadena($texto);
            echo "$resultado";
        }
    ?>

  </div>
</body>
</html>
