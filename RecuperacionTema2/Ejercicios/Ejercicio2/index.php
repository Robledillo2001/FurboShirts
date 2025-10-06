<html>
    <head>
        <title>insertar</title>
    </head>
    <body>
        <form method="post">
            <label for="cantidad">Cantidad:</label>
            <input type="number"name="cantidad">
            <select name="producto">
                <option value="Producto A">Producto A</option>
                <option value="Producto B">Producto B</option>
                <option value="Producto C">Producto C</option>
            </select>
            <button>Insertar</button>
        </form>
    <?php
        $productos=[
            "Producto A"=>15,
            "Producto B"=>30,
            "Producto C"=>50
        ];

        foreach($productos as $producto=>$cantidad){
            echo "$producto con cantidad de $cantidad productos<br>";
        }
        if(isset($_POST['cantidad'],$_POST['producto'])){
            $cantidad=$_POST['cantidad'];
            $nombre=$_POST['producto'];
            foreach($productos as $producto=>$cantidadTotal){
                if($producto===$nombre){
                    $cantidadTotal+=$cantidad;
                    echo "$producto con cantidad de $cantidadTotal productos<br>";
                }
            }
        }
        
    ?>
    </body>
</html>