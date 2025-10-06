<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Préstamos</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <form action="" method="post">
        <label for="prestamo">Tipo de Préstamo:</label>
        <select name="prestamo">
            <option value="personal">Préstamo Personal</option>
            <option value="hipotecario">Préstamo Hipotecario</option>
        </select><br>
        
        <label for="capital">Capital Inicial (€):</label>
        <input type="number" name="capital" ><br>
        
        <label for="tasa">Tasa de Interés Anual (%):</label>
        <input type="text" inputmode="decimal"name="tasa" ><br>
        
        <label for="amortizacion">Plazo de Amortización (años):</label>
        <input type="number" name="amortizacion" ><br>

        <label for="posterior">Interes Posterior(%)</label>
        <input type="text" name="posterior" inputmode="decimal" >

        <label for="anoPos">Año interes Posterior</label>
        <input type="text" name="anoPos" inputmode="decimal" >
        
        <button type="submit" name="calcular">Calcular</button>
        <button type="submit" name="comparar">Comparar Préstamos</button>
        <h1><a href="logout.php">Reiniciar el Servidor</a><br></h2><br>
    </form>

    <div>
        <?php
        session_start();//Inicio de Sesion
        
        include_once("clases.php");//Archivo de las clases de Prestamo

        // Validar y convertir las entradas POST a tipos numéricos
        if (isset($_POST['calcular'], $_POST['prestamo'], $_POST['capital'], $_POST['tasa'], $_POST['amortizacion'],$_POST['posterior'],$_POST['anoPos'])) {
            $capital = floatval($_POST['capital']);
            $tasa = floatval($_POST['tasa']) / 100;
            $amortizacion = intval($_POST['amortizacion']);
            $tipo = $_POST['prestamo'];
            $posterior=floatval($_POST['posterior'])/100;
            $prestamo = null;
            $anoPos=intval($_POST['anoPos']);

            // Validaciones
            if ($tipo == "personal") {
                if ($capital > 60000) {
                    echo "La cantidad de $capital supera el límite máximo de 60,000 € para Préstamo Personal.<br>";
                } elseif ($tasa < 0.05 || $tasa > 0.15) {
                    echo "La tasa de interés debe estar entre 5% y 15% para Préstamo Personal.<br>";
                } elseif ($amortizacion < 1 || $amortizacion > 10) {
                    echo "El plazo de amortización debe ser entre 1 y 10 años para Préstamo Personal.<br>";
                } else {
                    // Create a PrestamoPersonal instance, with or without posterior rate
                    if ($posterior > 0 && $anoPos>0) {
                        $prestamo = new PrestamoPersonal($capital, $tasa, $amortizacion, $posterior,$anoPos);
                    } else {
                        $prestamo = new PrestamoPersonal($capital, $tasa, $amortizacion);
                    }
                }
            } elseif ($tipo == "hipotecario") {
                if ($capital > 250000) {
                    echo "La cantidad de $capital supera el límite máximo de 250,000 € para Préstamo Hipotecario.<br>";
                } elseif ($tasa < 0.005 || $tasa > 0.08) {
                    echo "La tasa de interés debe estar entre 0.5% y 8% para Préstamo Hipotecario.<br>";
                } elseif ($amortizacion < 1 || $amortizacion > 30) {
                    echo "El plazo de amortización debe ser entre 1 y 30 años para Préstamo Hipotecario.<br>";
                } else {
                    // Create a PrestamoHipotecario instance, with or without posterior rate
                    if ($posterior > 0 && $anoPos>0) {
                        $prestamo = new PrestamoHipotecario($capital, $tasa, $amortizacion, $posterior,$anoPos);
                    } else {
                        $prestamo = new PrestamoHipotecario($capital, $tasa, $amortizacion);
                    }
                }
            }
            

            if ($prestamo !== null) {
                $cuota_mensual = $prestamo->calcularCuotaMensual();
                if (is_array($cuota_mensual)) {
                    echo "<h7>La cuota inicial a pagar será: <b>€" . number_format($cuota_mensual['cuota_inicial'], 2) . "</b></h7><br>";
                    
                    if (!empty($cuota_mensual['cuota_posterior'])) {
                        echo "<h7>La cuota posterior a pagar será: <b>€" . number_format($cuota_mensual['cuota_posterior'], 2) . "</b></h7><br><br><br>";
                    }
                } else {
                    echo "<h7>La cuota mensual a pagar será: <b>€" . number_format($cuota_mensual, 2) . "</b></h7><br><br><br>";
                }

                if (!isset($_SESSION['prestamos'])) {
                    $_SESSION['prestamos'] = [];
                }
                $_SESSION['prestamos'][] = [
                    'tipo' => ucfirst($tipo),
                    'capital' => $capital,
                    'tasa' => $tasa*100,
                    'amortizacion' => $amortizacion,
                    'cuota_inicial' => is_array($cuota_mensual) ? $cuota_mensual['cuota_inicial'] : $cuota_mensual,
                    'cuota_posterior' => is_array($cuota_mensual) ? $cuota_mensual['cuota_posterior'] : null,
                    'interes_posterior'=>$posterior*100,
                    'anoPos'=>$anoPos
                ];
            }
        }

        // Mostrar la tabla de comparación de préstamos
        if (isset($_POST['comparar']) && isset($_SESSION['prestamos'])) {
            echo "<h3>Comparación de Préstamos Calculados:</h3>";
            echo "<table border='1'>
                    <tr>
                        <th>Tipo</th>
                        <th>Capital (€)</th>
                        <th>Tasa (%)</th>
                        <th>Plazo (años)</th>
                        <th>Cuota Mensual o inicial (€)</th>
                        <th>Cuota Final(€)</th>
                        <th>Año Interes Posterior</th>
                        <th>Interes Posterior(%)</th>
                    </tr>";
            
            foreach ($_SESSION['prestamos'] as $prestamo) {
                echo "<tr>
                        <td>".$prestamo['tipo']."</td>
                        <td>".$prestamo['capital']."</td>
                        <td>".$prestamo['tasa']."</td>
                        <td>".$prestamo['amortizacion']."</td>
                        <td>€" . number_format($prestamo['cuota_inicial'], 2) . "</td>
                        <td>€" . number_format($prestamo['cuota_posterior'], 2) . "</td>
                        <td>".$prestamo['anoPos']."</td>
                        <td>".$prestamo['interes_posterior']."</td>
                      </tr>";
            }
            
            echo "</table>";
        }        
        ?>
    </div>
</body>
</html>
