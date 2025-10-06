<html>
    <head>
        <title>insertar</title>
    </head>
    <body>

    <?php
        $array=[
            "Electronica"=>["TV","PC","PS5"],
            "Hogar"=>["LAVADORA","SOFA","SILLA"],
            "Ropa"=>["CAMISETA","PANTALON","CALCETINES"],
        ];

        foreach($array as $categoria=>$productos){
            echo "Productos de $categoria
            <ul>";
            foreach($productos as $producto){
                echo"<li>$producto</li>";
            }
            echo"</ul>";
        }

        echo $array["Hogar"][1];
    ?>
    </body>
</html>