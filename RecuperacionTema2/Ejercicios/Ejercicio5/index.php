<html>
    <head>
        <title>insertar</title>
    </head>
    <body>
        <form method="post">
            <label for="agregar">Nombre Productos</label>
            <input type="text"name="agregar">
            <button>Agregar Producto</button>
        </form>
        <?php
            session_start();
            if(!isset($_SESSION['carrito'])){
                $_SESSION['carrito']=[];
            }

            if(isset($_POST['agregar'])){
                $agregar=$_POST['agregar'];

                $_SESSION['carrito'][]=$agregar;

                foreach($_SESSION['carrito']as $producto){
                    echo "$producto<br>";
                }
            }
        ?>
        </table>
    </body>
</html>