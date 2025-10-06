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
            padding: 5px 10px;
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
            background-color:green;
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
                <th>ID ALQUILER</th>
                <th>CLIENTE</th>
                <th>MARCA VEHICULO</th>
                <th>MODELO VEHICULO</th>
                <th>Fecha Inicial Alquiler</th>
                <th>Fecha Final Alquiler</th>
                <th>Precio Total Alquiler</th>
                <th>Imagen Coche</th>
            </tr>
                <!--Bucle para mostrar los datos de los alquileres-->
                <?php foreach ($alquileres as $alquiler):?>
                    <?php if($totalAlquileres):?>
                    <tr>
                        <td><?= $alquiler['id'] ?></td>
                        <td><?= $alquiler['cliente'] ?></td>
                        <td><?= $alquiler['marca'] ?></td>
                        <td><?= $alquiler['modelo'] ?></td>
                        <td><?= $alquiler['fecha_inicio'] ?></td>
                        <td><?= $alquiler['fecha_fin'] ?></td>
                        <td><?= $alquiler['precio_total'] ?></td>
                        <td><img src="<?=$alquiler['ruta'] ?>" width="100"></td>
                    <?php endif;?>
                    </tr>
            <?php endforeach;?>
        </table>

        <!-- Enlaces de paginación (si es necesario) -->
        <div class="pagination">
                <?php if ($pagina > 1): ?>
                    <a href="index.php?action=historial&pagina=<?= $pagina - 1 ?>">←</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <a href="index.php?action=historial&pagina=<?= $i ?>"><?= $i ?></a>
                <?php endfor; ?>
                <?php if ($pagina < $totalPaginas): ?>
                    <a href="index.php?action=historial&pagina=<?= $pagina + 1 ?>">→</a>
                <?php endif; ?>
            </div>

        <a href="index.php?action=inicio" class="boton-volver">Volver a Inicio</a>
    </body>
</html>
