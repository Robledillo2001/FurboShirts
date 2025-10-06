<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>VERIFICAR TIPO CON COSNTANTES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
        define("TEXTO","1234");
        define("NUMERO",1234);
        function compararValores($num,$text){
            echo "<H1>Comprobando si tienen el mismo valor<br></H1>";
            if($num==$text){
                echo "Tienen el mismo valor,";
                if($num===$text){
                    echo " y son del mismo tipo";
                }else{
                    echo " pero no son del mismo tipo";
                }
            }else{
                echo "No tienen el mismo valor";
            }
        }
        compararValores(NUMERO,TEXTO);
    ?>
</body>
</html>
