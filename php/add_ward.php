<?php
if(isset($_POST["submit"]))
{
 
if(count($_POST)>0) 
{

 
$ward_no = $_POST["ward_no"];

$ward_capacity = $_POST["ward_capacity"];

$ward_type = $_POST["ward_type"];


include 'db_connection.php';
$conn = OpenCon();


$sql = "INSERT INTO ward (ward_no, ward_capacity, ward_type) VALUES ('$ward_no', '$ward_capacity','$ward_type')";


if($conn->query($sql) === TRUE) {
   
 
header("location:../wards.php");

} 

//if false then display error msg
else {
 

echo '<center>' . "Change unsuccessful..." . '</center>';

}

}
}
?>