<?php
if(isset($_POST["submit"]))
{
 
if(count($_POST)>0) 
{
 //Including db connection file.
include 'db_connection.php';

$conn = OpenCon();

$patient_id = $_POST["patient_id"];

$medicine = $_POST["medicine_name"];

$dose = $_POST["pills_ml"];

$start_date = $_POST["start_day"];

$time1 = $_POST["time1"];

$time2 = NULL;

$time3 = NULL;

$time4 = NULL;

$time5 = NULL;

if (isset($_POST["time2"]) && !empty($_POST["time2"])) {
    $time2 = $_POST["time2"];    
}
if (isset($_POST["time3"]) && !empty($_POST["time3"])) {
    $time3 = $_POST["time3"];    
}
if (isset($_POST["time4"]) && !empty($_POST["time4"])) {
    $time4 = $_POST["time4"];    
}
if (isset($_POST["time5"]) && !empty($_POST["time5"])) {
    $time5 = $_POST["time5"];     
}


$sql = "INSERT INTO prescription (patient_id, medicine, date, dose, time1, time2, time3, time4, time5) 
VALUES ('$patient_id', '$medicine', '$start_date', '$dose', '$time1', '$time2', '$time3', '$time4', '$time5')";

if (!mysqli_query($conn,$sql)) {
  die('Error: ' . mysqli_error($conn));
}
//echo "Prescription added";

echo '<script>';
echo  'alert("Prescription added");';
echo '</script>'; 
header("Refresh:0; url=../prescription.php");

CloseCon($conn);
//mysqli_close($conn);
//header("location:../prescription.php");

}
}
?>