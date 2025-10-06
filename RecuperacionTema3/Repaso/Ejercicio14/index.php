<?php
    abstract class Documento{
        public function generarTitulo(){
            return "Titulo del documento";
        }

        public function mostrarContenido(){
            return "Contenido genérico del documento";
        }

        abstract public function obtenerDetallesEspecificos();
    }

    class Factura extends Documento{
        public $metodoPago;
        public $metodos=[
            "Tarjeta de crédito",
            "Transferencia",
            "Efectivo"
        ];

        public function __construct($metodo){
            if(in_array($metodo,$this->metodos)){
                $this->metodoPago=$metodo;
            }else{
                throw new Exception("Metodo no permitido");
            }
        }

        public function obtenerDetallesEspecificos(){
            return"Metodo de pago elegido: ".$this->metodoPago;
        }
    }

    class Contrato extends Documento{
        public $fecha;
        public function __construct(DateTime $fecha){
            $this->fecha=$fecha;
        }

        public function obtenerDetallesEspecificos(){
            return "La fecha del contrato termina el ".$this->fecha->format('Y-m-d');
        }
    }

    class Informe extends Documento {
        private $graficoGenerado;
    
        public function __construct($graficoGenerado) {
            $this->graficoGenerado = $graficoGenerado;
        }
    
        // Implementación del método abstracto
        public function obtenerDetallesEspecificos() {
            return "Gráfico generado: " . $this->graficoGenerado;
        }
    
        // Método adicional específico para Informe
        public function generarInforme() {
            return "Generando informe con gráfico: " . $this->graficoGenerado;
        }
    }

    // Ejemplo de uso
    $factura = new Factura("Tarjeta de crédito");
    echo $factura->generarTitulo() . "<br>";
    echo $factura->mostrarContenido() . "<br>";
    echo $factura->obtenerDetallesEspecificos() . "<br>";

    $fechaContrato = new DateTime("2025-12-31");
    $contrato = new Contrato($fechaContrato);
    echo $contrato->generarTitulo() . "<br>";
    echo $contrato->mostrarContenido() . "<br>";
    echo $contrato->obtenerDetallesEspecificos() . "<br>";

    $informe = new Informe("Gráfico de ventas");
    echo $informe->generarTitulo() . "<br>";
    echo $informe->mostrarContenido() . "<br>";
    echo $informe->obtenerDetallesEspecificos() . "<br>";
?> 