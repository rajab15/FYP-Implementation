<?php
//include db connection
//include 'db_connection.php';

$conn = OpenCon();

$sql = "SELECT DISTINCT ward_no FROM ward";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    foreach ($row as $item){
        //echo "$item \t";
        $wards[] = $item;
    }
}

foreach ($wards as $item){
    $sql2 = "SELECT * FROM accommodation  WHERE state = 'not released' AND ward_no = $item";
    $result2 = mysqli_query($conn, $sql2);

    echo "<div class='row'>";
    echo "<div class='col-md-12'>";
    echo "<div class='panel'>";
    echo "<div class='panel-heading'>";
    echo "<h3 class='panel-title'>Ward $item</h3>";
    echo "<p>Admitted Patients</p>";
    echo "</div>";
    echo "<div class='panel-body'>";
    //echo "<div>";
    echo "<table class='table table-bordered table-striped zero_config'>";
    echo "<thead><tr><th>Patient Number</th><th>Patient Name</th><th>Bed Number</th><th>Expected Release Date</th></tr></thead>";
    echo "<tbody>";
    


    if ($result2-> num_rows > 0) {
        while ($row = $result2-> fetch_assoc()) {
            $patient_id = $row['patient_id'];
            $sql3 = "SELECT first_name, last_name FROM patient WHERE patient_id = $patient_id";
            $result3 = mysqli_query($conn, $sql3);

                if ($result3-> num_rows > 0) {
                while ($row2 = $result3-> fetch_assoc()) {
                    $full_name = $row2['first_name']." ".$row2['last_name'];
                    
                }
            }
            echo "<tr><td>". $row['patient_id']."</td><td>$full_name</td><td>". $row['bed_no']."</td><td>". $row['release_date']."</td></tr>";
            }
            echo "</tbody>";
            }
            else {
            echo "No Admissions Yet";
            }
    
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";        
    } 
    
?>    