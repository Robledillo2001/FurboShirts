<html>
    <head>
        <title>Tabla multiplicar</title>
    </head>
    <body>
        <form action=""method="post">
            <label for="numero">NUMERO:</label>
            <select name="eleccion">
                <option value="piedra">Piedra:</option>
                <option value="papel">Papel:</option>
                <option value="tijera">Tijera:</option>
            </select>
            <button type="submit">Enviar</button>
        </form>
        <?php
        session_start(); // Iniciar la sesión al principio del script

        if (isset($_POST['eleccion'])) {
            $eleccion_Jugador = $_POST['eleccion'];
            $rival = rand(1,3);

            switch ($rival) {
                case 1:
                    $eleccion_Rival = "piedra";
                    break;
                case 2:
                    $eleccion_Rival = "papel";
                    break;
                case 3:
                    $eleccion_Rival = "tijera";
                    break;
            }

            // Inicializar contadores de sesión solo si no existen
            if (!isset($_SESSION['victorias'],$_SESSION['empates'],$_SESSION['derrotas'])) {
                $_SESSION['victorias'] = 0;
                $_SESSION['empates'] = 0;
                $_SESSION['derrotas'] = 0;
            }

            // Determinar el resultado del juego
            if (($eleccion_Jugador === "piedra" && $eleccion_Rival === "tijera") ||
                ($eleccion_Jugador === "papel" && $eleccion_Rival === "piedra") ||
                ($eleccion_Jugador === "tijera" && $eleccion_Rival === "papel")) {
                $_SESSION['victorias']++;
                $resultado = "¡Ganaste!";
            } elseif ($eleccion_Jugador === $eleccion_Rival) {
                $_SESSION['empates']++;
                $resultado = "¡Empate!";
            } else {
                $_SESSION['derrotas']++;
                $resultado = "¡Perdiste!";
            }

            // Mostrar resultados
            echo "<h2>Resultado:</h2>";
            echo "Jugador eligió: $eleccion_Jugador<br>";
            echo "Rival eligió: $eleccion_Rival<br>";
            echo "<strong>$resultado</strong><br><br>";
            echo "Victorias: " . $_SESSION['victorias'] . "<br>";
            echo "Empates: " . $_SESSION['empates'] . "<br>";
            echo "Derrotas: " . $_SESSION['derrotas'] . "<br>";
        }
        ?>
    </body>
</html>