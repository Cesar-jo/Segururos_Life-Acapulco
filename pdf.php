<?php
	include 'cabecerafpdf.php';
    require 'conexion.php';
	
	$id = $_GET['id'];

    $query = "SELECT *
    FROM clientes WHERE id = '$id' and estatus IN ('Cierre de contrato')";
	$resultado = $mysql->query($query);
  
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	


	//------------------------------------

/*Cell(width , height , text , border , end line , [align] )*/

/*$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(59 ,5,'Invoice',0,0);
$pdf->Cell(59 ,10,'',0,1); */

$pdf->SetFont('Arial','B',15);
$pdf->Cell(71 ,5,'Punto de negocio',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'',0,1);

$pdf->SetFont('Arial','',10);

$pdf->Cell(130 ,5,'Sistema inmobiliario',0,0);
/*$pdf->Cell(25 ,5,'ID',0,0);
$pdf->Cell(34 ,5,'0012',0,1);

$pdf->Cell(130 ,5,'Delhi, 751001',0,0);
$pdf->Cell(25 ,5,'Invoice Date:',0,0);
$pdf->Cell(34 ,5,'12th Jan 2019',0,1);
 
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Invoice No:',0,0);
$pdf->Cell(34 ,5,'ORD001',0,1);
*/

/*
$pdf->SetFont('Arial','B',15);
$pdf->Cell(130 ,5,'Facturacion',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(189 ,10,'',0,1);

*/

$pdf->Cell(50 ,10,'',0,1);

$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/
$pdf->Cell(15 ,6,'ID',1,0,'C');
$pdf->Cell(50 ,6,'Nombre',1,0,'C');
$pdf->Cell(23 ,6,'Fecha',1,0,'C');
$pdf->Cell(50 ,6,'Inmueble',1,0,'C');
$pdf->Cell(50 ,6,'RFC',1,1,'C');

/*Heading Of the table end*/
$pdf->SetFont('Arial','',10);

while($row = $resultado->fetch_assoc())
{
		$pdf->Cell(15 ,6,($row['id']),1,0);
		$pdf->Cell(50 ,6,($row['nombre']),1,0);
		$pdf->Cell(23 ,6,($row['fecha']),1,0,'L');
		$pdf->Cell(50 ,6,($row['inmueble']),1,0,'L');
		$pdf->Cell(50 ,6,($row['rfc']),1,1,'C');
	
		
	
		

$pdf->Cell(118 ,6,'',0,0);
$pdf->Cell(27 ,6,'Subtotal',0,0);
$pdf->Cell(43 ,6,($row['monto']),1,1,'R');
}


	//-------------------------------
	
	$pdf->Output();
?>