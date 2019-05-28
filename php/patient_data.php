<?php

 //Including db_connection file.
//include 'db_connection.php';

$conn = OpenCon();

$sql = "SELECT COUNT(*) AS number_of_patients FROM patient";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$patients = $row['number_of_patients'];

$sql2 = "SELECT COUNT(*) AS number_of_admitted_patients FROM accommodation";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$admitted_patients = $row2['number_of_admitted_patients'];

//echo $patients

 
?>