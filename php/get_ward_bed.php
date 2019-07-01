<?php
//Including db_connection file.
include 'db_connection.php';
$conn = OpenCon();
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);


    $sql2 = "SELECT ward_capacity AS ward_no FROM ward WHERE ward_no = $q";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    $ward_capacity = $row2['ward_no'];

    $sql3 = "SELECT DISTINCT bed_no FROM accommodation WHERE ward_no = $q";
    $result3 = mysqli_query($conn, $sql3);
    while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
    foreach ($row3 as $item){
        //echo "$item \t";
        $assigned_beds[] = $item;
        }
    }

    $counter = 0;
    for($i = 1; $i<= $ward_capacity; $i++){
        if(!in_array($i, $assigned_beds)){
            $not_assigned[$counter] = $i;
            $counter = $counter + 1;
        }
    }
}

$hint = $not_assigned[0];

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>