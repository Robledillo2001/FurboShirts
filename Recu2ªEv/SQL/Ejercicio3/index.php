<html>
    <head>
        <title>MySQLi</title>
    </head>
    <body>
        <form method="post">
            <label for="id_libro">ID Libro</label>
            <input type="text" name="id_libro"><br>
            <label for="id_usuario">ID Usuario</label>
            <input type="text" name="id_usuario"><br>
            <button type="submit">Devolver Libro</button>
        </form>
    </body>
</html>


<?php
    if(isset($_POST['id_usuario'],$_POST['id_libro'])){
        $id_usuario=$_POST['id_usuario'];
        $id_libro=$_POST['id_libro'];

        try{
            $conexion = new PDO("mysql:host=localhost;dbname=biblioteca", "root", "");//Iniciar PDO
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Poner atributo error del pdo y excepciones
            $conexion->exec("SET CHARACTER SET utf8");//POner caracter utf8

            $sql="SELECT COUNT(*) AS total FROM prestamos WHERE id_usuario=:id_usuario AND id_libro=:id_libro";//Consulta de los prestamos que hay
            $stmt=$conexion->prepare($sql);//prepara consulta

            $stmt->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);//Parametros enteros del id_usuario y libro
            $stmt->bindParam(":id_libro",$id_libro,PDO::PARAM_INT);

            $stmt->execute();//Se ejecuta la consulta
            
            $prestamos=$stmt->fetch(PDO::FETCH_ASSOC)['total'];
            if($prestamos>0){
                $conexion->beginTransaction();//Iniciar transaccion
                $sql="DELETE FROM prestamos WHERE id_usuario=:id_usuario AND id_libro=:id_libro";
                $stmt=$conexion->prepare($sql);

                $stmt->bindParam(":id_usuario",$id_usuario,PDO::PARAM_INT);
                $stmt->bindParam(":id_libro",$id_libro,PDO::PARAM_INT);

                $stmt->execute();//Se ejecuta la consulta

                $sql="UPDATE libros SET cantidad_disponible=cantidad_disponible+:prestamos WHERE id_libro=:id_libro";
                $stmt=$conexion->prepare($sql);

                $stmt->bindParam(":id_libro",$id_libro,PDO::PARAM_INT);//Parametros enteros del id_libro y el nº de pretamos 
                $stmt->bindParam(":prestamos",$prestamos,PDO::PARAM_INT);

                $stmt->execute();//Se ejecuta la consulta

                $conexion->commit();//Guarda cambios de las tablas SQL
                echo "Libro devuelto";
            }else{
                echo "No se encontro libro";//Si no hay libros prestados por el usuario devuelve mensaje
            }
        }catch(PDOException $e){
            if($conexion->inTransaction()){//Si hay una transaccion descarta los cambios de las tablas
                $conexion->rollBack();
            }
            die("Error en la BSD: ".$e->getMessage());
        }
    }
?>