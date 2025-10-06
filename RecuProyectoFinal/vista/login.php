<html>
    <head>
        <title>INICIAR SESION</title>
        <link rel="stylesheet" href="estilos.css">
        <link rel="icon" type="image/png" href="imagenes/cowork.jpg">
    </head>
    <body>
        <div class="form-container">
            <img src="imagenes/cowork.jpg" style="width:100px;" alt="Imagen de la pagina">
            <h1 >Iniciar Sesion</h1>
            <form action="index.php?action=login" method="post">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario"><br>
                <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña"><br>
                <label for="recordar">Recordar Usuario</label>
                <input type="checkbox" name="recordar">
                <button type="submit">Iniciar Sesion</button>
            </form>
        </div>
        
    </body>
</html>