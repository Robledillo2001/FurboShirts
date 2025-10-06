<html>
    <head>
        <title>VER TAREAS</title>
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
        <h1>Tareas de Los empleados</h1>
        <table border="1">
            <tr>
                <th>ID DE TAREA</th>
                <th>Imagen</th>
                <th>NOMBRE</th>
                <th>TITULO</th>
                <th>ESTADO</th>
                <th>FECHA ASIGNACION</th>
                <th>FECHA ENTREGA</th>
            </tr>
            <tr>
                <?php foreach($datos as $tarea):?>
                    <tr>
                        <td><?=$tarea['id']?></td>
                        <td>
                             <?php if($tarea['img_usuario']!==""):?>
                                <img src="<?php echo $tarea['img_usuario']; ?>" alt="Imagen de Empleado">
                            <?php else:?>
                                <img src="imagenes/user.png" alt="Imagen de Empleado">
                            <?php endif;?>
                        </td>
                        <td><?=$tarea['NOMBRE_COMPLETO']?></td>
                        <td><?=$tarea['titulo']?></td>
                        <td><?=$tarea['estado']?></td>
                        <td><?=$tarea['fecha_asignacion']?></td>
                        <td><?=$tarea['fecha_entrega']?></td>
                    </tr>
                <?php endforeach;?>
            </tr>
        </table>

        <div class="paginacion">
                    <?php if($pagina>1):?><!--Si la pagina en la que estamos es mayor a uno se podra ir a la pagina anterior a donde estamos-->
                        <a href="index.php?action=verTareas&pagina=<?=$pagina-1?>"><-</a>
                    <?php endif;?>
                    <?php for($i=1;$i<=$total_paginas;$i++):?><!---Botones con todas las paginas que hay en total--->
                        <a href="index.php?action=verTareas&pagina=<?= $i ?>" 
                        class="<?php echo ($i == $pagina) ? 'active' : ''; ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor;?>
                    <?php if($pagina<$total_paginas):?><!--Si la pagina en la que estamos es menor al total de paginas se podra ir a la pagina posterios a donde estamos-->
                        <a href="index.php?action=verTareas&pagina=<?=$pagina+1?>">-></a>
                    <?php endif;?>
        </div>
    </body>
</html>