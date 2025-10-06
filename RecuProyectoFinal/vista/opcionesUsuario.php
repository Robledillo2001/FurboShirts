<html>
    <head>
        <title>OPCIONES DE USUARIO</title>
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

        <div class="opciones">
            <h1>Actualizar datos de Usuario</h1>
            <div class="enlaces">
                <a href="index.php?action=cambiarNombre" class="menu-links">Cambiar Nombre de Usuario</a>
                <a href="index.php?action=cambiarContraseña" class="menu-links">Cambiar Contraseña</a>
                <a href="index.php?action=cambiarDatos" class="menu-links">Cambiar Datos Usuario</a>
            </div>
        </div>
    </body>
</html>