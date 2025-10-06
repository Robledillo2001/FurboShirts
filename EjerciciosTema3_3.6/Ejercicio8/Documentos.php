<?php
// Clase abstracta base para documentos
abstract class Documento {
    protected string $titulo;
    protected string $contenido;

    public function __construct(string $titulo, string $contenido) {
        $this->titulo = $titulo;
        $this->contenido = $contenido;
    }

    // Método abstracto para generar el título
    abstract public function generarTitulo(): string;

    // Método para mostrar el contenido
    public function mostrarContenido(): string {
        return "Contenido: " . $this->contenido . "<br>";
    }
}

// Clase para documentos de tipo Factura
class Factura extends Documento {
    private float $monto;

    public function __construct(string $titulo, string $contenido, float $monto) {
        parent::__construct($titulo, $contenido);
        $this->monto = $monto;
    }

    public function generarTitulo(): string {
        return "Factura: " . $this->titulo . "<br>";
    }

    // Método específico para facturas: incluir un método de pago
    public function incluirMetodoPago(string $metodo): string {
        return "Método de pago: " . $metodo . "<br>";
    }

    public function mostrarMonto(): string {
        return "Monto: $" . $this->monto . "<br>";
    }
}

// Clase para documentos de tipo Contrato
class Contrato extends Documento {
    private string $fechaVencimiento;

    public function __construct(string $titulo, string $contenido, string $fechaVencimiento) {
        parent::__construct($titulo, $contenido);
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function generarTitulo(): string {
        return "Contrato: " . $this->titulo . "<br>";
    }

    // Método específico para contratos: establecer la fecha de vencimiento
    public function establecerFechaVencimiento(string $nuevaFecha): void {
        $this->fechaVencimiento = $nuevaFecha;
    }

    public function mostrarFechaVencimiento(): string {
        return "Fecha de vencimiento: " . $this->fechaVencimiento . "<br>";
    }
}

// Clase para documentos de tipo Informe
class Informe extends Documento {
    public function generarTitulo(): string {
        return "Informe: " . $this->titulo . "<br>";
    }

    // Método específico para informes: generar gráficos
    public function generarGrafico(string $tipoGrafico): string {
        return "Gráfico generado: " . $tipoGrafico . "<br>";
    }
}

// Ejemplo de uso
$factura = new Factura("Factura Enero", "Contenido de la factura", 500.75);
echo $factura->generarTitulo();
echo $factura->mostrarContenido();
echo $factura->mostrarMonto();
echo $factura->incluirMetodoPago("Tarjeta de crédito");

$contrato = new Contrato("Contrato de servicios", "Contenido del contrato", "2024-12-31");
echo $contrato->generarTitulo();
echo $contrato->mostrarContenido();
echo $contrato->mostrarFechaVencimiento();
$contrato->establecerFechaVencimiento("2025-01-31");
echo $contrato->mostrarFechaVencimiento();

$informe = new Informe("Informe de ventas", "Contenido del informe");
echo $informe->generarTitulo();
echo $informe->mostrarContenido();
echo $informe->generarGrafico("Gráfico de barras");
?>
