<?php

 //Including db_connection file.
//include 'db_connection.php';

//$conn = OpenCon();
$counter = 0;


$sql1 = "SELECT COUNT(*) AS number_of_wards FROM ward";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$number_of_wards = $row['number_of_wards'];


 
for($j = 1; $j <= $number_of_wards; $j++){

    $sql2 = "SELECT ward_capacity AS ward_no FROM ward WHERE ward_no = $j";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    $ward_capacity = $row2['ward_no'];
    //echo $ward_capacity;
    echo "\n"; echo "<br>";

    $sql3 = "SELECT DISTINCT bed_no FROM accommodation WHERE ward_no = $j AND state = 'not released'";
    $result3 = mysqli_query($conn, $sql3);
    while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
    foreach ($row3 as $item){
        //echo "$item \t";
        $assigned_beds[] = $item;
    }
    

}

    for($i = 1; $i<= $ward_capacity; $i++){
        if(!in_array($i, $assigned_beds)){
            $not_assigned[$counter] = $i;
            $counter = $counter + 1;
        }
    }


    $ratio = count($assigned_beds)/$ward_capacity;
    $size = count($assigned_beds);

    echo "Ward $j: $ratio% full";
    echo "<div class='progress'>";
    echo "<div class='progress-bar progress-bar-info progress-bar-striped' role='progressbar' aria-valuenow='$size' aria-valuemin='0' aria-valuemax='$ward_capacity' style='width: $ratio%'>";
    echo "</div>";
    echo "</div>";

$counter = 0;
$item = 0;
$row3 = array();
$result3 = 0;
$assigned_beds = array();
$not_assigned = array();
//echo "<br><br><br>";
}

?>