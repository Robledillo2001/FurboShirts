<?php
try {
    // Conexión a la base de datos
    $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['nombre'], $_POST['precio'], $_POST['pais'])) {
        $nombres = $_POST['nombre'];
        $precios = $_POST['precio'];
        $paises = $_POST['pais'];

        // Validación de datos
        if (is_array($nombres) && is_array($precios) && is_array($paises)) {
            $conexion->beginTransaction(); // Iniciar transacción

            $stmt = $conexion->prepare("INSERT INTO productos (NOMBRE_ART, PRECIO, PAIS) VALUES (:nombre, :precio, :pais)");

            for ($i = 0; $i < count($nombres); $i++) {
                $stmt->bindParam(':nombre', $nombres[$i]);
                $stmt->bindParam(':precio', $precios[$i]);
                $stmt->bindParam(':pais', $paises[$i]);
                $stmt->execute();
            }

            $conexion->commit();
            echo "Productos guardados exitosamente.";
        } else {
            echo "Error en los datos enviados.";
        }
    } else {
        echo "Faltan datos en el formulario.";
    }
} catch (PDOException $e) {
    if ($conexion->inTransaction()) {
        $conexion->rollBack(); // Revertir transacción en caso de error
    }
    echo "Error al guardar los productos: " . $e->getMessage();
} finally {
    $conexion = null; // Cerrar conexión
}
?>
