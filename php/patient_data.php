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

$sql3 = "SELECT COUNT(*) AS number_of_nurses FROM nurse";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
$nurses = $row3['number_of_nurses'];

$sql4 = "SELECT COUNT(*) AS number_of_admitted_patients FROM accommodation WHERE state = 'not released'";
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
$current_admitted_patients = $row4['number_of_admitted_patients'];
 
?>