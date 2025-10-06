<html>
    <head>
        <title>Escuchar Episodio</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <?php
            session_start();
            require_once "clases.php";

            if (!isset($_SESSION['Gestor'])) {
                $_SESSION['Gestor'] = serialize(new GestorPodcats());
            }

            if (!isset($_SESSION['nombre'])) {
                header('Location: login.php');
                exit;
            }

            if (isset($_SESSION['Gestor'])) {
                $gestor = unserialize($_SESSION['Gestor']);
            }

            // Obtener el podcast seleccionado si el formulario se envió
            $podcastSeleccionado = isset($_POST['podcast']) ? (int)$_POST['podcast'] : null;
        ?>

        <form method="post">
            <?php if (empty($gestor->podcast)): //Si no hay podcast mostrara un mensaje?>
                 <p>No hay podcasts disponibles.</p>
            <?php else: ?>
                <label for="podcast">Podcast:</label>
                <select name="podcast" required onchange="this.form.submit()">
                    <option value="">Selecciona un podcast</option>
                    <?php foreach ($gestor->podcast as $index => $podcast)://Si hay podcast los metera en el select de los podcast ?>
                        <option value="<?= $index ?>" <?= ($podcastSeleccionado === $index) ? 'selected' : '' ?>>
                            <?= $podcast->titulo ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>

                <?php if ($podcastSeleccionado !== null && isset($gestor->podcast[$podcastSeleccionado])): ?>
                <?php 
                    // Filtrar episodios no escuchados
                    $episodiosDisponibles = [];
                    if (!empty($gestor->podcast[$podcastSeleccionado]->episodiosAsociados)) {//Si el array de episodios no esta vacio lo recorremos
                        foreach ($gestor->podcast[$podcastSeleccionado]->episodiosAsociados as $index => $episodio) {
                            if (!$episodio['escuchado']) {//Y buscamos los episodios que no se hayan escuchado
                                $episodiosDisponibles[$index] = $episodio;
                            }
                        }
                    }

                ?>
                
                <?php if (empty($episodiosDisponibles)): //Si el array esta vacio se dejara se mostrara uin mensaje?>
                    <p>No hay episodios disponibles en este podcast.</p>
                <?php else: //Si no mostrara en una select los episodios disponibles?>
                    <label for="episodios">Episodios:</label>
                    <select name="episodios">
                        <?php foreach ($episodiosDisponibles as $index => $episodio): ?>
                            <option value="<?= $index ?>"><?=$episodio['titulo'] ?></option>
                        <?php endforeach; ?>
                    </select>
                        <br>
                        <button type="submit" name="escuchar">Seleccionar:</button>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
            </form>

        <?php
            if(isset($_POST['podcast'],$_POST['episodios'])){//Obtener informacion del podcast y episodio
                $podcastIndex=$_POST['podcast'];
                $episodioIndex=$_POST['episodios'];

                $fechaHoy=new DateTime();//Crear una variable con la fecha de hoy
                //Verificar que el podcast y el episodio existe en el gestor
                if (isset($gestor->podcast[$podcastIndex]) && isset($gestor->podcast[$podcastIndex]->episodiosAsociados[$episodioIndex]) && isset($_POST['escuchar'])) {
                    //Creamos una variable para comprobar la fecha del podcast es igual o mayor a la de hoy
                    $episodio=$gestor->podcast[$podcastIndex]->episodiosAsociados[$episodioIndex];
                    $fechaEpisodio=$episodio["fecha"];//CREAR UNA VARIABLE CON LA FECHA DEL EPISODIO
                    if($fechaHoy>=$fechaEpisodio){//Si la fecha de Hoy es mayor o igual a la del episodio se marcara escuchado
                        $gestor->podcast[$podcastIndex]->episodiosAsociados[$episodioIndex]['escuchado']=true;//Marcar como episodio escuchado

                        $_SESSION['Gestor']=serialize($gestor);//Se serializa el gestor al cambiar a escuchado el podcast

                        echo "<h1>Episodio escuchado, espero que le haya gustado!</h1>";
                    }else{//Si la fecha de hoy es menor a la del episodio no se escuchara y mostrara un aviso
                        echo "<h1>El episodio no se puede escuchar porque aun no esta disponible</h1>";
                    }
                }
            }
        ?>
        <br>
        <a href="menu.php">Volver al menú</a>
    </body>
</html>
