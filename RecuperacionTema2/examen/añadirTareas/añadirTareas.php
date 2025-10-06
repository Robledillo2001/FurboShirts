<?php
session_start();

// Inicializar la sesión si no existe
if (!isset($_SESSION['tareas'])) {
    $_SESSION['tareas'] = [];
}

// Agregar tarea si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emp'], $_POST['tarea'], $_POST['prioridad'], $_POST['estados'])) {
    $empleado = $_POST['emp'];
    $tarea = $_POST['tarea'];
    $prioridad = $_POST['prioridad'];
    $estado = $_POST['estados'];

    $_SESSION['tareas'][] = [
        "Empleado" => $empleado,
        "Tarea" => $tarea,
        "Prioridad" => $prioridad,
        "Estado" => $estado
    ];

    echo "<p style='color: green;'>✅ Tarea añadida correctamente.</p>";
}
?>

<html>
<head>
    <title>Añadir Tareas</title>
</head>
<body>
    <h2>Añadir Nueva Tarea</h2>
    <form method="post">
        <label for="emp">Empleado: </label>
        <input type="text" name="emp" required>
        
        <label for="tarea">Tarea: </label>
        <input type="text" name="tarea" required>

        <label for="prioridad">Prioridad: </label>
        <select name="prioridad" required>
            <option value="Alta">Alta</option>
            <option value="Media">Media</option>
            <option value="Baja">Baja</option>
        </select>

        <label for="estados">Estado: </label>
        <select name="estados" required>
            <option value="Terminada">Terminada</option>
            <option value="Pendiente">Pendiente</option>
        </select>

        <button type="submit">Añadir Tarea</button>
    </form>

    <br>
    <a href="consultarTareas.php">🔍 Consultar Tareas</a>
</body>
</html>
