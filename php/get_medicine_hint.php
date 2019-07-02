<?php
//include 'db_connection.php';
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "meds";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connection failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }

$conn = OpenCon();
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);

    $sql3 = "SELECT * FROM rxnconso WHERE STR LIKE '%$q%' LIMIT 30";
        $result3 = mysqli_query($conn, $sql3);
        if ($result3-> num_rows > 0) {
            while ($row3 = $result3-> fetch_assoc()) {
                $medicine[] = $row3['STR'];
            }

            foreach($medicine as $name) {
                if (stristr($q, substr($name, 0, $len))) {
                    if ($hint === "") {
                        $hint = $name;
                    } else {
                        $hint .= ", $name";
                    }
                }
            }
        }

   /* foreach($medicine as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }*/
}

// Output "no suggestion" if no hint was found or output correct values 
//echo $hint === "" ? "No suggestion" : $hint;

echo "<select class='form-control' name='medicine_name'>";
foreach($medicine as $med){
    echo "<option value='$med'>";
    echo "$med";
    echo "</option>";
}
echo "</select>";
?>