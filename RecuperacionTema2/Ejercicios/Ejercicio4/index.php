<html>
    <head>
        <title>insertar</title>
    </head>
    <body>

    <?php
        $cursos=[
            "Curso 1"=>["Nombre"=>"DWEC","Horas"=>50,"Alumnos"=>6],
            "Curso 2"=>["Nombre"=>"DWE2","Horas"=>50,"Alumnos"=>6],
            "Curso 3"=>["Nombre"=>"ENDES","Horas"=>20,"Alumnos"=>1]
        ];
        foreach($cursos as $curso=>$info){
            echo "Informacion de $curso
            <ul>";
            foreach($info as $clave=>$valor){
                echo "<li>$clave: $valor</li>";
            }
            echo "</ul>";
        }
    ?>
    </body>
</html>