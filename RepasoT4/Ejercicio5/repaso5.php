<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Join</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <?php
        try{
            $conexion=new PDO("mysql:host=localhost; dbname=curso_php", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
            $pedidos="SELECT PE.ID_PEDIDO, PE.ID_ART, PR.NOMBRE, PR.STOCK, PE.CANTIDAD 
                        FROM pedidos PE JOIN productos_1 PR
                        ON PE.ID_ART=PR.ID";/*USAMOS JOIN PARA JUNTAR LOS PEDIDOS Y LOS PRODUCTOS
                                            CON EL IDENTIFICADOR DE ARTICULO 
                                            SI COINCIDEN EN EL PEDIDO*/
            $stmt=$conexion->prepare($pedidos);
            $stmt->execute();

            echo "<H2>PEDIDOS</H2>";
            while($fila=$stmt->fetch(PDO::FETCH_ASSOC)){
                echo"<ul>
                        <li>ID PEDIDO: ".$fila['ID_PEDIDO']."</li>
                        <li>ID ARTICULO:".$fila['ID_ART']."</li>
                        <li>NOMBRE:".$fila['NOMBRE']."</li>
                        <li>STOCK RESTANTE:".$fila['STOCK']."</li>
                        <li>CANTIDAD DE PRODUCTOS:".$fila['CANTIDAD']."</li>
                    </ul>";
            }
        }catch(PDOException $e){
            die("Error en la actualizacion: ".$e->getMessage());
        }finally{
            $conexion=null;
        }
    ?>
</body>
</html>