<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Academia</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Gestion de Academia</h1>
    <form action="menu.php" method="POST">
        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu nombre">
        </div>

        <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña">
        </div>

        <div class="form-group">
            <button type="submit">Enviar</button>
        </div>
    </form>
    <?php
        //Esta pagina es solo un formulario que redireccionara a menu.php mediante el action
    ?>
</body>
</html>