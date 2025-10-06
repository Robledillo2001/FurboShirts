<html>
    <head>
        <title>Añadir Tareas</title>
    </head>
    <body>
        <form method="post">
            <label for="prioridad">Prioridad: </label>
            <select name="prioridad" id="">
                <option value="Alta">ALta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
            </select>
            <label for="estados">Estados: </label>
            <select name="estados" id="">
                <option value="Terminada">Terminada</option>
                <option value="Pendiente">Pendiente</option>
            </select>

            <button type="submit">Añadir</button>
        </form>
        <h2>Lista de Tareas</h2>
        <table border="1">
            <tr>
                <th>Empleado</th>
                <th>Tarea</th>
                <th>Prioridad</th>
                <th>Estado</th>
            </tr>
    <?php
        session_start();
        if(!isset($_SESSION['tareas'])){
            $_SESSION['tareas']=[];
        }

        if(isset($_POST['prioridad'],$_POST['estados'])){
           $estado=$_POST['estados'];
           $prioridad=$_POST['prioridad'];
           $encontrado=false;

           foreach ($_SESSION['tareas'] as $tarea) {
            if ($tarea['Prioridad'] === $prioridad && $tarea['Estado'] === $estado) {
                $encontrado=true;
                echo "<tr>
                        <td>{$tarea['Empleado']}</td>
                        <td>{$tarea['Tarea']}</td>
                        <td>{$tarea['Prioridad']}</td>
                        <td>{$tarea['Estado']}</td>
                      </tr>";
                    $tareasEncontradas = true;
                }
            }
            if(!$encontrado){
                echo "<tr>
                        <td colspan='4'>No se encontro tareas</td>
                </tr>";
            }
        }
    ?>
    </table>
    <a href="añadirTareas.php">Añadir Tarea</a>
    </body>
</html>