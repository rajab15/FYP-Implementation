<?php
//include db connection
//include 'db_connection.php';

$conn = OpenCon();

    echo "<div class='col-md-12'>";
    echo "<div class='panel'>";
    echo "<div class='panel-heading'>";
    echo "<h3 class='panel-title'>Registered Patients</h3>";
    echo "<p>List of patients registered to the system</p>";
    echo "</div>";
    echo "<div class='panel-body'>";
    //echo "<div>";
    echo "<table class='table table-bordered table-striped zero_config'>";
    echo "<thead><tr><th>Patient Number</th><th>Patient Name</th><th>Phone Number</th><th>City</th><th>Gender</th><th>Birth Date</th></tr></thead>";
    echo "<tbody>";

$sql = "SELECT * FROM patient";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $full_name = $row['first_name']." ".$row['last_name'];
        echo "<tr><td>". $row['patient_id']."</td><td>$full_name</td><td>". $row['phone_no']."</td><td>". $row['city']."</td><td>". $row['gender']."</td><td>". $row['birth_date']."</td></tr>";
}

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    
?>    