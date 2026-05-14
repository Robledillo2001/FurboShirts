<?php include __DIR__ . '/header.php'; ?>

<?php if(isset($_SESSION['contacto'])): ?>
    <script>
        alert('¡Mensaje de contacto enviado con éxito! Le intentaremos avisar en breve.');
    </script>
<?php 
    unset($_SESSION['contacto']); 
    endif; 
?>

<section class="contacto-container">
    <div class="contacto-info">
        <h2>¿Necesitas ayuda, Capitán?</h2>
        <p>Si tienes dudas con tu pedido, una talla o buscas una camiseta específica, escríbenos.</p>
        
        <div class="info-links">
            <a href="https://wa.me/tu_numero" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp: +123 456 789</a>
            <a href="mailto:lopezreinarobledilloruben@gmail.com"><i class="fas fa-envelope"></i> lopezreinarobledilloruben@gmail.com</a>
            <span><i class="fas fa-clock"></i> Lunes a Viernes: 09:00 - 21:00 | Sabados: 9:00 - 13:00</span>
        </div>
    </div>

    <div class="contacto-form">
        <form action="index.php?action=enviarContacto" method="POST" class="furboshirts-form">
            <div class="input-group">
                <label>Nombre</label>
                <input type="text" name="nombre" placeholder="Tu nombre" required>
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="correo" name="correo" placeholder="tu@email.com" required>
            </div>
            <div class="input-group">
                <label>Asunto</label>
                <select name="asunto">
                    <option value="pedido">Estado de mi pedido</option>
                    <option value="talla">Duda con las tallas</option>
                    <option value="especial">Camiseta personalizada / Especial</option>
                    <option value="otro">Otro motivo</option>
                </select>
            </div>
            <div class="input-group">
                <label>Mensaje</label>
                <textarea name="mensaje" rows="5" placeholder="Escribe aquí tu consulta..."></textarea>
            </div>
            <button type="submit" class="btn-submit">Enviar Mensaje</button>
        </form>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>