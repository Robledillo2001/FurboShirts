<html>
    <head>
        <title>Tabla multiplicar</title>
    </head>
    <body>
        <form action=""method="post">
            <label for="numero">NUMERO:</label>
            <input type="number"name="numero">
        </form>
    <?php
        if(isset($_POST['numero'])){
            $numero=$_POST['numero'];
            for($i=0;$i<=10;$i++){
                $resultado=$i*$numero;
                echo "$numero * $i= $resultado <br>";
            }
        }
    ?>
    </body>
</html>