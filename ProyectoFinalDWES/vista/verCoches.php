<html>
    <head>
        <title>Historial de Alquileres</title>
        <link rel="stylesheet" href="estilos.css">
        <style>
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .pagination a {
            text-decoration: none;
            font-size: 20px; /* Aumentamos el tamaño */
            padding: 15px 20px;
            color: white;
            background-color: #007bff;
            border-radius: 10px;
            font-weight: bold;
            transition: transform 0.2s;
        }

        .pagination a:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .pagination .active a {
            background-color: #004080;
            font-size: 24px;
        }
        </style>

    </head>
    <body>
        <?php
            session_start();

            // Verificación de sesión
            if(!isset($_SESSION['usuario'])){
                header("Location: index.php?action=inicio");
                exit;
            }
        ?>

        <table border="1">
            <tr>
                <th>ID COche</th>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>Año</th>
                <th>Precio Diario</th>
                <th>Imagen Coche</th>
            </tr>

            <?php foreach ($coches as $coche) :?>
                        <tr>
                            <?php if($coche['cantidad']>0):?>
                                <td><?= $coche['id'] ?></td>
                                <td><?= $coche['marca'] ?></td>
                                <td><?= $coche['modelo'] ?></td>
                                <td><?= $coche['anio'] ?></td>
                                <td><?= $coche['precio'] ?>€</td>
                                <td><img src="<?=$coche['ruta']?>" width="200"></td>
                            <?php endif;?>
                        </tr>
            <?php endforeach;?>
        </table>

        <!-- Enlaces de paginación (si es necesario) -->
            <div class="pagination">
                <?php if ($pagina > 1): ?>
                    <a href="index.php?action=verCoches&pagina=<?= $pagina - 1 ?>">←</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <a href="index.php?action=verCoches&pagina=<?= $i ?>" <?= ($i == $pagina) ? 'class="active"' : '' ?>><?= $i ?></a>
                <?php endfor; ?>

                <?php if ($pagina < $totalPaginas): ?>
                    <a href="index.php?action=verCoches&pagina=<?= $pagina + 1 ?>">→</a>
                <?php endif; ?>
            </div>

        <a href="index.php?action=inicio" class="boton-volver">Volver a Inicio</a>
        <a href="index.php?action=alquilarCoche" class="boton-volver">Alquilar un Coche</a>
    </body>
</html>
