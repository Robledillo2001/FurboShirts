<html>
    <head>
        <title>Añadir Podcast</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <?php
            session_start();
            require_once 'clases.php';

            if (!isset($_SESSION['Gestor'])) {//Si no existe el gestor de podcast se crea el objeto de sesion serializandolo
                $_SESSION['Gestor'] = serialize(new GestorPodcats());
            }

            if(!isset($_SESSION['nombre'])){//Si no hay un usuario logueado se redirije al login
                header('Location: login.php');
                exit;
            }

            if(isset($_SESSION['Gestor'])){//Si ya hay un gestor de podcast se deserializa para acceder a la informacion
                $gestor=unserialize($_SESSION['Gestor']);
            }
        ?>
        <form method="post">
            <label>Título</label>
            <input type="text" name="titulo" value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : ''; ?>"><br>

            <label>Descripción</label><br>
            <textarea name="descripcion"><?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; ?></textarea><br>

            <label>Tipo de podcast</label>
            <select name="tipo">
                <option value="entrevista">Entrevista</option>
                <option value="charla">Charla</option>
                <option value="documental">Documental</option>
            </select><br>
            <button type="submit">Añadir Podcast</button>
        </form>

        <a href="menu.php">Volver al menú</a>

        <?php
            // Lógica de procesamiento final del formulario después de que todos los campos estén completados
            if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['titulo']) && !empty($_POST['descripcion'])) {
                $titulo = $_POST['titulo'];//Titulo del PODCAST
                $descripcion = $_POST['descripcion'];//Descripcion del POdcast
                $tipo = $_POST['tipo'];//Tipo de podcast

                //Se añaden los podcast segun el tipo que le hayamos mostrado
                    
                if ($tipo === "charla") {//Si es una charla se añade un podcast tipo Charla
                    $gestor->añadirPodcast(new PodcastCharla($titulo,$descripcion));
                } elseif ($tipo === "entrevista") {//Si es una charla se añade un podcast tipo Entrevista
                   $gestor->añadirPodcast(new PodcastEntrevista($titulo,$descripcion));
                } elseif ($tipo === "documental") {//Si es una charla se añade un podcast tipo Documental
                    $gestor->añadirPodcast(new PodcastDocumental($titulo,$descripcion));
                }
                $_SESSION['Gestor']=serialize($gestor);//Al añadir un podcast al gestor se vuelve a serializar
                
                echo "Podcast añadido correctamente";
            }
        ?>
    </body>
</html>
