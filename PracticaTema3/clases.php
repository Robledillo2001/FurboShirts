<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Prestamos</title>
    <!-- Enlace a archivo de estilos CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Enlace a icono de la página (opcional) -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div>
        <?php
            abstract class Prestamo{//clase abstracta de prestamo
                public float $capitalIncial;
                public float $tasa;
                public int $plazoAmortizacion;
                public float $posterior;
                public int $anoPos;
                public function __construct(float $capital,float $tasa,int $plazo,float $pos=0,int $anoPos=0){
                    $this->capitalIncial=$capital;
                    $this->tasa=$tasa;
                    $this->plazoAmortizacion=$plazo;
                    $this->posterior=$pos;
                    $this->anoPos=$anoPos;
                }
                abstract public function calcularCuotaMensual();//Metodo abstracto que se usara en las subclases
            }

            class PrestamoPersonal extends Prestamo{
                public function __construct(float $capital,float $tasa,int $plazo,float $pos=0){
                    parent::__construct($capital,$tasa,$plazo,$pos);
                }
                
                public function calcularCuotaMensual() {
                    $tasa_mensual = $this->tasa / 12; // Tasa de interés mensual inicial
                    $num_pagos = $this->plazoAmortizacion * 12; // Número total de pagos
                    $cuota_inicial = $this->capitalIncial * $tasa_mensual / (1 - pow(1 + $tasa_mensual, -$num_pagos));
                
                    if ($this->anoPos > 0 && $this->posterior > 0) {
                        // Calcular pagos hasta el año del cambio de interés
                        $pagos_iniciales = $this->anoPos * 12;
                        $capital_pendiente = $this->capitalIncial;
                
                        for ($i = 0; $i < $pagos_iniciales; $i++) {
                            $interes_mes = $capital_pendiente * $tasa_mensual;
                            $capital_pendiente -= ($cuota_inicial - $interes_mes); // REDUCIENDO CAPITAL
                        }
                
                        // Calcular la nueva cuota con la tasa posterior
                        $tasa_mensual_nueva = $this->posterior / 12;
                        $num_pagos_restantes = ($this->plazoAmortizacion - $this->anoPos) * 12;
                
                        if ($capital_pendiente <= 0) { 
                            return [
                                'cuota_inicial' => round($cuota_inicial, 2),
                                'cuota_posterior' => 0 // Capital ya se pagó
                            ];
                        }
                
                        $cuota_posterior = $capital_pendiente * $tasa_mensual_nueva / (1 - pow(1 + $tasa_mensual_nueva, -$num_pagos_restantes));
                
                        return [
                            'cuota_inicial' => round($cuota_inicial, 2),
                            'cuota_posterior' => round($cuota_posterior, 2)
                        ];
                    } else {
                        return round($cuota_inicial, 2);
                    }
                    var_dump($capital_pendiente); 
                    var_dump($cuota_inicial);
                    var_dump($cuota_posterior);

                }                              
            }

            class PrestamoHipotecario extends Prestamo{
                public function __construct(float $capital,float $tasa,int $plazo,float $pos=0){
                    parent::__construct($capital,$tasa,$plazo,$pos);
                }
                
                public function calcularCuotaMensual() {
                    $tasa_mensual = $this->tasa / 12; // Tasa de interés mensual inicial
                    $num_pagos = $this->plazoAmortizacion * 12; // Número total de pagos
                    $cuota_inicial = $this->capitalIncial * $tasa_mensual / (1 - pow(1 + $tasa_mensual, -$num_pagos));
                
                    if ($this->anoPos > 0 && $this->posterior > 0) {
                        // Calcular pagos hasta el año del cambio de interés
                        $pagos_iniciales = $this->anoPos * 12;
                        $capital_pendiente = $this->capitalIncial;
                
                        for ($i = 0; $i < $pagos_iniciales; $i++) {
                            $interes_mes = $capital_pendiente * $tasa_mensual;
                            $capital_pendiente -= ($cuota_inicial - $interes_mes); // REDUCIENDO CAPITAL
                        }
                
                        // Calcular la nueva cuota con la tasa posterior
                        $tasa_mensual_nueva = $this->posterior / 12;
                        $num_pagos_restantes = ($this->plazoAmortizacion - $this->anoPos) * 12;
                
                        if ($capital_pendiente <= 0) { 
                            return [
                                'cuota_inicial' => round($cuota_inicial, 2),
                                'cuota_posterior' => 0 // Capital ya se pagó
                            ];
                        }
                
                        $cuota_posterior = $capital_pendiente * $tasa_mensual_nueva / (1 - pow(1 + $tasa_mensual_nueva, -$num_pagos_restantes));
                
                        return [
                            'cuota_inicial' => round($cuota_inicial, 2),
                            'cuota_posterior' => round($cuota_posterior, 2)
                        ];
                    } else {
                        return round($cuota_inicial, 2);
                    }
                }                      
            }
        ?>
    </div>
</body>
</html>
