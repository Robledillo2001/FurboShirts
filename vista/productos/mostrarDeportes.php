<?php include __DIR__ . '/../header.php'; ?> 

<div class="layout-gestion">
    <aside class="sidebar-gestion">
        <h3>Administración</h3>
        <nav>
            <a href="index.php?action=MostrarDeportes" class="<?= ($_GET['action'] == 'MostrarDeportes') ? 'active' : '' ?>">
                <i class="fa-sharp fa-solid fa-futbol"></i> Deportes
            </a>
            <hr>
            <a href="index.php?action=GestionCategorias">
                <i class="fas fa-arrow-left"></i> Volver a Categorias
            </a>
        </nav>
    </aside>

    <main class="contenido-gestion">
        <div class="container-tabla">
            <div class="header-seccion">
                <h2 class="titulo-seccion">Deportes</h2>
                <div class="botones-header">
                    <a href="index.php?action=AnadirDeporte" class="btn-anadir">
                        <i class="fa-sharp fa-solid fa-futbol"></i> Añadir Deportes
                    </a>
                </div>
            </div>
            
            <table class="tabla-gestion">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DEPORTE</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Usamos la variable que definiste en el controlador para esta sección
                    if (!empty($depPag)): ?>
                        <?php foreach ($depPag as $d): ?>
                            <tr>
                                <td><strong><?= $d['ID_DEPORTE'] ?></strong></td>
                                <td><strong><?= htmlspecialchars($d['DEPORTE']) ?></strong></td>
                                <td>
                                    <a href="index.php?action=EditarDeporte&id=<?=$d['ID_DEPORTE']?>" class="btn-icon edit"><i class="fas fa-edit"></i></a>
                                    <a href="index.php?action=EliminarDeporte&id=<?=$d['ID_DEPORTE']?>" class="btn-icon delete" onclick="return confirm('¿Eliminar este Deporte?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6">No hay Deportes Agregados.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="paginacion">
            <?php 
            $action_actual = $_GET['action'];
            if ($paginaActual > 1): ?>
                <a href="index.php?action=<?= $action_actual ?>&pagina=<?= $paginaActual - 1 ?>" class="btn-pag">Anterior</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <a href="index.php?action=<?= $action_actual ?>&pagina=<?= $i ?>" 
                   class="btn-pag <?= ($i == $paginaActual) ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($paginaActual < $totalPaginas): ?>
                <a href="index.php?action=<?= $action_actual ?>&pagina=<?= $paginaActual + 1 ?>" class="btn-pag">Siguiente</a>
            <?php endif; ?>
        </div>
    </main>
</div>

<?php include __DIR__ . '/../footer.php'; ?>