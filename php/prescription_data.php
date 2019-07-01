
<?php
//include db connection
//include 'db_connection.php';
/*
$conn = OpenCon();

                    
$sql = "SELECT * FROM prescription";
$result = mysqli_query($conn, $sql);

if ($result-> num_rows > 0) {
    while ($row = $result-> fetch_assoc()) {
        $patient_id = $row['patient_id'];
        $medicine = $row['medicine'];
        //$date = $row['date'];
        $dose = $row['dose'];
        $time1 = $row['time1'];

        $sql2 = "SELECT first_name,last_name FROM patient WHERE patient_id = $patient_id";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2-> num_rows > 0) {
            while ($row2 = $result2-> fetch_assoc()) {
                $full_name = $row2['first_name']." ".$row2['last_name'];
            }
        }

        $sql3 = "SELECT ward_no,bed_no FROM accommodation WHERE patient_id = $patient_id";
        $result3 = mysqli_query($conn, $sql3);
        if ($result3-> num_rows > 0) {
            while ($row3 = $result3-> fetch_assoc()) {
                $accommodation = "Ward Number: " .$row3['ward_no']." "."Bed Number: " .$row3['bed_no'];
            }
        }


        //$prescription_info = "$accommodation";
        $prescription_info = "$full_name | $accommodation | $dose $medicine | $time1";
             }
        }
        else {
        echo "0 result";
        }
                    
CloseCon($conn);                    
?>
*/

//<?php
//include db connection
//include 'db_connection.php';


//$date = date("H:i:s");
$date = date_create(date("H:i:s"));
$date2 = date_create(date("H:i:s"));

date_add($date,date_interval_create_from_date_string("60 mins"));
date_add($date2,date_interval_create_from_date_string("120 mins"));

/*echo "$date \n $date2 \n  ";
echo date_format($date,"H:i:s");
echo "\n\n\n";
echo date_format($date2,"H:i:s");
*/
$time1 = date_format($date,"H:i:s");
$time2 = date_format($date2,"H:i:s");

$range = [$time1, $time2];
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
           // $patients[] = $row['patient_id'];
            $patient[] = $row['patient_id'];
        } else {
            $patient[] = NULL;
        }
    }
}

if($patient != NULL){
foreach($patient as $item){
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
}

/*
foreach ($alarm_data as $item){
    
    echo "$item \t";
    
}
*/

?>