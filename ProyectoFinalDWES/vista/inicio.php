<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler de Vehiculos</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        /* Estilo general */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            line-height: 1.6;
        }


        /* Encabezado */
        h1 {
            text-align: center;
            font-size: 3rem;
            margin-top: 50px;
            color: #4CAF50;
        }

        h2{
            text-align: center;
            font-size: 2rem;
            color: #555;
            margin-bottom: 40px;
        }

        /* Estilo del párrafo */
        p {
            text-align: center;
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 40px;
        }

        /* Estilo del contenedor de los botones */
        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }

        /* Estilo de los botones */
        .button {
            text-decoration: none;
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.1rem;
            color: #fff;
            background-color: #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Efecto de hover para los botones */
        .button:hover {
            background-color: #45a049;
            transform: translateY(-3px);
        }

        /* Efecto de foco para los botones */
        .button:focus {
            outline: none;
            box-shadow: 0 0 5px #4CAF50;
        }

        /* Estilo para la vista móvil */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .container {
                flex-direction: column;
                gap: 15px;
            }

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['usuario'])){
            header("Location: index.php?action=comprobarLogin");
            exit;
        }

        if(isset($_SESSION['rol'])){
            if($_SESSION['rol']==="usuario"){
                echo "<h1>Alquiler de Coches</h1>";
                if(isset($_COOKIE[$_SESSION['rol']])){
                    if(isset($_COOKIE['recordar_user'])){
                        echo "<h2>Elija una opcion: ".$_COOKIE['recordar_user']."</h2>";
                    }else{
                        echo "<h2>Bienvenido ".$_COOKIE[$_SESSION['rol']]."</h2>";
                    }
                }
                ?>
                    <p>Seleccione una acción:</p>
                    <div class="container">
                        <a href="index.php?action=alquilarCoche" class="button">Alquilar un Coche</a>
                        <a href="index.php?action=devolverCoche" class="button">Devolver un Coche</a>
                        <a href="index.php?action=verCoches" class="button">Ver Coches</a>
                        <a href="index.php?action=cambiarNombre" class="button">Cambiar Nombre</a>
                        <a href="index.php?action=cambiarContraseña" class="button">Cambiar Contraseña</a>
                        <a href="logout.php" class="button">Cerrar sesion</a>
                    </div>
                <?php
            }else{
                echo "<h1>Gestion de Usuarios, Alquileres y Coches</h1>";
                if(isset($_COOKIE[$_SESSION['rol']])){
                    if(isset($_COOKIE['recordar_user'])){
                        echo "<h2>Elija una opcion: ".$_COOKIE['recordar_user']."</h2>";
                    }else{
                        echo "<h2>Bienvenido ".$_COOKIE[$_SESSION['rol']]."</h2>";
                    }
                }
                ?>
                    <p>Seleccione una acción:</p>
                    <div class="container">
                        <a href="index.php?action=historial" class="button">Ver Alquileres</a>
                        <a href="index.php?action=añadirCoche" class="button">Añadir Coches</a>
                        <a href="index.php?action=borrarCoche" class="button">Borrar Coches</a>
                        <a href="index.php?action=verUsuarios" class="button">Ver Usuarios</a>
                        <a href="index.php?action=cambiarNombre" class="button">Cambiar Nombre</a>
                        <a href="index.php?action=cambiarContraseña" class="button">Cambiar Contraseña</a>
                        <a href="index.php?action=agregarUsuarios" class="button">Añadir Usuarios</a>
                        <a href="index.php?action=eliminarUsuarios" class="button">Borrar Usuarios</a>
                        <a href="logout.php" class="button">Cerrar sesion</a>
                    </div>
                <?php
            }
        }
    ?>
    
</body>
</html>
