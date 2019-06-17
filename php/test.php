<?php
//include db connection
include 'db_connection.php';


//$date = date("H:i:s");
$date = date_create(date("H:i:s"));
$date2 = date_create(date("H:i:s"));

date_add($date,date_interval_create_from_date_string("60 mins"));
date_add($date2,date_interval_create_from_date_string("120 mins"));

//echo "$date \n $date2 \n  ";
echo date_format($date,"H:i:s");
echo "\n\n\n";
echo date_format($date2,"H:i:s");

$range = ['07:00:00','14:00:00'];
//$range = [$date, $date2];

function isInRange($value, $range) {
  return $value >= $range[0] && $value <= $range[1];
}


$conn = OpenCon();

$sql = "SELECT * FROM prescription";
$result = mysqli_query($conn, $sql);

if ($result-> num_rows > 0) {
    while ($row = $result-> fetch_assoc()) {
        if(isInRange($row['time1'], $range) || isInRange($row['time2'], $range) || isInRange($row['time3'], $range) || isInRange($row['time4'], $range) || isInRange($row['time5'], $range)){
            $patients[] = $row['patient_id'];
        }
    }
}

foreach($patients as $item){
    $sql2 = "SELECT * FROM prescription WHERE patient_id = '$item'";
    $result2 = mysqli_query($conn, $sql2);

    while ($row2 = $result2-> fetch_assoc()) {

        $medicine = $row2['medicine'];
        $dose = $row2['dose'];

        if(isInRange($row2['time1'], $range)){
            $time = $row2['time1'];
        }
        else if(isInRange($row2['time2'], $range)){
            $time = $row2['time2'];
        }
        else if(isInRange($row2['time3'], $range)){
            $time = $row2['time3'];
        }
        else if(isInRange($row2['time4'], $range)){
            $time = $row2['time4'];
        }
        else if(isInRange($row2['time5'], $range)){
            $time = $row2['time5'];
        }

        $sql3 = "SELECT first_name,last_name FROM patient WHERE patient_id = $item";
        $result3 = mysqli_query($conn, $sql3);
        if ($result3-> num_rows > 0) {
            while ($row3 = $result3-> fetch_assoc()) {
                $full_name = $row3['first_name']." ".$row3['last_name'];
            }
        }

        $sql4 = "SELECT ward_no,bed_no FROM accommodation WHERE patient_id = $item";
        $result4 = mysqli_query($conn, $sql4);
        if ($result4-> num_rows > 0) {
            while ($row4 = $result4-> fetch_assoc()) {
                $accommodation = "Ward Number: " .$row4['ward_no']." "."Bed Number: " .$row4['bed_no'];
            }
        }

        $alarm_data[] = "$full_name | $accommodation | $dose $medicine | $time \t\t\t";

    }

    
}

foreach ($alarm_data as $item){
    
    echo "$item \t";
    
}


?>