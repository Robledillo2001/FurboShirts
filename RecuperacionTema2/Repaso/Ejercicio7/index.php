<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descripción breve de tu página">
    <meta name="author" content="Tu Nombre">
    <meta name="keywords" content="HTML, plantilla, ejemplo">
    <title>Lista Compra</title>
</head>
<body>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad"><br>
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad"><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        session_start();
        if(!isset($_SESSION['personas'])){
                $_SESSION['personas']=[];
        }
        if(isset($_POST['nombre'],$_POST['edad'],$_POST['ciudad'])){
            $_SESSION['personas'][]=[
                "nombre"=>$_POST['nombre'],
                "edad"=>$_POST['edad'],
                "ciudad"=>$_POST['ciudad']
            ];
        }

        if(isset($_SESSION['personas'])){
            $i=0;
            echo "<h3>Personas Registradas</h3>
                <ul>";
            foreach($_SESSION['personas'] as $persona){
                $i+=1;
                echo "<h1>Persona $i</h1>
                    <li>Nombre:".$persona['nombre']."</li>
                    <li>Edad:".$persona['edad']."</li>
                    <li>Ciudad:".$persona['ciudad']."</li>";
            }
            echo "</ul>";
        }
    ?>
</body>
</html>
