<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Eliminar Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<h1>Eliminar Producto</h1>
  <?php
    mysqli_report(MYSQLI_REPORT_OFF);
    $conexion = @mysqli_connect('localhost', 'root', '', 'curso_php');
  ?>
  <h1>Gestionar Productos</h1>
    <form method="POST">
        <table border="1">
            <thead>
                <tr>
                    <th>Seleccionar</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>País</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
  <?php
      $select="SELECT * FROM productos";
      $consulta=@mysqli_query($conexion,$select);

      if($consulta->num_rows>0){
        foreach($consulta as $clave){
          echo "<tr>";
          echo "<td><input type='checkbox' name='productos[]' value='" . $clave['CODIGO_ART'] . "'></td>";
          echo "<td>".$clave['CODIGO_ART']."</td>";
          echo "<td>".$clave['NOMBRE_ART']."</td>";
          echo "<td>".$clave['PAIS']."</td>";
          echo "<td>".$clave['PRECIO']."</td>";
          echo "</tr>";
        }
      }else{
        die("ERROR DE CONSULTA ".mysqli_error($conexion));
      }
  ?>
    </tbody>
  </table>
  <br>
  <button type="submit">Eliminar seleccionados</button>
  <?php
    if(isset($_POST['productos'])){
      $productos = $_POST['productos'];
      $productos_escapados = array_map('intval', $productos);
      $productos_list = implode(',', $productos_escapados);

      $eliminar = "DELETE FROM productos WHERE CODIGO_ART IN ($productos_list)";
      $eliminacion=mysqli_query($conexion,$eliminar);

      if($eliminacion){
        $cantidad = mysqli_affected_rows($conexion);
        echo "<p>Se eliminaron $cantidad producto(s) correctamente.</p>";
      }else{
        die("Error en la eliminacion ".mysqli_query($conexion,$eliminacion));
      }
    }
  ?>
</body>
</html>
