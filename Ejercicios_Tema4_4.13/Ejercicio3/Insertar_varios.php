<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insertar Múltiples Productos</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #f4f4f4;
    }
    .button {
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #28a745;
      color: white;
      border: none;
      cursor: pointer;
    }
    .button:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>

  <h1>Insertar Múltiples Productos</h1>

  <form action="" method="POST">
    <table id="productos">
      <thead>
        <tr>
          <th>Código</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>País</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" name="codigo[]" required></td>
          <td><input type="text" name="nombre[]" required></td>
          <td><input type="number" name="precio[]" step="0.01" required></td>
          <td><input type="text" name="pais[]" required></td>
          <td><button type="button" onclick="eliminarFila(this)">Eliminar</button></td>
        </tr>
      </tbody>
    </table>
    <button type="button" onclick="agregarFila()">Agregar Fila</button>
    <button type="submit" class="button">Insertar Productos</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
      $conexion = new PDO("mysql:host=localhost;dbname=curso_php", "root", "");
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conexion->exec("SET CHARACTER SET utf8");

      $sql = "INSERT INTO productos (CODIGO_ART, NOMBRE_ART, PRECIO, PAIS) VALUES (:codigo, :nombre, :precio, :pais)";
      $stmt = $conexion->prepare($sql);

      $productos = $_POST['codigo'];
      for ($i = 0; $i < count($productos); $i++) {
        $stmt->execute([
          ':codigo' => $_POST['codigo'][$i],
          ':nombre' => $_POST['nombre'][$i],
          ':precio' => $_POST['precio'][$i],
          ':pais' => $_POST['pais'][$i]
        ]);
      }

      echo "<p style='color: green;'>Todos los productos se han insertado correctamente.</p>";
    } catch (PDOException $e) {
      die("<p style='color: red;'>ERROR: " . $e->getMessage() . "</p>");
    }
  }
  ?>

  <script>
    function agregarFila() {
      const table = document.getElementById('productos').getElementsByTagName('tbody')[0];
      const newRow = table.rows[0].cloneNode(true);
      const inputs = newRow.getElementsByTagName('input');
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
      }
      table.appendChild(newRow);
    }

    function eliminarFila(button) {
      const row = button.parentNode.parentNode;
      const table = row.parentNode;
      if (table.rows.length > 1) {
        table.removeChild(row);
      } else {
        alert('Debe haber al menos una fila.');
      }
    }
  </script>

</body>
</html>
