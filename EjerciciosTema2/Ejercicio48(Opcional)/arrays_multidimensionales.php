<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Superglobales en formularios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<style>
  form {
    text-align: justify;
    font-size: 23px;
  }
</style>
<body>
  <?php
    $libros = [
      [
          "titulo" => "Cien años de soledad",
          "autor" => "Gabriel García Márquez",
          "anio" => 1967
      ],
      [
          "titulo" => "1984",
          "autor" => "George Orwell",
          "anio" => 1949
      ],
      [
          "titulo" => "El señor de los anillos",
          "autor" => "J.R.R. Tolkien",
          "anio" => 1954
      ]
  ];
  function mostrarLibros($libros){
      foreach($libros as $libro){
        echo "Titulo: ".$libro['titulo']."<br>";
        echo "Autor: ".$libro['autor']."<br>";
        echo "Año: ".$libro['anio']."<br>";
        echo "<br>";
      }
      
  }
  mostrarLibros($libros);
  ?>
</body>
</html>
