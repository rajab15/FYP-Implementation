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
    echo "success";
    
    session_start();
    $_SESSION['sid']=session_id();
    $_SESSION['username'] = "$username";
    $names = $line['first_name']." ".$line['last_name'] ;
    $_SESSION['nurse_names'] = "$names" ;
    $_SESSION['status']="Active";
 
    header("location:../home.php");

} 

//if false then display error msg
else {
 

echo '<center>' . "Wrong UserName or Password..." . '</center>';

}

}
}
?>