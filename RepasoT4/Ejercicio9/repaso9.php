<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo BSD POO statement</title>
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
            $sql="DELETE FROM usuarios WHERE ID=?";
            $stmt=$conexion->prepare($sql);//Llamamos al metodo de llamar consultas preparadas

            $stmt->bind_param("i",$_POST['id']);//Enviamos el valor del marcador de la consulta

            $stmt->execute();//Ejecutamos la conuslta preparada

            if($stmt){
                echo "Fila eliminada";
            }else{
                echo"Error";
            }
            $sql="SELECT * FROM usuarios WHERE ID=?";
            $stmt=$conexion->prepare($sql);

            $ID=2;
            $stmt->bind_param("i",$ID);

            $stmt->execute();

            $resultado=$stmt->get_result();//Array asociativo
            if($resultado->num_rows>0){
                while($fila=$resultado->fetch_assoc()){
                    echo "<ul>
                    <li>ID USUARIO: " . $fila['ID'] . "</li>
                    <li>NOMBRE USUARIO: " . $fila['USUARIO'] . "</li>
                    <li>EMAIL: " . $fila['EMAIL'] . "</li>
                  </ul>";//las filas se crean como array asociativos
                }
            }else{
                echo"No se encuentra usuario";
            }
        }
    ?>
</body>
</html>