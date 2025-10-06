<html>
    <head>
        <title>Agregar Admin</title>
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

            /* Personalización del botón de subir archivo */
            .file {
                display: inline-block;
                padding: 12px 20px;
                background: #007bff;
                color: white;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: 0.3s;
                margin-bottom: 10px;
            }

            .file:hover {
                background: #0056b3;
            }
        </style>
    </head>
    <body>
        <form action="index.php?action=agregarAdmin" method="post">
            <label for="nombre">Nombre Usuario</label>
            <input type="text" name="nombre"><br>
            <label for="contraseña">Contraseña</label>
            <input type="password" name="contraseña"><br>
            <button type="submit">Añadir Usuario</button>
        </form> 
        <a href="index.php?action=inicio" class="boton-volver">Volver a Inicio</a>
    </body>
</html>