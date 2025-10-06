<html>
    <?php
        if(!isset($_SESSION['usuario'])){
            header("Location: index.php=login");
            exit;
        }
    ?>
    <head>
        <title>Alquilar Vehículo</title>
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
        <h1>Alquilar Vehículo</h1>
        <form action="index.php?action=alquilarCoche" method="post">
            <label>Coches</label>
            <select name="id_coche">
            <?php foreach ($coches as $coche): // Añadimos los vehículos en el select ?>
                <?php if ($coche['cantidad'] > 0): // Si no hay ejemplares, no los muestra ?>
                    <option value="<?= htmlspecialchars($coche['id']) ?>">
                        <?= htmlspecialchars($coche['marca'] . ' ' . $coche['modelo']) ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>

            </select><br>

            <label>Fecha de Alquiler</label>
            <input type="date" name="fecha" required><br>

            <button type="submit">Alquilar Vehículo</button><br>
            <a href="index.php?action=inicio" class="boton-volver">Volver a Inicio</a>
            <a href="index.php?action=verCoches" class="boton-volver">Ver Coches</a>
            <a href="logout.php" class="boton-volver">Cerrar sesion</a>
        </form>
    </body>
</html>
