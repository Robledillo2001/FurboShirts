<?php 
include __DIR__ . '/../header.php';
?>
<div class="login-container">
    <div class="formulario">
        <?php if (isset($error)): ?>
            <div style="background-color: #ffcccc; color: #cc0000; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; font-weight: bold;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <h2>ACTUALIZAR CONTRASEÑA</h2>
        <form action="index.php?action=restablecerPassword" method="POST">
            <input type="hidden" name="correo" value="<?php echo htmlspecialchars($correo); ?>">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($tokenURL); ?>">

            <div class="input-group">
                <label for="passwd">Nueva Contraseña</label>
                <input type="password" name="passwd" id="passwd" required>
            </div>

            <div class="input-group">
                <label for="passwd2">Repetir Nueva Contraseña</label>
                <input type="password" name="passwd2" id="passwd2" required>
            </div>

            <button type="submit" class="btn-login">Actualizar Contraseña</button>
        </form>
    </div>
</div>

<?php 
include __DIR__ . '/../footer.php'; 
?>