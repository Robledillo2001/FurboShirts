<html>
    <head>
        <title>Tareas de <?=$_SESSION['nombre']?></title>
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

        <form action="index.php?action=tareasEmp" method="post">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha Asignación</th>
                    <th>Fecha Entrega</th>
                    <th>Marcar completa</th>
                </tr>
                <?php foreach($datos as $tarea):?>
                    <tr>
                        <td><?=$tarea['id']?></td>
                        <td><?=$tarea['titulo']?></td>
                        <td><?=$tarea['descripcion']?></td>
                        <td><?=$tarea['estado']?></td>
                        <td><?=$tarea['fecha_asignacion']?></td>
                        <td><?=$tarea['fecha_entrega']?></td>
                        <td>
                            <input type="checkbox" name="completadas[]" value="<?= (int)$tarea['id'] ?>" <?php if ($tarea['estado'] === 'completada') echo 'checked disabled'; ?> />
                        </td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="3"><button type="submit" name="Completar">Completar Tareas</button></td>
                    <td colspan="4"><button type="submit" name="Descargar">Descargar Tareas</button></td>
                </tr>
            </table>
        </form>

        <div class="paginacion">
                    <?php if($pagina>1):?><!--Si la pagina en la que estamos es mayor a uno se podra ir a la pagina anterior a donde estamos-->
                        <a href="index.php?action=tareasEmp&pagina=<?= $pagina-1 ?>"><-</a>
                    <?php endif;?>
                    <?php for($i=1;$i<=$total_paginas;$i++):?>
                        <a href="index.php?action=tareasEmp&pagina=<?= $i ?>" 
                        class="<?php echo ($i == $pagina) ? 'active' : ''; ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor;?>
                    <?php if($pagina<$total_paginas):?><!--Si la pagina en la que estamos es menor al total de paginas se podra ir a la pagina posterios a donde estamos-->
                        <a href="index.php?action=tareasEmp&pagina=<?= $pagina+1 ?>">-></a>
                    <?php endif;?>
        </div>
        
    </body>
</html>