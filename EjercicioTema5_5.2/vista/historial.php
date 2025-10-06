<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Préstamos</title>
</head>
<body>
    <h1>Historial de Préstamos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Préstamo</th>
                <th>Usuario</th>
                <th>Libro</th>
                <th>Fecha de Préstamo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prestamos as $prestamo): ?>
                <tr>
                    <td><?= $prestamo['id_prestamo'] ?></td>
                    <td><?= $prestamo['usuario'] ?></td>
                    <td><?= $prestamo['libro'] ?></td>
                    <td><?= $prestamo['fecha_prestamo'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
