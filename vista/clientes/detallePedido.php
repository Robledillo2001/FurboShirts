<?php include __DIR__ . '/../header.php'; ?> 

<div class="layout-gestion">
    <aside class="sidebar-gestion">
        <h3>Mi Pedido</h3>
        <nav>
            <a href="index.php?action=VerPedidos"><i class="fas fa-arrow-left"></i> Volver a mis Pedidos</a>
        </nav>
    </aside>

    <main class="contenido-gestion">
        <div class="container-tabla">
            <div class="header-seccion">
                <h2 class="titulo-seccion">Detalles del Pedido #<?= htmlspecialchars($_GET['id']) ?></h2>
            </div>

            <table class="tabla-gestion">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Talla</th>
                        <th>Personalización</th>
                        <th>Cantidad</th>
                        <th>Precio Un.</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_acumulado = 0;
                    foreach ($detalles as $d): 
                        $subtotal = $d['CANTIDAD'] * $d['PRECIO_UNITARIO'];
                        $total_acumulado += $subtotal;
                    ?>
                        <tr>
                            <td style="text-align: left; font-weight: bold;">
                                <?= htmlspecialchars($d['NOMBRE_PRODUCTO']) ?>
                            </td>
                            <td><span class="cart-badge"><?= htmlspecialchars($d['TALLA']) ?></span></td>
                            <td style="font-size: 0.85rem;">
                                <div><i class="fas fa-shield-alt"></i> <?= htmlspecialchars($d['PARCHE']) ?></div>
                                <?php if($d['NOMBRE_PERSONALIZADO']): ?>
                                    <div><i class="fas fa-user"></i> <?= htmlspecialchars($d['NOMBRE_PERSONALIZADO']) ?> (<?= $d['DORSAL'] ?>)</div>
                                <?php endif; ?>
                            </td>
                            <td>x<?= $d['CANTIDAD'] ?></td>
                            <td><?= number_format($d['PRECIO_UNITARIO'], 2) ?> €</td>
                            <td style="font-weight: bold;"><?= number_format($subtotal, 2) ?> €</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr style="background: #f4f7f6; font-size: 1.1rem;">
                        <td colspan="5" style="text-align: right; padding-right: 20px;"><strong>Total Productos:</strong></td>
                        <td style="color: #1a5224; font-weight: bold;"><?= number_format($total_acumulado, 2) ?> €</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
</div>

<?php include __DIR__ . '/../footer.php'; ?>