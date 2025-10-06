
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insertar productos</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="post">
        <h1>Actualizar Precio</h1>
        <label for="ID">ID PRODUCTO: </label>
        <input type="number" name="ID">
        <label for="nombre">NOMBRE: </label>
        <input type="text" name="nombre">
        <label for="pais">PAIS: </label>
        <input type="text" name="pais">
        <label for="precio">Precio: </label>
        <input type="text" name="precio">
        <button type="submit">iNSERTAR Producto(s)</button>
    </form>
    <?php
        try{
            $conexion=new PDO("mysql:host=localhost; dbname=curso_php", "root", "");//Se pone primero el dns y el nombre de la bsd y luego el nombre y contraseña
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            if(isset($_POST['ID'],$_POST['nombre'],$_POST['pais'],$_POST['precio'])){
                $sql="INSERT into productos(CODIGO_ART,NOMBRE_ART,PAIS,PRECIO)VALUES(?,?,?,?)";//Ejemplo con marcadores ?
                $stmt=$conexion->prepare($sql);


                //Ejemplo de consultas con BIND PARAM   
                //A cada indice de los marcadores les da un valor dependiendo del tipo 
                $stmt->bindParam(1,$_POST['ID'],PDO::PARAM_INT);//Entero
                $stmt->bindParam(2,$_POST['nombre'],PDO::PARAM_STR);//String
                $stmt->bindParam(3,$_POST['pais'],PDO::PARAM_STR);
                $stmt->bindParam(4,$_POST['precio'],PDO::PARAM_STR);/*float no tienen un tipo específico en PDO 
                                                                    y se manejan como cadenas de texto*/
                
                $stmt->execute();
                echo"Nuevo producto Insertado";
            }
        }catch(PDOException $e){
            die("Error en la actualizacion: ".$e->getMessage());
        }finally{
            $conexion=null;
        }
    ?>
</body>
</html>