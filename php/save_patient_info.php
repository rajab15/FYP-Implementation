<?php
if(isset($_POST["submit"]))
{
 
if(count($_POST)>0) 
{
 //Including db connection file.
include 'db_connection.php';
OpenCon();
$conn = new mysqli("localhost", "root", "", "mrs") or die("Connection failed: %s\n". $conn -> error);
 
$fname = $_POST["fname"];

$mname = $_POST["mname"];

$lname = $_POST["lname"];

$city = $_POST["city"];

$state = $_POST["state"];

$phone_no = $_POST["phone_no"];

$work_no = $_POST["work_no"];

$gender = $_POST["gender"];

$bdate = $_POST["bdate"];

$mstatus = $_POST["marital_status"];

$em_fname = $_POST["em_fname"];

$em_lname = $_POST["em_lname"];

$em_relation = $_POST["em_relation"];

$em_phone_no = $_POST["em_phone_no"];

$em_work_no = $_POST["em_work_no"];

$em_medicine = $_POST["em_medicine"];

$sql = "INSERT INTO patient (first_name, middle_name, last_name, phone_no, work_no, city, state, gender,
 birth_date, marital_status, em_first_name, em_last_name, em_relationship, em_phone_no, em_work_no, 
 em_medication) 
VALUES ('$fname', '$mname', '$lname',  '$phone_no', '$work_no', '$city', '$state', '$gender', '$bdate', 
'$mstatus', '$em_fname', '$em_lname', '$em_relation', '$em_phone_no', '$em_work_no','$em_medicine')";

if (!mysqli_query($conn,$sql)) {
  die('Error: ' . mysqli_error($conn));
}
echo '<script>';
echo  'alert("Patient registered");';
echo '</script>'; 
header("Refresh:0; url=../register-patient.php");

CloseCon($conn);
//mysqli_close($conn);

}
}