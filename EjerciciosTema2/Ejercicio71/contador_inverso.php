<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>While ADIVINAR Nº</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        form {
            margin-bottom: 20px;
            font-size: 23px;
        }
        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <h1>Adivina el Nº</h1>

    <form action="" method="get">
        <label for="numero">Número (entre 1 y 100):</label>
        <input type="number" name="numero" min="1" max="100" required>
        <button type="submit">Adivinar</button>
    </form>

    <?php
        session_start(); // Iniciar sesión

        // Verifica si el número secreto ya fue establecido
        if (!isset($_SESSION['numeroAdivinar'])) {
            $_SESSION['numeroAdivinar'] = rand(1, 100); // Generar número aleatorio
        }

        // Verifica si se ha enviado un número
        if (isset($_GET['numero'])) {
            $numero = intval($_GET['numero']); // Obtener el número ingresado
            echo "<div class='resultado'>";

            // Bucle while para permitir que el usuario adivine el número
            while ($numero !== $_SESSION['numeroAdivinar']) {
                // Mensaje dependiendo del número ingresado
                if ($numero < $_SESSION['numeroAdivinar']) {
                    echo "El número es mayor. ¡Intenta de nuevo!<br>";
                } else {
                    echo "El número es menor. ¡Intenta de nuevo!<br>";
                }

                // Termina el bucle si el usuario no ha adivinado correctamente
                // Si quieres permitir más intentos, debes terminar la ejecución del script.
                // Aquí se rompe el bucle y muestra nuevamente el formulario.
                break; // Sale del bucle y vuelve a mostrar el formulario.
            }

            // Si adivina el número, mostrar mensaje de éxito
            if ($numero === $_SESSION['numeroAdivinar']) {
                echo "¡Felicidades! Has adivinado el número: {$_SESSION['numeroAdivinar']}<br>";
                unset($_SESSION['numeroAdivinar']); // Reiniciar el juego
            }

            echo "</div>";
        }
    ?>
</body>
</html>
