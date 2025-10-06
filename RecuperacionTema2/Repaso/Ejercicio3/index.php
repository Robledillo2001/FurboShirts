<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Acceder a un array multidimensional en PHP">
    <meta name="author" content="Tu Nombre">
    <meta name="keywords" content="PHP, array multidimensional, tienda online">
    <title>Acceder a Array Multidimensional</title>
</head>
<body>
    <h1>Tienda Online</h1>
    <?php
        // Declarar el array multidimensional
        $tienda = [
            "Electrónica" => [
                ["nombre" => "TV", "precio" => 300],
                ["nombre" => "PS5", "precio" => 500],
                ["nombre" => "Portátil", "precio" => 800]
            ],
            "Hogar" => [
                ["nombre" => "Silla", "precio" => 50],
                ["nombre" => "Mesa", "precio" => 120],
                ["nombre" => "Cama", "precio" => 200]
            ],
            "Ropa" => [
                ["nombre" => "Chándal", "precio" => 40],
                ["nombre" => "Zapatos", "precio" => 60],
                ["nombre" => "Deportivas", "precio" => 90]
            ]
        ];

        // Mostrar el array completo
        echo "<h2>Productos disponibles:</h2>";
        echo "<ul>";
        foreach ($tienda as $categoria => $productos) {
            echo "<li><strong>$categoria</strong><ul>";
            foreach ($productos as $producto) {
                echo "<li>{$producto['nombre']} - {$producto['precio']}€</li>";
            }
            echo "</ul></li>";
        }
        echo "</ul>";

        // Acceder al precio del segundo producto de "Hogar"
        $precioSegundoProductoHogar = $tienda["Hogar"][1]["precio"];
        echo "<h2>Precio del segundo producto de 'Hogar': $precioSegundoProductoHogar €</h2>";
    ?>
</body>
</html>
