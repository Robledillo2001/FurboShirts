<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .button {
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Bienvenido a la Biblioteca</h1>
    <p>Seleccione una acción:</p>
    <div class="container">
        <a href="index.php?action=registrarPrestamo" class="button">Registrar Préstamo</a>
        <a href="index.php?action=devolver" class="button">Registrar Devolución</a>
        <a href="index.php?action=historial" class="button">Ver Historial de Préstamos</a>
    </div>
</body>
</html>
