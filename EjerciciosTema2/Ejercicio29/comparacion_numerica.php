<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Diferencia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        $calificacion=85;
        if($calificacion>=90){
            echo "Excelente";
        }else if($calificacion>=70){
            echo "Aprobado";
        }else if($calificacion<=70){
            echo "Reporbado";
        }
    ?>
</body>
</html>
