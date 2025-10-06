<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo BSD POO</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="POST">
        <label for="id">Id Usuario</label>
        <input type="text"name="id"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        $conexion=new mysqli("localhost","root","","curso_php");//Llamamos al objeto mysqli

        if($conexion->connect_error){
            die("Fallo en la conexion: ".$conexion->connect_error);//Mensaje de error
        }

        $conexion->set_charset("utf8");

        if(isset($_POST['id'])){
            $sql="DELETE FROM usuarios WHERE ID={$_POST['id']}";
            $resultado=$conexion->query($sql);//Llamamos al metodo de llamar consultas

            if($resultado){
                echo "Fila eliminada";
            }else{
                echo"Error";
            }
            $sql="SELECT * FROM usuarios";
            $resultado=$conexion->query($sql);

            if($resultado->num_rows>0){//Si hay filas escribira por pantalla la tabla
                while($fila=$resultado->fetch_assoc()){//Mientras haya resultados en la tabla los imprimira
                    echo "<ul>
                        <li>ID USUARIO: " . $fila['ID'] . "</li>
                        <li>NOMBRE USUARIO: " . $fila['USUARIO'] . "</li>
                        <li>EMAIL: " . $fila['EMAIL'] . "</li>
                      </ul>";//las filas se crean como array asociativos
                }
            }
        }
    ?>
</body>
</html>