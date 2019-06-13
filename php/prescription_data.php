<?php
//include db connection
//include 'db_connection.php';

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