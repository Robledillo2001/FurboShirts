<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Lista de la compra</title>
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
  <h1>Adivinar numero</h1>
  <form method="POST">
    <label for="numero">Numero del 1-10:</label>
    <input type="text" id="numero" name="numero"><br>
    <button type="submit">Adivinar</button>
  </form>
  
  <div class="resultado">
    <?php
      session_start();
      if(!isset($_SESSION['aleatorio'])){
        $_SESSION['aleatorio']=round(rand(1,10),2);
      }

      if(!isset($_SESSION["intentos"])){
        $_SESSION["intentos"]=0;
      }

      if(isset($_POST['numero'])){
        $numero=$_POST['numero'];

        if(is_numeric($numero)&&$numero<=10&&$numero>0){
          if($numero==$_SESSION['aleatorio']){
            echo "Has adivinado el numero era el $numero";
            $_SESSION['intentos']++;
          }else{
            echo "No se ha podido adivinar el numero";
            $_SESSION['intentos']++;
          }
          echo"<br> Intentos ".$_SESSION['intentos'];
        }else{
          echo "Debes escribir un numero del 1 al amigo";
        }
      }
    ?>
  </div>
</body>
</html>
