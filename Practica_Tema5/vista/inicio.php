<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler de Vehiculos</title>
    <style>
        /* Estilo general */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
        }

        /* Encabezado */
        h1 {
            text-align: center;
            font-size: 3rem;
            margin-top: 50px;
            color: #4CAF50;
        }

        /* Estilo del párrafo */
        p {
            text-align: center;
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 40px;
        }

        /* Estilo del contenedor de los botones */
        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }

        /* Estilo de los botones */
        .button {
            text-decoration: none;
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.1rem;
            color: #fff;
            background-color: #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Efecto de hover para los botones */
        .button:hover {
            background-color: #45a049;
            transform: translateY(-3px);
        }

        /* Efecto de foco para los botones */
        .button:focus {
            outline: none;
            box-shadow: 0 0 5px #4CAF50;
        }

        /* Estilo para la vista móvil */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .container {
                flex-direction: column;
                gap: 15px;
            }

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <h1>Gestion Alquiler de Vehiculos</h1>
    <p>Seleccione una acción:</p>
    <div class="container">
        <a href="index.php?action=alquilarVehiculo" class="button">Alquilar un Vehiculo</a>
        <a href="index.php?action=devolverVehiculo" class="button">Devolver un Vehiculo</a>
        <a href="index.php?action=historial" class="button">Ver Historial de Alquileres</a>
    </div>
</body>
</html>
