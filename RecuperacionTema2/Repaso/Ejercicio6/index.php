<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descripción breve de tu página">
    <meta name="author" content="Tu Nombre">
    <meta name="keywords" content="HTML, plantilla, ejemplo">
    <title>Lista Compra</title>
</head>
<body>
    <form method="post" action="">
        <label for="nombre">Nombre Tarea</label>
        <input type="text" name="nombre"><br>
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        session_start();
        if(!isset($_SESSION['tareas'])){
            $_SESSION['tareas']=[];
        }

        if (isset($_POST['nombre'], $_POST['usuario'])) {
            $nombre = $_POST['nombre'];
            $usuario = $_POST['usuario'];

            if(count($_SESSION['tareas'])<5){
                $_SESSION['tareas'][]=[
                    "nombre"=>$nombre,
                    "usuario"=>$usuario
                ];
            }else{
                echo"Ya se han añadido las tareas suficientes de hoy";
            }

            echo"<table border=1>
                    <tr>
                        <th colspan='2'>Tareas del Dia</th>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                    </tr>";

            foreach($_SESSION['tareas'] as $tarea){
                echo "<tr>
                        <td>".$tarea['nombre']."</td>
                        <td>".$tarea['usuario']."</td>
                    </tr>";
            }
            echo"</table>";
        }
        /*session_unset();
        session_destroy();
        echo "Sesion Finalizada";*/
    ?>
</body>
</html>
