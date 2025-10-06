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
       $usuario="admin";
       define("USUARIO","ADMIN");
       function verificarUsuario(){
        global $usuario;
          if(strcasecmp(USUARIO,$usuario)==0){
            echo "Usuario correcto";
          }else{
            echo "Usuario incorrecto";
          }
       }
       verificarUsuario();
    ?>
</body>
</html>
