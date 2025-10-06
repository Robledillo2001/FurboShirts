<html>
    <head>
        <title>Menu de Podcast</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>

        <?php
        session_start();
            if(!isset($_SESSION['nombre'])){//Si no hay un usuario logueado se redirije al login
                header('Location: login.php');
                exit;
            }
        ?>
        <div>
            <a href="añadirPodcast.php">Añadir Podcast</a>
            <a href="añadirEpisodio.php">Añadir Episodio</a>
            <a href="listarPodcast.php">Listar Podcast</a>
            <a href="escucharEpisodio.php">Escuchar Episodio</a>
            <a href="logout.php">Cerrar Sesion</a>
        </div>
    </body>
</html>