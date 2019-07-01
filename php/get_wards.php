<?php
//include 'db_connection.php';
$conn = OpenCon();

echo "<select name='ward_no' class='form-control' onchange='showBed(this.value)' required>";
echo "<option value=''>Select Ward</option>";

    $sql3 = "SELECT * FROM ward";
        $result3 = mysqli_query($conn, $sql3);
        if ($result3-> num_rows > 0) {
            while ($row3 = $result3-> fetch_assoc()) {
                $wards[] = $row3['ward_no'];
            }
        }

    foreach($wards as $name) {
        echo "<option value='$name'>$name</option>";
    }

echo "</select>";

?>