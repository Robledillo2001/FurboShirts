<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACtualizar Precios</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>Actualizar Precio</h1>
        <label for="ID">ID PRODUCTO: </label>
        <input type="number" name="ID">
        <label for="precio">Precio: </label>
        <input type="text" name="precio">
        <button type="submit">Actualizar Producto(s)</button>
    </form>
    <?php
        try{
            $conexion=new PDO("mysql:host=localhost; dbname=curso_php", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            if(isset($_POST['ID'],$_POST['precio'])){
                $Update="UPDATE productos SET PRECIO=:precio WHERE CODIGO_ART=:id_producto";//Ejemplo de consulta con marcador 
                $stmt=$conexion->prepare($Update);

            $stmt->execute([":id_producto"=>$_POST['ID'],":precio"=>$_POST['precio']]);//Ejecutara la consulta con el valor de cada marcador
            }
        }catch(PDOException $e){
            die("Error en la actualizacion: ".$e->getMessage());
        }finally{
            $conexion=null;//Cierra la conexion
        }
    ?>
</body>
</html>