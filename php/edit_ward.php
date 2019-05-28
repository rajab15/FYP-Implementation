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
//search for matching password in database
//ward_no = $ward_no,
$sql ="UPDATE ward SET ward_capacity = $ward_capacity, ward_type = '$ward_type' WHERE ward_no = $ward_no";
//$result = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

//$confirm = mysqli_fetch_array($finalResult, MYSQLI_ASSOC);

//if true then start session
//if(is_array($row)) {
if($conn->query($sql) === TRUE) {
   
 
header("location:../wards.php");
echo '<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<i class="fa fa-check-circle"></i> Your changes have been succesfully saved
</div>';

} 

//if false then display error msg
else {
 

echo '<center>' . "Change unsuccessful..." . '</center>';

}

}
}
?>