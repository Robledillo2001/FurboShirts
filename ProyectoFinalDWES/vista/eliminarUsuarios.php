<html>
    <head>
        <title>Eliminar Usuarios</title>
        <link rel="stylesheet" href="estilos.css">
        <style>
            /* Etiquetas */
            label {
                display: block;
                text-align: left;
                font-weight: bold;
                margin: 10px 0 5px;
            }

            /* Campos de entrada */
            input {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                transition: 0.3s;
            }

            input:focus {
                border-color: #007bff;
                outline: none;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            /* Botón de login */
            button {
                width: 100%;
                padding: 12px;
                background: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 18px;
                cursor: pointer;
                margin-top: 15px;
                transition: 0.3s;
            }

            button:hover {
                background: #0056b3;
            }

            /* Responsivo para pantallas pequeñas */
            @media (max-width: 480px) {
                form {
                    padding: 20px;
                }
                
                input {
                    font-size: 14px;
                }

                button {
                    font-size: 16px;
                }
            }

            select {
                width: 100%;
                padding: 12px;
                border: 2px solid #007bff;
                border-radius: 5px;
                font-size: 16px;
                background: white;
                color: #333;
                appearance: none; /* Oculta el estilo nativo */
                -webkit-appearance: none;
                -moz-appearance: none;
                cursor: pointer;
                outline: none;
                transition: 0.3s ease-in-out;
            }
        </style>
    </head>
    <body>
    <form action="index.php?action=eliminarUsuarios" method="post">
    <label for="rol">Rol</label>
    <select name="rol" id="rol" required onchange="this.form.submit()">
        <option value="" disabled selected>Selecciona un rol</option>
        <option value="admin" <?= (isset($_POST['rol']) && $_POST['rol'] === "admin") ? "selected" : "" ?>>Admin</option>
        <option value="user" <?= (isset($_POST['rol']) && $_POST['rol'] === "user") ? "selected" : "" ?>>Usuario</option>
    </select>
</form>

<?php if (isset($_POST['rol'])): ?>
    <form action="index.php?action=eliminarUsuarios" method="post">
        <input type="hidden" name="rol" value="<?= htmlspecialchars($_POST['rol']) ?>">
        
        <label for="nombre"><?= $_POST['rol'] === "admin" ? "Administradores" : "Usuarios" ?></label>
        <select name="nombre" required>
            <?php if ($_POST['rol'] === "admin"): ?>
                <?php foreach ($admins as $admin): ?>
                    <option value="<?= htmlspecialchars($admin['NOMBRE']) ?>">
                        <?= htmlspecialchars($admin['NOMBRE']) ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach ($users as $usuario): ?>
                    <option value="<?= htmlspecialchars($usuario['NOMBRE']) ?>">
                        <?= htmlspecialchars($usuario['NOMBRE']) ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select><br>

        <button type="submit">Eliminar <?= $_POST['rol'] === "admin" ? "Administrador" : "Usuario" ?></button><br>
        <a href="index.php?action=inicio" class="boton-volver">Volver a Inicio</a>
    </form>
    <?php endif; ?>  
    </body>
</html>