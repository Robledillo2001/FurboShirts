<?php
  mysqli_report(MYSQLI_REPORT_OFF);
  $conexion=@mysqli_connect("localhost","root","","curso_php");
  if(!$conexion){
    die("Error en la conexion de la BSD: ".mysqli_connect_error());
  }

  if(isset($_POST['codigo'])&&!empty($_POST['codigo'])){
    $codigo=mysqli_escape_string($conexion,$_POST['codigo']);
    $eliminacion="DELETE FROM productos WHERE CODIGO_ART=$codigo";
    $consulta=@mysqli_query($conexion,$eliminacion);

    if($consulta){
      echo "Producto con el codigo $codigo ha sido eliminado";
    }else{
      die("Error en la eliminacion ".mysqli_error($conexion));
    }
  }
?>
