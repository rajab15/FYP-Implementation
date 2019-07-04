<?php
//include connection file 
//include_once("db_connection.php");
include_once('fpdf18/fpdf.php');

include 'db_connection.php';

$conn = OpenCon();


while (ob_get_level())
ob_end_clean();
header("Content-Encoding: None", true);

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('#',15,-1,40);
    $this->SetFont('Arial','B',10);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'PATIENTS INFORMATION IN SUMMARY',1,0,'C');
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

//$result = mysqli_query($conn, "SELECT patient_id,first_name,last_name,phone_no,city,gender,birth_date FROM patient") or die("database error:". mysqli_error($conn));

$display_heading = array('patient_id'=>'ID','first_name'=> 'FIRST_NAME', 'middle_name'=> 'MIDDLE_NAME','last_name'=> 'LAST_NAME','phone_no'=>'PHONE_NO.','work_no'=>'WORK_NO', 'city'=>'CITY','state'=>'STATE','gender'=>'GENDER','birth_date'=>'BIRTH_DATE','marital_status'=>'MARITAL_STATUS','em_first_name'=>'KIN_F_NAME','em_last_name'=>'KIN_L_NAME','em_relationship'=>'KIN_RELATION','em_phone_no'=>'KIN_No','em_work_no'=>'KIN_NO','em_medication'=>'MEDICATION',);

$result = mysqli_query($conn, "SELECT patient_id,first_name,middle_name,last_name,phone_no,work_no,city,state,gender,birth_date FROM patient") or die("database error:". mysqli_error($conn));
$header = mysqli_query($conn, "SHOW columns FROM patient");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',7);
foreach($header as $heading) {
$pdf->Cell(26,6,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(26,6,$column,1);
}
$pdf->Output();
?>