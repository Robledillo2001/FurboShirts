<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Reservas Hotel</title>
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
<h1>Reservas Hotel</h1>
  <form action="" method="get">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"><br>
    <label for="nNoches">Nº Noches:</label>
    <input type="text" name="nNoches"><br>
    <label for="desayuno">Desayuno</label>
    <select name="desayuno" id="">
      <option value="Si">Si</option>
      <option value="No">No</option>
    </select><br>
    <button type="submit">ENVIAR</button>
  </form>
  
  <div class="resultado">
    <?php
      function gestionarReserva(string $nombre,int $noches,$desayunoIncluido=false){
        $precio=50*$noches;
          if($desayunoIncluido==true){
            $precio+=$noches*15;
            return "La reserva de $nombre sera de $precio € con desayuno. Precio por noche 50€";
          }else{
            return "La reserva de $nombre sera de $precio € sin desayuno Precio por noche 50€";
          }
      }

      if (isset($_GET['nombre'],$_GET['nNoches'],$_GET['desayuno'])) {
        $nombre=$_GET['nombre'];
        $noches=$_GET['nNoches'];
        $desayuno=strtolower(trim($_GET['desayuno']));
        $desayunoIncluido=true;

        if(is_numeric($noches)&&$nombre!=""){
          if($noches>0){
            if($desayuno=="si"){
              $resultado=gestionarReserva($nombre,$noches,$desayunoIncluido);
            }elseif($desayuno=="no"){
              $resultado=gestionarReserva($nombre,$noches);
            }
            echo $resultado;
          }else{
            echo "El nº de noches no puede ser $noches";
          }
        }else{
          echo "Se debe dar al nombre de la persona por habitacion";
        }
      }
    ?>
  </div>
</body>
</html>
