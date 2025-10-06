<html>
    <head>
        <title>AÑADIR TAREAS</title>
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

        <form action="index.php?action=eliminarUsuarios" method="post" class="form-container">
            <?php if(!empty($usuarios)):?>
                <label for="usuario">Id de usuario</label>
                <select name="usuario">
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['ID'] ?>"><?= $usuario['NOMBRE_COMPLETO'] ?></option>
                <?php endforeach; ?>
                </select>
                <button type="submit">Eliminar Usuario</button>
            <?php else:?>
                <h1 style="color:white;">No se pueden eliminar usuarios ya que tienen asignadas tareas, reportes o fichajes</h1>
            <?php endif;?>
        </form>
    </body>
</html>