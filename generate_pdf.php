<?php
//include config file 
include_once("config.php");
include_once('libs/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    $this->SetFont('Arial','B',13);
    // Titile
    $this->Cell(80,10,'Product list',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$display_heading = array('PID'=>'ID', 'p_name'=> 'Product Name', 'amount'=> 'Amount','campus'=> 'Campus',);
 
$result = mysqli_query($db, "SELECT PID, p_name, amount, campus FROM product");
$header = mysqli_query($db, "SHOW columns FROM product");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>