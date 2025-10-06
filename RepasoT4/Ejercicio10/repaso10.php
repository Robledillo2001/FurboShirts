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
        <label for="user">Usuario: </label>
        <input type="text"name="user"><br>
        <label for="email">Email: </label>
        <input type="text"name="email"><br>
        <label for="contador">Contador: </label>
        <input type="number"name="contador"><br>
        <button type="submit">Insertar</button>
    </form>
    <?php
        $conexion=mysqli_connect("localhost","root","","curso_php");//Llamamos al objeto mysqli

        if(!$conexion){
            die("Fallo en la conexion: ".mysqli_connect_error());//Mensaje de error
        }

        $conexion->set_charset("utf8");

        if(isset($_POST['user'],$_POST['email'],$_POST['contador'])){
            $sql="INSERT INTO usuarios(USUARIO,EMAIL) VALUES(?,?)";
            $stmt=mysqli_prepare($conexion,$sql);//Llamamos al metodo de llamar consultas preparadas
            $cantidad=$_POST['contador'];
            for($i=0;$i<$cantidad;$i++){
                $nombreUser=$_POST['user']." ".$i+1;
                mysqli_stmt_bind_param($stmt,"ss",$nombreUser,$_POST['email']);
                $resultado=mysqli_stmt_execute($stmt);
            }

            if($stmt){
                echo "Filas insertadas";
            }else{
                echo"Error";
            }
        }
    ?>
</body>
</html>