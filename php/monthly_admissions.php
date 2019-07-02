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
echo $dec_counter;
?>