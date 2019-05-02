
<?php 
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include 'db_connection.php';
OpenCon();
$conn = OpenCon();
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
      $username = $_SESSION['username'];

      $query = "select * from nurse where username = '$username'";
	  //We run the query.
				
	  $result = mysqli_query($conn, $query);
	  
	  while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  
	      $names = $line['first_name']." ".$line['last_name'] ;
		  $ward = $line['ward_no'] ;
		  $id = $line['nurse_id'] ;
		  $phone_no = $line['phone_no'] ;
		  $work_no = $line['work_no'] ;
		  $city = $line['city'] ;
		  $state = $line['state'] ;
		  $gen = $line['gender'] ;
		  $birth_date = $line['birth_date'] ;
		  $marital_status = $line['marital_status'] ;

		  if($gen == "M"){
			  $gender = "Male";
		  } else {
			  $gender = "Female";
		  }
	  }
	  
	  
		  $_SESSION['nurse_names'] = $names ;
		  $_SESSION['nurse_ward'] = $ward ;
		  $_SESSION['nurse_id'] = $id ; 
		  $_SESSION['city'] = $city ;
		  $_SESSION['state'] = $state ;
		  $_SESSION['gender'] = $gender ; 
		  $_SESSION['birth_date'] = $birth_date ;
		  $_SESSION['marital_status'] = $marital_status ;
		  $_SESSION['phone_no'] = $phone_no ; 
		  $_SESSION['work_no'] = $work_no ;
		  
?>	  