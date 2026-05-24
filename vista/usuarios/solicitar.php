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
        <h2>Solicitar Recuperacion contraseña</h2>
        <form action="index.php?action=solicitarRecuperacion" method="POST">
            <div class="input-group">
                <label for="correo">Correo Electronico</label>
                <input type="text" name="correo" id="correo" required>
            </div>

            <button type="submit" class="btn-login">Solicitar Recuperacion</button>
        </form>
    </div>
</div>

<?php 
include __DIR__ . '/../footer.php'; 
?>