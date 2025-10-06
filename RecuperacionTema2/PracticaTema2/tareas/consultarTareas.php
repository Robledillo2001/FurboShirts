<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        header("Location: ../login.php");
    }

    if(!isset($_SESSION['tareas'])){
        $_SESSION['tareas'];
    }
?>
<body>
    <form method="post">
        <h1>Consultar Tareas por estado</h1>
        <select name="estado">
            <option value="completada">Completada:</option>
            <option value="pendiente">Pendiente:</option>
        </select>
        <input type="submit" value="Consultar Tareas">
    </form>
    <?php
        if(isset($_POST['estado'])){
            $estado=$_POST['estado'];
            echo "
                <table border='1'>
                    <tr>
                        <th>Tarea:</th>
                        <th>Empleado:</th>
                        <th>Descripcion:</th>
                    </tr>";
            foreach($_SESSION['tareas']as $tarea){//Recorremos el array
                if($tarea['estado']===$estado){//Si devuelve el mismo valor de estado
                    echo "
                        <tr>
                            <td colspan='3'>Tareas ".ucfirst($estado)."s</td>
                        </tr>
                        <tr>
                            <td>".$tarea['titulo']."</td>
                            <td>".$tarea['emp']."</td>
                            <td>".$tarea['desc']."</td>
                        </tr>";//Imprimira los valores del array que esten en ese estado
                }
            }
        }
    ?><br>
    <a href="../index.php">Volver</a>
</body>
</html>