<?php
include 'db_connection.php';
$conn = OpenCon();
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);

    $sql3 = "SELECT * FROM patient";
        $result3 = mysqli_query($conn, $sql3);
        if ($result3-> num_rows > 0) {
            while ($row3 = $result3-> fetch_assoc()) {
                $patients[] = $row3['patient_id'];
            }
        }

    foreach($patients as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>