<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Estado funcion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <?php
     function verificarEstado(){
        static $estado=false;
        if($estado==false){
            echo "Primera vez que llama a la funcion<br>";
            $estado=true;
        }else{
            echo "La funcion ya fue llamada previamente<br>";
        }
     }
     verificarEstado();
     verificarEstado();
  ?>
</body>
</html>
