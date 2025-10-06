<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar producto</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>Actualizar Precio</h1>
        <input type="text" name="pais">
        <button type="submit">borrar Producto(s)</button>
    </form>
    <?php
        try{
            $conexion=new PDO("mysql:host=localhost; dbname=curso_php", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");//Configurar la codificación de caracteres para manejar correctamente tildes, eñes, etc.: 

            if(isset($_POST['pais'])){
                $sql="Delete FROM productos WHERE pais=?";
                $stmt=$conexion->prepare($sql);

                $stmt->execute(array($_POST['pais']));//el primer y único marcador
                echo"Producto Eliminado";
            }
        }catch(PDOException $e){
            die("Error en la actualizacion: ".$e->getMessage());
        }finally{
            $conexion=null;
        }
    ?>
</body>
</html>