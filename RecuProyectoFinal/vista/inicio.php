<html>
    <head>
        <title>INICIO</title>
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
            <?php
                if(isset($_COOKIE['usuario'])){//Si existe la cookie de usuario imprimira el nombre
                    echo "<h1>Bienvenido " . $_COOKIE['usuario'] . "!!!!!! </h1>";
                }else{
                    echo "";//Si no esta la cookie no imprimira nada
                }
            ?>
            <h1>Menu de inicio</h1>
            <?php
                if(isset($_SESSION['rol'])){//Si hay una session de rol

                    if($_SESSION['rol']==="admin"){//El menu sera diferente segun si es administrador o usuario(trabajador)
                        ?>
                        <div class="enlaces">
                            <a href="index.php?action=añadirUser" class="menu-links">Añadir Usuarios</a>
                            <a href="index.php?action=eliminarUsuarios" class="menu-links">Eliminar Usuarios</a>
                            <a href="index.php?action=verUsuarios" class="menu-links">Ver Usuarios</a>
                            <a href="index.php?action=añadirTareas" class="menu-links">Añadir Tareas</a>
                            <a href="index.php?action=verTareas" class="menu-links">Consultar Tareas</a>
                            <a href="index.php?action=eliminarTareas" class="menu-links">Eliminar Tareas</a>
                            <a href="index.php?action=verFichajes" class="menu-links">Consultar Fichajes</a>
                            <a href="index.php?action=verReportes" class="menu-links">Consultar Reportes</a>
                            <a href="index.php?action=Reportar" class="menu-links">Reportar</a>
                            <a href="index.php?action=completarReportes" class="menu-links">Completar Reportes</a>
                            <a href="index.php?action=eliminarReportes" class="menu-links">Eliminar Reportes</a>
                        </div>
                            
                        <?php
                    }else{
                        ?>
                            <div class="enlaces">
                                <a href="index.php?action=Fichar" class="menu-links">Fichar</a>
                                <a href="index.php?action=Reportar" class="menu-links">Reportar</a>
                                <a href="index.php?action=tareasEmp" class="menu-links">Ver Tareas</a>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </body>
</html>