<html>
    <head>
        <title>Historial de Alquileres</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>ID ALQUILER</th>
                <th>CLIENTE</th>
                <th>MARCA VEHICULO</th>
                <th>MODELO VEHICULO</th>
                <th>Fecha Incial Alquiler</th>
                <th>Fecha Final Alquiler</th>
                <th>Precio Total Alquiler</th>
            </tr>
            <?php
                foreach($alquileres as $alquiler){//Recorremos los alquileres en una tabla con sus datos
                    echo "<tr>
                            <td>".$alquiler['id_alquiler']."</td>
                            <td>".$alquiler['cliente_nombre']."</td>
                            <td>".$alquiler['vehiculo_marca']."</td>
                            <td>".$alquiler['vehiculo_modelo']."</td>
                            <td>".$alquiler['fecha_inicio']."</td>
                            <td>".$alquiler['fecha_fin']."</td>
                            <td>".$alquiler['total']."</td>
                        </tr>";
                }
            ?>
        </table>
        <a href="index.php?action=inicio">Volver a Inicio</a>
    </body>
</html>