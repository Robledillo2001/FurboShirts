<html>
    <head>
        <title>insertar</title>
    </head>
    <body>
        <form method="post">
            <label for="evento">Eventos</label>
            <select name="evento">
                <option value="ev1">Evento 1</option>
                <option value="ev2">Evento 2</option>
                <option value="ev3">Evento 3</option>
            </select>
            <button type="submit">ENVIAR</button>
        </form>
        <?php
            session_start();

            if(!isset($_SESSION['evento1'])){
                $_SESSION['evento1']=0;
            }

            if(!isset($_SESSION['evento2'])){
                $_SESSION['evento2']=0;
            }

            if(!isset($_SESSION['evento3'])){
                $_SESSION['evento3']=0;
            }

            if(isset($_POST['evento'])){
                $evento=$_POST['evento'];

                if($evento=="ev1"){
                    $_SESSION['evento1']+=1;
                }elseif($evento=="ev2"){
                    $_SESSION['evento2']+=1;
                }else{
                    $_SESSION['evento3']+=1;
                }
            }
            echo "Votos 
                    Evento 1: ".$_SESSION['evento1']."<br>
                    Evento 2: ".$_SESSION['evento2']."<br>
                    Evento 3: ".$_SESSION['evento3']."<br>
            ";
        ?>
    </body>
</html>