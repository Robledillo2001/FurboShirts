<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descripción breve de tu página">
    <meta name="author" content="Tu Nombre">
    <meta name="keywords" content="HTML, plantilla, ejemplo">
    <title>Añadir Reserva</title>
</head>
<body>
    <form method="post" action="">
        <label for="nombre">Nombre Reserva</label>
        <input type="text" name="nombre"><br>
        <label for="personas">Nº DE PERSONAS</label>
        <input type="number" name="personas"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        session_start();
        if(!isset($_SESSION['reservas'])){
            $_SESSION['reservas']=[];
        }

        if (isset($_POST['nombre'], $_POST['personas'])) {
            $nombre = $_POST['nombre'];
            $personas = $_POST['personas'];

            $_SESSION['reservas'][]=[
                "nombre"=>$nombre,
                "personas"=>$personas
            ];

            echo"<table border=1>
                    <tr>
                        <th>Nombre de la Reserva</th>
                        <th>Nº Personas</th>
                    </tr>";

            foreach($_SESSION['reservas'] as $reserva){
                echo "<tr>
                        <td>".$reserva['nombre']."</td>
                        <td>".$reserva['personas']."</td>
                    </tr>";
            }
            echo"</table>";
        }
        session_unset();
        session_destroy();
        echo "Sesion Finalizada";
    ?>
</body>
</html>
