<?php
//include db connection
//include 'db_connection.php';

$conn = OpenCon();



    $sql2 = "SELECT * FROM ward";
    $result2 = mysqli_query($conn, $sql2);

    echo "<div class='row'>";
    echo "<div class='col-md-12'>";
    echo "<div class='panel'>";
    echo "<div class='panel-heading'>";
    echo "<h3 class='panel-title'>Ward Information</h3>";
    echo "<p>Overall</p>";
    echo "</div>";
    echo "<div class='panel-body'>";
    //echo "<div>";
    echo "<table class='table table-bordered table-striped zero_config'>";
    echo "<thead><th>Ward Name</th><th>Ward Capacity</th><th>Ward Type</th></thead>";
    echo "<tbody>";
    


    if ($result2-> num_rows > 0) {
        while ($row = $result2-> fetch_assoc()) {

            echo "<tr><td>". $row['ward_no']."</td><td>". $row['ward_capacity']."</td><td>". $row['ward_type']."</td></tr>";
            }
            echo "</tbody>";
            }
            else {
            echo "0 result";
            }
    
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";       
    


    $sql = "SELECT DISTINCT ward_no FROM ward";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    foreach ($row as $item){
        //echo "$item \t";
        $wards[] = $item;
        }
    }

foreach ($wards as $item){
    $sql3 = "SELECT COUNT(*) AS current_admitted FROM accommodation WHERE ward_no = $item AND state = 'not released'";
    $result3 = mysqli_query($conn, $sql3);
    $row2 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
    $current_admitted = $row2['current_admitted'];

    $sql4 = "SELECT ward_capacity AS ward_capacity FROM ward WHERE ward_no = $item";
    $result4 = mysqli_query($conn, $sql4);
    $row3 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
    $ward_capacity = $row3['ward_capacity'];

    $sql5 = "SELECT COUNT(*) AS total_admitted FROM accommodation WHERE ward_no = $item";
    $result5 = mysqli_query($conn, $sql5);
    $row4 = mysqli_fetch_array($result5, MYSQLI_ASSOC);
    $total_admitted = $row4['total_admitted'];

    $sql6 = "SELECT first_name, last_name FROM nurse WHERE ward_no = $item";
    $result6 = mysqli_query($conn, $sql6);

        if ($result6-> num_rows > 0) {
        while ($row5 = $result6-> fetch_assoc()) {
            $full_name = $row5['first_name']." ".$row5['last_name'];
            $nurse[] = $full_name;
         }
     }
     
    $sql7 = "SELECT ward_type FROM ward WHERE ward_no = $item";
    $result7 = mysqli_query($conn, $sql7);
    $row6 = mysqli_fetch_array($result7, MYSQLI_ASSOC);
    $ward_type = $row6['ward_type'];

    //echo "<div class='row'>";
    echo "<div class='col-md-6'>";
    echo "<div class='panel'>";
    echo "<div class='panel-heading'>";
    echo "<h3 class='panel-title'>Ward $item</h3>";
    echo "<p>Detailed Information</p>";
    echo "</div>";
    echo "<div class='panel-body'>";
    //echo "<div>";
    echo "<table class='table table-bordered table-striped'>";
    //echo "<tr><td>Patient Number</td><td>Patient Name</td><td>Bed Number</td><td>Expected release date</td></tr>";
    
    echo "<tr><td>Ward Name</td><td>$item</td></tr>";
    echo "<tr><td>Ward Capacity</td><td>$ward_capacity</td></tr>";
    echo "<tr><td>Ward Type</td><td>$ward_type</td></tr>";
    echo "<tr><td>Current admitted patients</td><td>$current_admitted</td></tr>";
    echo "<tr><td>Total admitted patients</td><td>$total_admitted</td></tr>";
    echo "<tr><td width='65%'>Nurses on duty</td><td>";
    foreach ($nurse as $item2){
        echo "$item2, \t";
    }
    "</td></tr>";
    
    
    echo "</table>";
    //echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";        

    $nurse = array();
    }     
?>    