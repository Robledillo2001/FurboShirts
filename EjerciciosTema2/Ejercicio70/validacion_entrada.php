<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>While pares</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
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
  <form action="" method="post">
    <label for="num">Numero</label>
    <input type="text" name="num"><br><br>
    <button type="submit">Enviar</button>
  </form>
  <?php
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        $numero=$_POST['num'];
  
        if(is_numeric($numero)){
          do{
            if($numero<=0){
              echo"Error en el mensaje introduce un nº mayor a 0";
            }else{
              echo"Numero correcto: $numero";
            }
          }while($numero<=0);
          
        }
      }
    
  ?>
</body>
</html>
