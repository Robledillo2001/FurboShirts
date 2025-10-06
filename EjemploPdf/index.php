<?php
require_once('../EjemploPdf/fpdp/fpdf.php'); 

// Crear una instancia de la clase FPDF
$pdf = new FPDF('P', 'mm', 'A4'); 
$pdf->AddPage(); 

// Establecer la fuente (Arial, negrita, tamaño 15)
$pdf->SetFont('Arial', 'B', 15);

// Agregar una celda con el texto "Hola Mundo"
$pdf->Cell(100, 10, 'Hola Mundo', 1, 1, 'C');

// Agregar texto largo con ajuste automático
$pdf->MultiCell(100, 5, "Este es un texto largo que se ajusta automáticamente a varias líneas. Si el texto es demasiado largo para caber en una línea, se romperá y continuará en la siguiente línea automáticamente. Esto es útil cuando no sabes el tamaño exacto del texto.");

// Posicionar el texto en coordenadas específicas (50, 50)
$pdf->SetXY(50, 50);
$pdf->Cell(100, 10, 'Texto Posicionado', 1, 1, 'C');

// Nueva página
$pdf->AddPage(); 

// Agregar texto en la segunda página
$pdf->Cell(100, 10, 'Página 2', 1, 1, 'C');

// Generar el archivo PDF
$pdf->Output();
?>
