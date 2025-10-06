<html>
    <head>
        <title>Cambiar Contraseña</title>
        <style>
            /* Etiquetas */
            form{
                display: flex;
                flex-direction: column;
            }
            label {
                display: block;
                text-align: left;
                font-weight: bold;
                margin: 10px 0 5px;
            }

            /* Campos de entrada */
            input {
                width: 50%;
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
                width: 50%;
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

            p{
                font-size: 20px;
            }

            a{
                text-decoration: none;
                color:#0056b3;
            }
            a:hover{
                background-color: #0056b3;
                color:white;
            }
        </style>
    </head>
    <body>
        <form action="index.php?action=cambiarContraseña" method="post">
            <h1>Cambiar Contraseña</h1>
            <label for="contraseña">Contraseña Anterior:</label>
            <input type="password" name="contraseña"><br>
            <label for="nueva">Contraseña Nueva:</label>
            <input type="password" name="nueva"><br>
            <label for="comprobar">Comprobacion:</label>
            <input type="password" name="comprobar"><br>
            <button type="submit">Cambiar Contraseña</button><br>
        </form>

        <p>Volver a -><a href="index.php?action=inicio">inicio</a></p>
    </body>
</html>
