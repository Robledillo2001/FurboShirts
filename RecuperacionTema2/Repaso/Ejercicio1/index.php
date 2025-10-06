<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descripción breve de tu página">
    <meta name="author" content="Tu Nombre">
    <meta name="keywords" content="HTML, plantilla, ejemplo">
    <title>Añadir Tarea</title>
</head>
<body>
    <form method="post" action="">
        <label for="nombre">Nombre del Trabajador</label>
        <input type="text" name="nombre"><br>
        <label for="puesto">Puesto del Trabajador</label>
        <input type="text" name="puesto"><br>
        <label for="salario">Salario del Trabajador</label>
        <input type="text" name="salario"><br>
        <label for="email">Email del Trabajador</label>
        <input type="text" name="email"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        if (isset($_POST['nombre'], $_POST['puesto'], $_POST['salario'], $_POST['email'])) {
            if (is_numeric($_POST['salario'])) {
                $nombre = $_POST['nombre'];
                $puesto = $_POST['puesto'];
                $salario = $_POST['salario'];
                $email = $_POST['email'];

                $Trabajador = [
                    "nombre" => $nombre,
                    "puesto" => $puesto,
                    "salario" => $salario,
                    "email" => $email
                ];

                echo "<h2>Información del Trabajador:</h2>";
                echo "<ul>";
                foreach ($Trabajador as $clave => $valor) {
                    if ($clave == "salario") {
                        echo "<li>" . $clave . ": " . $valor . "€</li>";
                    } else {
                        echo "<li>" . $clave . ": " . $valor . "</li>";
                    }
                }
                echo "</ul>";

                // Modificar el salario
                $Trabajador['salario'] /= 0.24;

                echo "<h2>Salario del Trabajador después de la modificación:</h2>";
                echo "<ul>";
                echo "<li>Salario actualizado: " . number_format($Trabajador['salario'], 2) . "€</li>";
                echo "</ul>";
            } else {
                echo "El salario debe ser numérico!!";
            }
        }
    ?>
</body>
</html>
