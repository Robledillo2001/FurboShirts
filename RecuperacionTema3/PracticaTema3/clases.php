<?php
    abstract class Prestamo{
        public $capital;
        public $interesAnual;
        public $amortizacion;
        public $interesPosterior;

        public function __construct(float $cap,float $interesAnual,int $amortizacion,float $interesPost=0.0){
            $this->capital=$cap;
            $this->interesAnual=$interesAnual;
            $this->amortizacion=$amortizacion;
            $this->interesPosterior=$interesPost;
        }
        public function getCapital(){
            return $this->capital;
        }

        public function getInteresAnual(){
            return $this->interesAnual;
        }

        public function getAmortizacion(){
            return $this->amortizacion;
        }

        public function getInteresPosterior(){
            return $this->interesPosterior;
        }


        abstract public function calcularCuotaMensual();
    }

    class PrestamoPersonal extends Prestamo{
        public function __construct(float $cap, float $interesAnual, int $amortizacion, float $interesPost = 0.0) {
            // Validaciones
            if ($cap < 0 || $cap > 60000) {
                throw new Exception("El capital debe estar entre 0 y 60,000.");
            }
        
            if ($interesAnual < 0.05 || $interesAnual > 0.1) {
                throw new Exception("El interés anual debe estar entre 0.05 y 0.1 (en formato decimal).");
            }
        
            if ($amortizacion < 0 || $amortizacion > 10) {
                throw new Exception("La amortización debe estar entre 0 y 10 años.");
            }
        
            // Llamada al constructor de la clase padre
            parent::__construct($cap, $interesAnual, $amortizacion, $interesPost);
        }
        

        public function calcularCuotaMensual() {
            $tasaMensual = $this->interesAnual / 12; // Interés mensual
            $meses = $this->amortizacion * 12; // Total de meses
            $numerador = $tasaMensual * pow(1 + $tasaMensual, $meses);
            $denominador = pow(1 + $tasaMensual, $meses) - 1;
            $cuota = $this->capital * ($numerador / $denominador);
            return round($cuota, 2); // Redondear a 2 decimales
        }
    }

    class PrestamoHipotecario extends Prestamo{
        public function __construct(float $cap, float $interesAnual, int $amortizacion, float $interesPost = 0.0) {
            // Validaciones
            if ($cap < 0 || $cap > 250000) {
                throw new Exception("El capital debe estar entre 0 y 250,000.");
            }
        
            if ($interesAnual < 0.005 || $interesAnual > 0.08) {
                throw new Exception("El interés anual debe estar entre 0.005 y 0.08 (en formato decimal).");
            }
        
            if ($amortizacion < 0 || $amortizacion > 30) {
                throw new Exception("La amortización debe estar entre 0 y 30 años.");
            }
        
            // Llamada al constructor de la clase padre
            parent::__construct($cap, $interesAnual, $amortizacion, $interesPost);
        }
        

        public function calcularCuotaMensual() {
            $tasaMensual = $this->interesAnual / 12; // Interés mensual
            $meses = $this->amortizacion * 12; // Total de meses
            $numerador = $tasaMensual * pow(1 + $tasaMensual, $meses);
            $denominador = pow(1 + $tasaMensual, $meses) - 1;
            $cuota = $this->capital * ($numerador / $denominador);
            return round($cuota, 2); // Redondear a 2 decimales
        }
    }
?>