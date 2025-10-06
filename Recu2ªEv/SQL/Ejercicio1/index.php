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
            <button type="submit">Registrar Prestamo</button>
        </form>
    </body>
</html>

<?php
    $conexion=new mysqli("localhost","root","","biblioteca");//Establecer Objeto conexion
    //$conexion=mysqli_connect("localhost","root","","biblioteca");Establecer conexion pero en modo procedimental
    if ($conexion->connect_error) {
        die("Error en la conexion de la BSD: " . $conexion->connect_error);
    }

    if(isset($_POST['id_libro'],$_POST['id_usuario'])){
        $id_libro=$_POST['id_libro'];
        $id_usuario=$_POST['id_usuario'];
        $fecha= date('Y-m-d');

        $sql="SELECT cantidad_disponible FROM libros where id_libro=?";

        $stmt=$conexion->prepare($sql);
        $stmt->bind_param("i",$id_libro);

        $stmt->execute();

        $resultado=$stmt->get_result();

        if($resultado->num_rows>0){//Si hay filas 
            $fila=$resultado->fetch_assoc();//Se convierte en array de consulta SQL
            if($fila['cantidad_disponible']>0){//Si hay canatidad de libros >0
                $sql="INSERT INTO prestamos(id_usuario,id_libro,fecha_prestamo)VALUES(?,?,?)";//Se inserta el prestamo con el id del user y libro y fecha prestamo

                $stmt=$conexion->prepare($sql);

                $stmt->execute([$id_usuario,$id_libro,$fecha]);

                $sql="UPDATE libros SET cantidad_disponible=cantidad_disponible-1 WHERE id_libro=?";//Se resta la cantidad a uno buscando el id de libro
                $stmt=$conexion->prepare($sql);

                $stmt->execute([$id_libro]);
                echo "Prestamos realizado existosamente";
            }else{
                echo "No hay cantidad de ese libro";//Mostrara el mensaje que no hay libros prestados por el usuario
            }
        }else{
            echo "Libro no encontrado";
        }
    }
    $conexion->close();

?>