<?php
if(isset($_POST["submit"]))
{
 
if(count($_POST)>0) 
{

$patient_id = $_POST["patient_id"];
$date = date("Y-m-d");

include 'db_connection.php';

$conn = OpenCon();

$sql = "UPDATE accommodation SET state = 'released', release_date = '$date' WHERE patient_id = '$patient_id' AND state = 'not released'";

if (!mysqli_query($conn,$sql)) {
    die('Error: ' . mysqli_error($conn));
    /*echo '<script>';
    echo 'alert("Patient discharge failed. Check your details");';
    echo '</script>'; 
    header("Refresh:0; url=../discharge-patient.php");*/
  } else {

echo '<script>';
echo 'alert("Patient discharged");';
echo '</script>'; 
header("Refresh:0; url=../discharge-patient.php");
}
}
}
?>