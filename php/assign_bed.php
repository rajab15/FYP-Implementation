<?php 
//Including db_connection file.
include 'db_connection.php';

$conn = OpenCon();

$patient_id = $_POST["patient_id"];
 
$ward_no = $_POST["ward_no"];

$bed_no = $_POST["bed_no"];

$admission_date = $_POST["admission_date"];

$release_date = $_POST["release_date"];

$sql = "INSERT INTO accommodation (patient_id, ward_no, bed_no, admission_date, release_date) 
VALUES ('$patient_id', '$ward_no', '$bed_no',  '$admission_date', '$release_date')";

if (!mysqli_query($conn,$sql)) {
    die('Error: ' . mysqli_error($conn));
  }
  header("Refresh:0; url=../assign-bed.php");

  echo '<script>';
  echo  'alert("Admission Record added");';
  echo '</script>';
 // echo "Admission Record added";
  
  CloseCon($conn); 

?>