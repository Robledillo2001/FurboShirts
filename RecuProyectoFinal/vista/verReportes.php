<html>
    <head>
        <title>VER REPORTES</title>
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
        <h1>Reportes de Los empleados</h1>
        <table border="1">
            <tr>
                <th>ID DE REPORTE</th>
                <th>Imagen</th>
                <th>NOMBRE</th>
                <th>TITULO</th>
                <th>DESCRIPCION</th>
                <th>ESTADO</th>
                <th>FECHA DE REPORTE</th>
            </tr>
            <tr>
                <?php foreach($datos as $reporte):?>
                    <tr>
                        <td><?=$reporte['ID']?></td>
                        <td> 
                            <?php if($reporte['img_usuario']!==""):?>
                                <img src="<?php echo $reporte['img_usuario']; ?>" alt="Imagen de Empleado">
                            <?php else:?>
                                <img src="imagenes/user.png" alt="Imagen de Empleado">
                            <?php endif;?></td>
                        <td><?=$reporte['NOMBRE_COMPLETO']?></td>
                        <td><?=$reporte['TITULO']?></td>
                        <td><?=$reporte['DESCRIPCION']?></td>
                        <td><?=$reporte['ESTADO']?></td>
                        <td><?=$reporte['FECHA']?></td>
                    </tr>
                <?php endforeach;?>
            </tr>
        </table>

        <div class="paginacion">
                    <?php if($pagina>1):?><!--Si la pagina en la que estamos es mayor a uno se podra ir a la pagina anterior a donde estamos-->
                        <a href="index.php?action=verReportes&pagina=<?=$pagina-1?>"><-</a>
                    <?php endif;?>
                    <?php for($i=1;$i<=$total_paginas;$i++):?><!---Botones con todas las paginas que hay en total--->
                        <a href="index.php?action=verReportes&pagina=<?= $i ?>" 
                        class="<?php echo ($i == $pagina) ? 'active' : ''; ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor;?>
                    <?php if($pagina<$total_paginas):?><!--Si la pagina en la que estamos es menor al total de paginas se podra ir a la pagina posterios a donde estamos-->
                        <a href="index.php?action=verReportes&pagina=<?=$pagina+1?>">-></a>
                    <?php endif;?>
        </div>
    </body>
</html>