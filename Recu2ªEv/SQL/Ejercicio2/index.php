<html>
    <head>
        <title>MySQLi</title>
    </head>
    <body>
        <form method="post">
            <label for="id_usuario">ID Usuario</label>
            <input type="text" name="id_usuario"><br>
            <button type="submit">Ver Prestamos</button>
        </form>
    </body>
</html>


<?php
    if(isset($_POST['id_usuario'])){
        $user=$_POST['id_usuario'];

        try{
            $conexion = new PDO("mysql:host=localhost;dbname=biblioteca", "root", "");//Iniciar PDO
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Poner atributo error del pdo y excepciones
            $conexion->exec("SET CHARACTER SET utf8");//POner caracter utf8

            $sql="SELECT * FROM prestamos WHERE id_usuario=?";
            $stmt=$conexion->prepare($sql);//Preparar consulta

            $stmt->execute([$user]);//Ejecutar consulta Array

            $filas=$stmt->fetchAll(PDO::FETCH_ASSOC);//Array de la consulta
            echo "<table border='1'>
                    <tr>
                        <td>ID PRESTAMO</td>
                        <td>ID LIBRO</td>
                        <td>FECHA PRESTAMO</td>
                    </tr>
                ";
            
            foreach($filas as $fila){//Recorrer array en un foreach
                echo "<tr>
                        <td>".$fila['id_prestamo']."</td>
                        <td>".$fila['id_libro']."</td>
                        <td>".$fila['fecha_prestamo']."</td>
                    </tr>";//Se imprime cada fila con el nombre de la posicion
            }
            echo "</table>";
        }catch(PDOException $e){//Si hay algun error se mostrara en el catch
            die("Error en la BSD: ".$e->getMessage());
        }
    }
?>