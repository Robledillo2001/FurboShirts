<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Préstamo</title>
</head>
<body>
    <h1>Registrar Préstamo</h1>
    <form method="post" action="index.php?action=registrarPrestamo">
        <label for="id_usuario">Usuario:</label>
        <select name="id_usuario" id="id_usuario" required>
            <?php foreach ($usuarios as $usuario): ?>
                <option value="<?= $usuario['id_usuario'] ?>"><?= $usuario['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="id_libro">Libro:</label>
        <select name="id_libro" id="id_libro" required>
            <?php foreach ($libros as $libro): ?>
                <option value="<?= $libro['id_libro'] ?>"><?= $libro['titulo'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
