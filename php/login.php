<?php
if(isset($_POST["submit"]))
{
 
if(count($_POST)>0) 
{
 //Including dbconfig file.
include 'dbconfig.php';
 
$email = $_POST["email"];

$password = $_POST["password"];

$EncryptPassword = md5($password);

$finalResult = mysql_query("SELECT * FROM signup WHERE email='$email' and Password = '$EncryptPassword'"); 

$confirm = mysql_fetch_array($finalResult);

if(is_array($confirm)) {
 
 session_start();
 $_SESSION['sid']=session_id();
 header("location:dashboard.php");

} else {
 

echo '<center>' . "Wrong UserName or Password..." . '</center>';

}

}
}
?>