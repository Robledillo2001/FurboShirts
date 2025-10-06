<html>
    <head>
        <title>Alquilar Vehiculo</title>
    </head>
    <body>
        <h1>Devolver Vehiculo</h1>
        <form action="index.php?action=devolverVehiculo" method="post">
            <!--Sacamos del id del alquiler-->
            <label>Id de alquiler</label>
            <input type="number" name="id_alquiler">
            <!--Sacamos del id del vehiculo del alquiler-->
            <label>Id de Vehiculo</label>
            <input type="number" name="id_vehiculo">
            <button type="submit">Devolver Vehículo</button>
        </form>
    </body>
</html>