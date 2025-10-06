<html>
    <head>
        <title>insertar</title>
    </head>
    <body>
        <form method="post">
            <label for="nombre">Nombre Cliente</label>
            <input type="text"name="nombre">
            <label for="personas">Numero Personas</label>
            <input type="number"name="personas">
            <button>Agregar Producto</button>
        </form>
        <table border="1">
            <tr>
                <th>Cliente</th>
                <th>NºPERSONAS</th>
            </tr>
        <?php
            session_start();

            if(!isset($_SESSION['reserva'])){
                $_SESSION['reserva']=[];
            }

            if(isset($_POST['nombre'],$_POST['personas'])){
                $nombre=$_POST['nombre'];
                $personas=$_POST['personas'];

                $_SESSION['reserva'][]=["nombre"=>$nombre,"personas"=>$personas];
            }
            foreach($_SESSION['reserva'] as $reserva){
                echo "<tr>
                        <td>".$reserva['nombre']."</td>
                        <td>".$reserva['personas']."</td>
                    </tr>";
            }
            $totalPersonas=count($_SESSION['reserva']);

            echo "<tr><td colspan='2'>Total Personas de $totalPersonas</td></tr>";
        ?>
        </table>
    </body>
</html>