<html>
    <head>
        <?php
            if(!isset($_SESSION['usuario'])){
                header("Location: index.php=login");
                exit;
            }
        ?>
        <title>Devolver Vehiculo</title>
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
        </style>
    </head>
    <body>
        <h1>Devolver Vehiculo</h1>
        <form action="index.php?action=devolverCoche" method="post">
            <!--Sacamos del id del alquiler-->
            <label>Id de alquiler</label>
            <input type="number" name="id_alquiler"><br>
            <!--Sacamos del id del vehiculo del alquiler-->
            <label>Id de Vehiculo</label>
            <input type="number" name="id_coche"><br>
            <button type="submit">Devolver Vehículo</button><br>
            <a href="index.php?action=inicio" class="boton-volver">Volver a Inicio</a>
            <a href="logout.php" class="boton-volver">Cerrar sesion</a>
        </form>
    </body>
</html>