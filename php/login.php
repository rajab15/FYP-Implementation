<?php
if(isset($_POST["submit"]))
{
 
if(count($_POST)>0) 
{
 //Including db_connection file.
include 'db_connection.php';
OpenCon();
$conn = new mysqli("localhost", "root", "","mrs") or die("Connection failed: %s\n". $conn -> error);
 
$username = $_POST["username"];

$password = $_POST["loginpwd"];

$EncryptPassword = sha1($password);

//search for matching password in database
$finalResult = mysqli_query($conn, "SELECT * FROM nurse WHERE username='$username' and password = '$EncryptPassword'"); 

$confirm = mysqli_fetch_array($finalResult);

//if true then start session
if(is_array($confirm)) {
 
 session_start();
 $_SESSION['sid']=session_id();
 header("location:../welcomePage.html");

} 

//if false then display error msg
else {
 

echo '<center>' . "Wrong UserName or Password..." . '</center>';

}

}
}
?>