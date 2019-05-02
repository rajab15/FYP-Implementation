<?php
if(isset($_POST["submit"]))
{
 
if(count($_POST)>0) 
{
 //Including db connection file.
include 'db_connection.php';
OpenCon();
$conn = OpenCon();

$id = $_POST["nurse_id"];
 
$fname = $_POST["fname"];

$lname = $_POST["lname"];

$city = $_POST["city"];

$state = $_POST["state"];

$phone_no = $_POST["phone_no"];

$work_no = $_POST["work_no"];

$gender = $_POST["gender"];

$bdate = $_POST["bdate"];

$mstatus = $_POST["marital_status"];

$ward_no = $_POST["ward_number"];

$username = strtolower($fname.$lname);

$em_fname = $_POST["em_fname"];

$em_lname = $_POST["em_lname"];

$em_relation = $_POST["em_relation"];

$em_phone_no = $_POST["em_phone_no"];

$em_work_no = $_POST["em_work_no"];

$password = $_POST["pwd"];

$EncryptPassword = sha1($password);


$sql = "INSERT INTO nurse (nurse_id, first_name, last_name, phone_no, work_no, city, state, gender,
 birth_date, marital_status, ward_no, username, password, em_first_name, em_last_name, em_relationship, em_phone_no, em_work_no) 
VALUES ('$id', '$fname', '$lname',  '$phone_no', '$work_no', '$city', '$state', '$gender', '$bdate', 
'$mstatus', '$ward_no', '$username', '$EncryptPassword', '$em_fname', '$em_lname', '$em_relation', '$em_phone_no', '$em_work_no')";

if (!mysqli_query($conn,$sql)) {
  die('Error: ' . mysqli_error($conn));
}
echo "Nurse Record added";

CloseCon($conn);
//mysqli_close($conn);

}
}