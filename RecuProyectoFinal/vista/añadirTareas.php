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

        <form action="index.php?action=añadirTareas" method="post" class="form-container">
            <label for="id_emp">Id de Empleado</label>
            <select name="id_emp">
            <?php foreach ($empleados as $empleado): ?>
                <option value="<?= $empleado['ID'] ?>"><?= $empleado['NOMBRE_COMPLETO'] ?></option>
            <?php endforeach; ?>

            </select>
            <label for="titulo">Titulo</label>
            <input type="text" name ="titulo">
            <label for="titulo">Descripcion</label>
            <textarea name ="desc"></textarea>
            <label for="estado">Estado</label>
            <select name="estado">
                <option value="en_proceso">En Proceso</option>
                <option value="pendiente">Pendiente</option>
            </select>
            <label for="entrega">Fecha de Entrega</label>
            <input type="date" name ="entrega">
            <button type="submit">Añadir Tarea</button>
        </form>
    </body>
</html>