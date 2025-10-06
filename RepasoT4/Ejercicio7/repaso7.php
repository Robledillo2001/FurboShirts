<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Statement Procedimental</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
    <form method="POST">
        <label for="id">Id producto</label>
        <input type="text"name="id"><br>
        <label for="precio">Precio</label>
        <input type="text"name="precio"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        $conexion=mysqli_connect("localhost","root","","curso_php");

        if(!$conexion){
            die("Error de coenxion: ".mysqli_connect_error());//Mensaje de error
        }

        if(isset($_POST['id'],$_POST['precio'])){
            $sql="UPDATE productos SET PRECIO=? WHERE CODIGO_ART=?";//Ponemos marcadores ? para poner los valores de cada fila
            $stmt=mysqli_prepare($conexion,$sql);//Ponemos la conexion y la consulta para preparar un statement

            mysqli_stmt_bind_param($stmt,"di",$_POST['precio'],$_POST['id']);//Ponemos el nombre del statement el tipo de la variable y su valor
            //i:  entero, s: string d: decimal b: dato binario

            if(mysqli_stmt_execute($stmt)){
                echo "Producto actualizado";
            }else{
                echo "Error";
            }
            $sql="SELECT * FROM productos WHERE CODIGO_ART=?";
            $stmt=mysqli_prepare($conexion,$sql);
    
            mysqli_stmt_bind_param($stmt,"i",$_POST['id']);
    
            mysqli_stmt_execute($stmt);//Esto se usara para ejecutar la consulta del statment
    
            $resultado=mysqli_stmt_get_result($stmt);//Mostrara como array asociativo los valores de la tabla
            if($resultado&&mysqli_num_rows($resultado)>0){
                while($fila=mysqli_fetch_assoc($resultado)){
                    echo "<ul>
                        <li>Codigo art: ".$fila['CODIGO_ART']."</li>
                        <li>Nombre art: ".$fila['NOMBRE_ART']."</li>
                        <li>Pais: ".$fila['PAIS']."</li>
                        <li>Preico: ".$fila['PRECIO']."</li>
                    </ul>";
                }
            }else{
                echo "Error";
            }
        }
    ?>
</body>
</html>