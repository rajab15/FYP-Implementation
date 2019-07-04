<?php
//include db connection
//include 'db_connection.php';

$jan_range = ['2019-01-01', '2019-01-31'];
$feb_range = ['2019-02-01', '2019-02-29'];
$mar_range = ['2019-03-01', '2019-03-31'];
$apr_range = ['2019-04-01', '2019-04-30'];
$may_range = ['2019-05-01', '2019-05-31'];
$jun_range = ['2019-06-01', '2019-06-30'];
$jul_range = ['2019-07-01', '2019-07-31'];
$aug_range = ['2019-08-01', '2019-08-31'];
$sep_range = ['2019-09-01', '2019-09-30'];
$oct_range = ['2019-10-01', '2019-10-31'];
$nov_range = ['2019-11-01', '2019-11-30'];
$dec_range = ['2019-12-01', '2019-12-31'];

$jan_counter = 0;
$feb_counter = 0;
$mar_counter = 0;
$apr_counter = 0;
$may_counter = 0;
$jun_counter = 0;
$jul_counter = 0;
$aug_counter = 0;
$sep_counter = 0;
$oct_counter = 0;
$nov_counter = 0;
$dec_counter = 0;

$jan_dis = 0;
$feb_dis = 0;
$mar_dis = 0;
$apr_dis = 0;
$may_dis = 0;
$jun_dis = 0;
$jul_dis = 0;
$aug_dis = 0;
$sep_dis = 0;
$oct_dis = 0;
$nov_dis = 0;
$dec_dis = 0;
//$range = [$date, $date2];

function isInRange($value, $range) {
  return $value >= $range[0] && $value <= $range[1];
}

$conn = OpenCon();

$sql = "SELECT * FROM accommodation";
$result = mysqli_query($conn, $sql);

if ($result-> num_rows > 0) {
    
    while ($row = $result-> fetch_assoc()) { 
        if(isInRange($row['admission_date'], $jan_range)){
            $jan_counter ++;
         
        } else if(isInRange($row['admission_date'], $feb_range)){
            $feb_counter ++;
        } else if(isInRange($row['admission_date'], $mar_range)){
            $mar_counter ++;
        } else if(isInRange($row['admission_date'], $apr_range)){
            $apr_counter ++;
        } else if(isInRange($row['admission_date'], $may_range)){
            $may_counter ++;
        } else if(isInRange($row['admission_date'], $jun_range)){
            $jun_counter ++;
        } else if(isInRange($row['admission_date'], $jul_range)){
            $jul_counter ++;
        } else if(isInRange($row['admission_date'], $aug_range)){
            $aug_counter ++;
        } else if(isInRange($row['admission_date'], $sep_range)){
            $sep_counter ++;
        } else if(isInRange($row['admission_date'], $oct_range)){
            $oct_counter ++;
        } else if(isInRange($row['admission_date'], $nov_range)){
            $nov_counter ++;
        } else if(isInRange($row['admission_date'], $dec_range)){
            $dec_counter ++;
        }
    }
}

$sql2 = "SELECT * FROM accommodation WHERE state = 'released'";
$result2 = mysqli_query($conn, $sql2);

if ($result2-> num_rows > 0) {
    while ($row2 = $result2-> fetch_assoc()) { 
        if(isInRange($row2['admission_date'], $jan_range)){
            $jan_dis ++;
         
        } else if(isInRange($row2['admission_date'], $feb_range)){
            $feb_dis ++;
        } else if(isInRange($row2['admission_date'], $mar_range)){
            $mar_dis ++;
        } else if(isInRange($row2['admission_date'], $apr_range)){
            $apr_dis ++;
        } else if(isInRange($row2['admission_date'], $may_range)){
            $may_dis ++;
        } else if(isInRange($row2['admission_date'], $jun_range)){
            $jun_dis ++;
        } else if(isInRange($row2['admission_date'], $jul_range)){
            $jul_dis ++;
        } else if(isInRange($row2['admission_date'], $aug_range)){
            $aug_dis ++;
        } else if(isInRange($row2['admission_date'], $sep_range)){
            $sep_dis ++;
        } else if(isInRange($row2['admission_date'], $oct_range)){
            $oct_dis ++;
        } else if(isInRange($row2['admission_date'], $nov_range)){
            $nov_dis ++;
        } else if(isInRange($row2['admission_date'], $dec_range)){
            $dec_dis ++;
        }
    }
}
/*
echo $jan_counter;
echo $feb_counter;
echo $mar_counter;
echo $apr_counter;
echo $may_counter;
echo $jun_counter;
echo $jul_counter;
echo $aug_counter;
echo $sep_counter;
echo $oct_counter;
echo $nov_counter;
echo $dec_counter;*/

$sql3 = "SELECT COUNT(patient_id) AS max_patient, patient_id FROM accommodation GROUP BY patient_id ORDER BY COUNT(patient_id) DESC LIMIT 1";
$result3 = mysqli_query($conn, $sql3);
if ($result3-> num_rows > 0) {
    while ($row3 = $result3-> fetch_assoc()) { 
        $max_patient = $row3['max_patient'];
        $max_patient_id = $row3['patient_id'];
        $sql4 = "SELECT * FROM patient WHERE patient_id = $max_patient_id";
        $result4 = mysqli_query($conn, $sql4);
        while($row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC)){
            $full_name = $row4['first_name']." ".$row4['last_name'];
                }
        }
}

$sql3 = "SELECT COUNT(medicine) AS max_medicine, medicine FROM prescription GROUP BY medicine ORDER BY COUNT(medicine) DESC LIMIT 1";
$result3 = mysqli_query($conn, $sql3);
if ($result3-> num_rows > 0) {
    while ($row3 = $result3-> fetch_assoc()) { 
        $max_medicine = $row3['max_medicine'];
        $max_medicine_name = $row3['medicine'];
        }
}

$sql3 = "SELECT COUNT(ward_no) AS max_ward, ward_no FROM accommodation GROUP BY ward_no ORDER BY COUNT(ward_no) DESC LIMIT 1";
$result3 = mysqli_query($conn, $sql3);
if ($result3-> num_rows > 0) {
    while ($row3 = $result3-> fetch_assoc()) { 
        $max_ward = $row3['max_ward'];
        $max_ward_name = $row3['ward_no'];
        $sql4 = "SELECT ward_type FROM ward WHERE ward_no = $max_ward_name";
        $result4 = mysqli_query($conn, $sql4);
        while($row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC)){
            $ward_type = $row4['ward_type'];
                }
        }
}

$sql3 = "SELECT MAX(ward_capacity) AS max_ward_capacity, ward_no FROM ward GROUP BY ward_no ORDER BY MAX(ward_capacity) DESC LIMIT 1";
$result3 = mysqli_query($conn, $sql3);
if ($result3-> num_rows > 0) {
    while ($row3 = $result3-> fetch_assoc()) { 
        $max_ward_capacity = $row3['max_ward_capacity'];
        $largest_ward = $row3['ward_no'];
        }
}

$sql3 = "SELECT COUNT(ward_type) AS max_ward_type, ward_type FROM accommodation LEFT OUTER JOIN ward ON accommodation.ward_no = ward.ward_no GROUP BY ward_type ORDER BY COUNT(ward_type) DESC LIMIT 1";
$result3 = mysqli_query($conn, $sql3);
if ($result3-> num_rows > 0) {
    while ($row3 = $result3-> fetch_assoc()) { 
        $max_ward_type = $row3['max_ward_type'];
        $max_ward_type_name = $row3['ward_type'];
        }
}
?>