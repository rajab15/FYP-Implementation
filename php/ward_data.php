<?php

 //Including db_connection file.
//include 'db_connection.php';

//$conn = OpenCon();
$counter = 0;


$sql1 = "SELECT COUNT(*) AS number_of_wards FROM ward";
$result = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$number_of_wards = $row['number_of_wards'];

echo "Total number of wards: ";
echo $number_of_wards;
echo "<br>";

/*
$sql2 = "SELECT ward_capacity AS ward_no FROM ward WHERE ward_no = 3";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$ward_capacity = $row2['ward_no'];
echo $ward_capacity;
echo "\n"; echo "<br>";

//SELECT DISTINCT bed_no FROM accommodation WHERE ward_no = 3
$sql3 = "SELECT DISTINCT bed_no FROM accommodation WHERE ward_no = 3";
$result3 = mysqli_query($conn, $sql3);
$row4 = array();
while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
    foreach ($row3 as $item){
        //echo "$item \t";
        $assigned_beds[] = $item;
    }
    

}


foreach ($assigned_beds as $item){
    echo "$item \t\t";
}


echo "<br>Empty Beds <br>";

for($i = 1; $i<= $ward_capacity; $i++){
    if(!in_array($i, $assigned_beds)){
        $not_assigned[$counter] = $i;
        $counter = $counter + 1;
    }
}
foreach ($not_assigned as $item){
    echo "$item \t";
}*/
 
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

    echo "Ward $j details:<br>";
    echo "Ward $j capacity: $ward_capacity <br>";
    echo "Ward $j occupied beds:\t<br>";
    foreach ($assigned_beds as $item){
        echo "$item \t\t";
    }


    echo "<br><br>Ward $j empty Beds: <br>";

    for($i = 1; $i<= $ward_capacity; $i++){
        if(!in_array($i, $assigned_beds)){
            $not_assigned[$counter] = $i;
            $counter = $counter + 1;
        }
    }
    foreach ($not_assigned as $item){
        echo "$item \t";
    }
$counter = 0;
$item = 0;
$row3 = array();
$result3 = 0;
$assigned_beds = array();
$not_assigned = array();
echo "<br><br><br>";
}

?>