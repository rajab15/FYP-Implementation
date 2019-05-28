<?php
//include db connection
//include 'db_connection.php';

$conn = OpenCon();

                    
$sql = "SELECT * FROM accommodation  WHERE state = 'not released'";
$result = mysqli_query($conn, $sql);

if ($result-> num_rows > 0) {
    while ($row = $result-> fetch_assoc()) {
        $patient_id = $row['patient_id'];
        $sql2 = "SELECT first_name, last_name, gender FROM patient WHERE patient_id = $patient_id";
        $result2 = mysqli_query($conn, $sql2);

            if ($result2-> num_rows > 0) {
            while ($row2 = $result2-> fetch_assoc()) {
                $full_name = $row2['first_name']." ".$row2['last_name'];
                $gender = $row2['gender'];
            }
        }
        echo "<tr><td>". $row['patient_id']."</td><td>$full_name</td><td>$gender</td><td>". $row['ward_no']."</td><td>". $row['bed_no']."</td><td>". $row['release_date']."</td></tr>";
        }
        echo "</tbody>";
        }
        else {
        echo "0 result";
        }
                    
CloseCon($conn);                    
?>