<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Include y cosas magicas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
       function incrementar($valor){
        $valor++;
        echo $valor."<br>";
       }
       incrementar(3);
       incrementar(10);
       incrementar(21);
    ?>
</body>
</html>
