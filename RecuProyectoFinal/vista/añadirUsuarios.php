<html>
    <head>
        <title>Añadir Usuarios</title>
        <link rel="stylesheet" href="estilos.css">
        <link rel="icon" type="image/png" href="imagenes/cowork.jpg">
    </head>
    <body>
        <?php
            if(!isset($_SESSION['nombre'])){//Si no existe la sesion de nombre se redirige al login
                header("Location: index.php?action=login");
            }
        ?>

        <div class="menu-usuario">
            <div class="usuario">
            <a href="index.php?action=modificarImgUsuario" style="color:white; text-decoration:none;"><img src="<?= isset($_SESSION['ruta']) && !empty($_SESSION['ruta'])? $_SESSION['ruta']:'imagenes/user.png' ?>" alt="Imagen de usuario" class="avatar-usuario"></a>
            <h2><a href="index.php?action=opcionesUsuario" style="color:white; text-decoration:none;"><?=$_SESSION['nombre']?></a></h2>
            </div>

            <div class="sesion">
                <a href="index.php?action=inicio"><img src="imagenes/cowork.jpg" alt="Imagen de la web" class="avatar-usuario"></a>
                <a href="index.php?action=logout"><img src="imagenes/logout.png" alt="cerrar Sesion" class="avatar-usuario"></a>
            </div>
        </div>
        
        <h1>Añadir Usuarios</h1>
        <div class="form-container">
            <form action="index.php?action=añadirUser" method="post" enctype="multipart/form-data">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario"><br>
                <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña"><br>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre"><br>
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos"><br>
                <label for="dni">DNI:</label>
                <input type="text" name="dni"><br>
                <label for="rol">Rol:</label>
                <select name="rol">
                    <option value="admin">Administrador</option>
                    <option value="usuario">Usuario</option>
                </select><br>
                <label for="correo">Correo:</label>
                <input type="text" name="correo"><br>
                <button type="submit">Añadir Usuario</button>
                <label for="imagen">Imagen de usuario</label>
                <input type="file" name="imagen">
            </form><br>
        </div>
    </body>
</html>