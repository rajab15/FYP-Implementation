
<?php 
 // remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

//go to index
header("location:../index.html");
?>
