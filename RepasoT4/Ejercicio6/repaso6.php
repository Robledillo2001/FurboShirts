<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo PROCEDIMENTAL</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <?php
        $conexion=mysqli_connect("localhost","root","","curso_php");//Metodo procedimental para conectar una BSD

        if(!$conexion){
            die("Error de coenxion: ".mysqli_connect_error());//Mensaje de error
        }

        $sql="INSERT INTO usuarios(ID,USUARIO,EMAIL) VALUES(3,'PEPE','PEPE@GAMIL.ES')";
        
        $resultado=mysqli_query($conexion,$sql);//Pasamos la consulta y la conexion 
        if($resultado){//Si la inserccion se hizo bien se mostrara que se inserto el usuario
            echo "Usuario insertado";
        }else{
            echo"Error en la isnerccion";
        }
        $sql="SELECT * FROM usuarios";
        $resultado=mysqli_query($conexion,$sql);

        if(mysqli_num_rows($resultado)>0){//Si hay mas de 0 filas en la consulta 
            while($fila=mysqli_fetch_assoc($resultado)){//Nos creara una lista con todas las filas
                echo "<ul>
                        <li>ID USUARIO: " . $fila['ID'] . "</li>
                        <li>NOMBRE USUARIO: " . $fila['USUARIO'] . "</li>
                        <li>EMAIL: " . $fila['EMAIL'] . "</li>
                      </ul>";//las filas se crean como array asociativos
            }
        }else{
            echo "No se encuentran resultados";
        }
    ?>
</body>
</html>