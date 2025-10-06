<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios y Administradores</title>
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

    <h2>Lista de Usuarios y Administradores</h2>

    <table border="1">
        <caption>Usuarios y Administradores</caption>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo Electrónico</th>
        </tr>
        
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['ID'] ?></td>
                <td><?= $usuario['NOMBRE'] ?></td>
                <td><?= $usuario['correo_electronico'] ?: 'Admin no contiene correo' ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Paginación -->
    <div class="pagination">
    <!-- Botón Anterior -->
    <?php if ($pagina > 1): ?>
        <a href="index.php?action=verUsuarios&pagina=<?= $pagina - 1 ?>">←</a>
    <?php endif; ?>

    <!-- Numeración de Páginas -->
    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
        <?php if ($i == $pagina): ?>
            <a href="#"><strong><?= $i ?></strong></a>
        <?php else: ?>
            <a href="index.php?action=verUsuarios&pagina=<?= $i ?>"><?= $i ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <!-- Botón Siguiente -->
    <?php if ($pagina < $totalPaginas): ?>
        <a href="index.php?action=verUsuarios&pagina=<?= $pagina + 1 ?>">→</a>
    <?php endif; ?>
</div>

    <a href="index.php?action=inicio" class="boton-volver">Inicio</a>

</body>
</html>
