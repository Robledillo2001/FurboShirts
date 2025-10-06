<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Comparacion Strings</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        $cadena1="PHP";
        $cadena2="php";

        $resultado=strcmp($cadena1,$cadena2);
        if($resultado==0){
            echo $cadena1."=".$cadena2."--> $resultado";
        }else{
            echo $cadena1." no igual a ".$cadena2."--> $resultado";
        }
        echo "<br>";
        $resultado2=strcasecmp($cadena1,$cadena2);
        if($resultado2==0){
            echo $cadena1."=".$cadena2."--> $resultado2";
        }else{
            echo $cadena1." no igual a ".$cadena2."--> $resultado2";
        }
    ?>
</body>
</html>
