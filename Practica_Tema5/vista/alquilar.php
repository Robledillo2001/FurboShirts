<html>
    <head>
        <title>Alquilar Vehículo</title>
    </head>
    <body>
        <h1>Alquilar Vehículo</h1>
        <form action="index.php?action=alquilarVehiculo" method="post">
            <label>Clientes</label>
            <select name="id_cliente">
            <?php foreach ($clientes as $cliente): /*Añadimos los clientes en la select*/?>
                <option value="<?= $cliente['id_cliente'] ?>">
                    <?= $cliente['nombre'] ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Vehículos</label>
            <select name="id_vehiculo">
            <?php foreach ($vehiculos as $vehiculo): /*Añadimos los vehiculos en la select*/?>
                <?
                    if($vehiculo['ejemplares']>0){//Si no hay ningun ejemplar no los muestra
                        ?>
                        <option value="<?= $vehiculo['id_vehiculo'] ?>">
                            <?= $vehiculo['marca'] . ' ' . $vehiculo['modelo'] ?>
                        </option><?
                    }
                ?>
            <?php endforeach; ?>
            </select><br>

            <label>Fecha de Alquiler</label>
            <input type="date" name="fecha" required><br>

            <button type="submit">Alquilar Vehículo</button>
        </form>
    </body>
</html>
