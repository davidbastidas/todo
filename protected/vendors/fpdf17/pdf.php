<?php
class PDF extends FPDF
{
var $planilla;
var $mensajero;
var $fecha;
function PDF($planilla, $mensajero, $fecha, $orientation='P', $unit='mm', $size='A4')
{
    // Llama al constructor de la clase padre
    $this->FPDF($orientation,$unit,$size);
    // Iniciación de variables
    $this->planilla = $planilla;
    $this->mensajero = $mensajero;
    $this->fecha = $fecha;
}
// Cabecera de página
function Header()
{
    // Logo
    $this->Image(Yii::app()->params['imagenes_proyecto'].'logo_pb.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',13);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Planilla No. '.$this->planilla);
    // Salto de línea
    $this->Ln(10);

    $this->Cell(30,10,"Mensajero: ".$this->mensajero."  Fecha: ".$this->fecha);
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
}
}
?>