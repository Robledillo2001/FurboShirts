<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      color: #333;
      padding: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
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
  <h1>Login</h1>
  <form action=""method="POST">
    <label for="user">Usuario:</label>
    <input type="text" id="user" name="user"><br>
    <label for="contra">Contraseña:</label>
    <input type="password" id="contra" name="contra"><br><br>
    <button type="submit">INICIAR SESSION</button>
  </form>
  <div class="resultado">
    <?php
    session_start();
      if(isset($_POST['user'],$_POST['contra'])){/*Sacar los datos del formulario de inicio de Sesion*/
        $usuario=$_POST['user'];
        $contraseña=$_POST['contra'];
        $usuarioCorrecto="Ruben";
        $contraCorrecta="1234";/*Creamos cual va ha ser el usuario y contraseña correcto */

        if($usuario===$usuarioCorrecto&&$contraseña===$contraCorrecta){
            $_SESSION['usuario']=$usuario;
            $_SESSION['contraseña']=$contraseña;
            header('Location: tareas.php');/*Nos redirijira al menu de tareas si el login es correcto */
            exit;
        }else{
            echo "No se puede acceder a la gestion de datos intentelo de nuevo";
        }
      }

    ?>
  </div>
</body>
</html>
