<html>
    <head>
        <title>Añadir Episodio</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <?php
            session_start();
            require_once 'clases.php';

            if (!isset($_SESSION['Gestor'])) {//Si no existe gestor se crea uno nuevo
                $_SESSION['Gestor'] = serialize(new GestorPodcats());
            }

            if(isset($_SESSION['Gestor'])){//Si ya hay un gestor de podcast se deserializa para acceder a la informacion
                $gestor=unserialize($_SESSION['Gestor']);
            }

            if(!isset($_SESSION['nombre'])){//Si no hay un usuario logueado se redirije al login
                header('Location: login.php');
                exit;
            }
        ?>
        
        <h2>Añadir Episodio</h2>
        
        <?php if(empty($gestor->podcast)): ?>
            <p>No hay podcasts disponibles. Primero crea un podcast.</p>
        <?php else: ?>
            <form method="post">
                <label for="podcast">Podcast:</label>
                <select name="podcast" required>
                    <?php
                    foreach($gestor->podcast as $index => $podcast) {//Recogemos todos los datos de los podcast a seleccionar para añadir un episodio nuevo
                        echo "<option value='$index'>" . $podcast->titulo . "</option>";
                    }
                    ?>
                </select><br>
                
                <label>Título del episodio:</label>
                <input type="text" name="titulo" required><br>
                
                <label>Duración (minutos):</label>
                <input type="number" name="duracion" required><br>

                <label>Tema/Invitado/Ponente:</label>
                <input type="text" name="tema" required><br>
                
                <label>Fecha:</label>
                <input type="date" name="fecha" required><br>
                
                <button type="submit" name="añadir">Añadir Episodio</button>
            </form>
        <?php endif; ?>

        <a href="menu.php">Volver al menú</a>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['añadir'])) {
            
            $podcastIndex = (int)$_POST['podcast'];//POdcast seleccionado
            $titulo = $_POST['titulo'];//Titulo del episodio
            $duracion = (int)$_POST['duracion'];//Duracion del podcast
            $tema = $_POST['tema'];//Tema del episodio del que tratara el podcast segun el tipo de podcast
            $fecha = new DateTime($_POST['fecha']);//Añade una fecha con la fecha del formulario

            $podcast = $gestor->podcast[$podcastIndex];//Saca el podcast del gestor por el indice del podcast
            $episodio = new Episodio($titulo, $duracion, $fecha);//Se crea un Objeto de Episodio con la duracion, titulo y fecha del form

            // Actualizar información específica del podcast verificando la clase especifica de la instancia
            if($podcast instanceof PodcastDocumental) {
                $podcast->setTema($tema);//Cambia el tema Principal si es un Documental
            } elseif($podcast instanceof PodcastEntrevista) {
                $podcast->setInvitado($tema);//Cambia el Invitado si es una Entrevista
            } elseif($podcast instanceof PodcastCharla) {
                $podcast->setPonente($tema);//Cambia el Ponente si es una Charla
            }

            $podcast->añadirEpisodio($episodio);
                
            // Actualizar la sesión con los cambios
            $_SESSION['Gestor'] = serialize($gestor);//Al añadir un podcast al gestor se vuelve a serializar
                
            echo "Episodio añadido";
            exit();
        }
        ?>
    </body>
</html>
