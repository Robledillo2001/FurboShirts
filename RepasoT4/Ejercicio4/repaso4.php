<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Transacción</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
<form method="POST">
    <label for="id">ID ART:</label>
    <input type="text" name="id" required><br>
    <label for="cantidad">CANTIDAD:</label>
    <input type="number" name="cantidad" min="1" required><br>
    <button type="submit" name="archivar">Encargar Pedido</button>
</form>
    <?php
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8"); // Configurar la codificación de caracteres
            
            if (isset($_POST['id'], $_POST['cantidad'])) {
                $id_art = $_POST['id'];
                $cantidad = (int)$_POST['cantidad'];

                // Verificar si el producto existe y obtener sus datos
                $sql = "SELECT NOMBRE, PRECIO, STOCK 
                        FROM productos_1 WHERE ID = ?";//Select en el que queremos 
                        /*mostrar 3 columnas 
                        donde el ID es igual a un marcador*/
                $stmt = $conexion->prepare($sql);
                $stmt->execute([$id_art]);//Pasamos el valor de $post[id]
                $producto = $stmt->fetch(PDO::FETCH_ASSOC);//Devuelve valores como array asociativo

                if (!$producto) {
                    die("Error: Producto no encontrado.");
                }//Si no encuentra ID del producto saltara error

                // Verificar stock suficiente
                if ($producto['STOCK'] < $cantidad) {//Si el stock es menor a la cantidad saltara error
                    die("Error: Stock insuficiente. Solo hay {$producto['STOCK']} unidades disponibles.");
                }
                /*Pone los valores de los productos de la Select para agregar un pedido*/
                $nombre = $producto['NOMBRE'];
                $precio_total = $producto['PRECIO'] * $cantidad;

                // Iniciar la transacción
                $conexion->beginTransaction();

                // Insertar el pedido
                $sql = "INSERT INTO pedidos (ID_ART, NOMBRE, PRECIO, CANTIDAD) 
                        VALUES (?, ?, ?, ?)";/*LOS VALORES DEL INSERT SON MARCADORES */
                $stmt = $conexion->prepare($sql);
                $stmt->execute([$id_art, $nombre, $precio_total, $cantidad]);//EJECUTAMOS LOS VALORES DE LOS MARCADORES
                                                                            //LOS CUALES SON VALORES DEL FORM Y DE LA SELECT DE PRODUCTOS

                // Actualizar el stock
                $sql = "UPDATE productos_1 SET STOCK = STOCK - ? WHERE ID = ?";//Resta la cantidad del pedido menos el stock restante
                                                                                // y muestra el id del producto que buscamos
                $stmt = $conexion->prepare($sql);
                $stmt->execute([$cantidad, $id_art]);//Ejecutamos con los marcadores

                // Confirmar la transacción
                $conexion->commit();
                echo "<p>Pedido registrado exitosamente.</p>";
            }
        } catch (PDOException $e) {
            if ($conexion->inTransaction()) {//Si hay una transaccion activa---->Revertir cambios en caso de error
                $conexion->rollBack(); 
            }
            die("<p>Error en la transacción: " . $e->getMessage() . "</p>");
        } finally {
            $conexion = null; // Cerrar la conexión
        }
    ?>
</body>
</html>
