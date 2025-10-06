<html>
    <head>
        <title>Consultar Fichajes</title>
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
        
        <h1>Usuarios Registrados</h1>
        <table border="1">
            <tr>
                <th>Imagen Empleado</th>
                <th>ID USUARIO</th>
                <th>NOMBRE COMPLETO</th>
                <th>DNI</th>
                <th>ROL</th>
                <th>CORREO</th>
            </tr>
            
                <?php foreach($datos as $dato):?>
                    <tr>
                        <td>
                            <?php if($dato['img_usuario']!==""):?>
                                <img src="<?php echo $dato['img_usuario']; ?>" alt="Imagen de Empleado">
                            <?php else:?>
                                <img src="imagenes/user.png" alt="Imagen de Empleado">
                            <?php endif;?>
                        </td>
                        <td><?php echo $dato['ID'];?></td>
                        <td><?php echo $dato['NOMBRE_COMPLETO'];?></td>
                        <td><?php echo $dato['DNI'];?></td>
                        <?php if($dato['rol']==="admin"):?>
                                <td>Administrador</td>
                            <?php else:?>
                                <td>Empleado</td>
                            <?php endif;?>
                        
                        <td><?php echo $dato['correo'];?></td>
                    </tr>
                <?php endforeach;?>
            
        </table>

        <div class="paginacion">
                    <?php if($pagina>1):?><!--Si la pagina en la que estamos es mayor a uno se podra ir a la pagina anterior a donde estamos-->
                        <a href="index.php?action=verUsuarios&pagina=<?=$pagina-1?>"><-</a>
                    <?php endif;?>
                    <?php for($i=1;$i<=$total_paginas;$i++):?>
                        <a href="index.php?action=verUsuarios&pagina=<?= $i ?>" 
                        class="<?php echo ($i == $pagina) ? 'active' : ''; ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor;?>
                    <?php if($pagina<$total_paginas):?><!--Si la pagina en la que estamos es menor al total de paginas se podra ir a la pagina posterior a donde estamos-->
                        <a href="index.php?action=verUsuarios&pagina=<?=$pagina+1?>">-></a>
                    <?php endif;?>
        </div>
    </body>
</html>