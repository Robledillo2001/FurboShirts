<html>
    <head>
        <title>Listar Podcast</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <?php
            session_start(); // Asegúrate de iniciar la sesión

            // Incluir las clases necesarias antes de acceder a los datos
            require_once 'clases.php';

            if (!isset($_SESSION['Gestor'])) {//Si no existe el gestor de podcast se crea el objeto de sesion serializandolo
                $_SESSION['Gestor'] = serialize(new GestorPodcats());
            }

            if(!isset($_SESSION['nombre'])){//Si no hay un usuario logueado se redirije al login
                header('Location: login.php');
                exit;
            }

            // Verificar si 'Gestor' está disponible en la sesión
            if (isset($_SESSION['Gestor'])) {
                $gestor=unserialize($_SESSION['Gestor']);
                // Asegúrate de que 'listarPodcast()' devuelva la información esperada
                $informacionPodcasts = $gestor->listarPodcast(); 

                if (!empty($informacionPodcasts)) {
                    // Mostrar la información de cada podcast
                    foreach ($informacionPodcasts as $informacion) {
                        echo "\n<pre>" . $informacion . "</pre>";
                    }
                } else {
                    echo "<p>No hay podcasts para mostrar.</p>";
                }
                $_SESSION['Gestor']=serialize($gestor);//Al mostrar todos los podcast se serializa otra vez el Gestor
            } else {
                echo "<p>No hay gestores de podcasts en sesión.</p>";
            }
        ?>
        <a href="menu.php">Volver al menú</a>
    </body>
</html>
