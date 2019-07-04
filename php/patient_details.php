<?php 
 session_start();
 include 'details.php';
 include 'patient_data.php';
?>
<?php
				if(isset($_POST["submit"]))
				{
				
				if(count($_POST)>0) 
				{
				//Including db connection file.
				//include 'db_connection.php';
				$conn = OpenCon();

				$patient_id = $_POST["patient_id"];

				$sql = "SELECT * FROM patient WHERE patient_id = $patient_id";

				if (!mysqli_query($conn,$sql)) {
					echo '<script>';
				  echo  'alert("Wrong patient number given. Please enter correct patient number");';
				  echo '</script>'; 
				  header("Refresh:0; url=../patient-details.php");
				  }

				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					$fname = $row['first_name'];

					$mname = $row['middle_name'];

					$lname = $row['last_name'];

					$city = $row["city"];

					$state = $row["state"];

					$phone_no = $row["phone_no"];

					$work_no = $row["work_no"];

					$gender = $row["gender"];

					$bdate = $row["birth_date"];

					$mstatus = $row["marital_status"];

					$em_fname = $row["em_first_name"];

					$em_lname = $row["em_last_name"];

					$em_relation = $row["em_relationship"];

					$em_phone_no = $row["em_phone_no"];

					$em_work_no = $row["em_work_no"];

					$em_medicine = $row["em_medication"];
				}

				
				  

				CloseCon($conn);

				}
				}
    ?>
<!doctype html>
<html lang="en">

<head>
	<title>Patient Details | MRS - Medicine Reminding System</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
	<link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="home.php"><img src="../assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div class="navbar-btn">
				<h6 class="text-center">MRS - Medicine Reminding System</h6>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['nurse_names']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="../page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="../home.php" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li><a href="../register-patient.php" class=""><i class="lnr lnr-file-add"></i> <span>Register Patient</span></a></li>
						<li><a href="../all-patients.php" class=""><i class="lnr lnr-file-empty"></i> <span>Registered Patients</span></a></li>
						<li><a href="../admitted-patients.php" class=""><i class="lnr lnr-list"></i> <span>Admitted Patients</span></a></li>
						<li><a href="../assign-bed.php"><i class="lnr lnr-cog"></i> <span>Assign Bed</span></a></li>
						<li><a href="../prescription.php" class=""><i class="lnr lnr-file-empty"></i> <span>Prescriptions</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Nurse</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="../page-profile.php" class="">Profile</a></li>									
								</ul>
							</div>
						</li>
                        <li><a href="../wards.php" class=""><i class="lnr lnr-dice"></i> <span>Wards</span></a></li>
                        <li><a href="../patient-details.php" class="active"><i class="lnr lnr-user"></i> <span>Patient Details</span></a></li>
						</ul>
				</nav>
			</div>
		</div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">            
            <!-- Patient details below -->
            <div id="details"class="container-fluid">
					<h3 class="page-title">Patient Details:</h3>
					<div class="row">
						<div class="col-md-6">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Basic Information</h3>
								</div>
								<div class="panel-body">
									<h4>First Name</h4>
									<?php echo $fname; ?>
									<br>
									<h4>Middle Name</h4>
									<?php echo $mname; ?>
									<br>
									<h4>Last Name</h4>
									<?php echo $lname; ?>
									<br>
									<h4>Gender</h4>
									<?php echo $gender; ?>
									<br>
									<h4>Date of Birth</h4>
									<?php echo $bdate; ?>
									<br>
								</div>
							</div>
							<!-- END PANEL HEADLINE -->
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-6">
							<!-- PANEL DEFAULT -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Address & Contacts</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										
									</div>
								</div>
								<div class="panel-body">
								<h3>Address</h3>	
								<h4>City</h4>
                                <?php echo $city; ?>
									
									<h4>State</h4>
									<?php echo $state; ?>
									<br>
									<h3>Contacts</h3>
									<h4>Phone Number</h4>
									<?php echo $phone_no; ?>
									<h4>Work Number</h4>
									<?php echo $work_no; ?>
									<br>
								</div>
							</div>
							<!-- END PANEL DEFAULT -->
						</div>
						<div class="col-md-4">
							<!-- miscellaneous -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Miscellaneous</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>										
									</div>
								</div>
								<div class="panel-body">
								<h4>Marital Status</h4>
                                <?php echo $mstatus; ?>								
									<br>
									<h4>Current Medication</h4>
									<?php echo $em_medicine; ?>
									<br>
								</div>
							</div>
							<!-- END PANEL NO CONTROLS -->
						</div>
						
					</div>
					<h3 class="page-title">In case of emergency:</h3>
					<div class="row">
					<div class="col-md-4">
							<!-- next of kin -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Next of Kin</h3>
									<p>Basic Info</p>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										
									</div>
								</div>
								<div class="panel-body">
									<p>Emergency Contact</p>
									<h4>First Name</h4>
									<?php echo $em_fname; ?>
									<br>
									<h4>Last Name</h4>
									<?php echo $em_lname; ?>
									<br>
									<h4>Relationship with patient</h4>
									<?php echo $em_relation; ?>

								</div>
							</div>
							<!-- END PANEL NO CONTROLS -->
						</div>
						<div class="col-md-4">
							<!-- next of kin -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Next of Kin</h3>
									<p>Contact Info</p>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										
									</div>
								</div>
								<div class="panel-body">
									<p>Emergency Contact</p>
									<h4>Phone Number</h4>
									<?php echo $em_phone_no; ?>
									<br>
									<h4>Work Number</h4>
									<?php echo $em_work_no; ?>
									<br>
								</div>
							</div>
							<!-- END PANEL NO CONTROLS -->
						</div>
					</div>
					<!--Row end-->
					<h3 class="page-title">Patient Records:</h3>
					<?php
						//include db connection
						//include 'db_connection.php';

							echo "<div class='row'>";
							echo "<div class='col-md-12'>";
							echo "<div class='panel'>";
							echo "<div class='panel-heading'>";
							echo "<h3 class='panel-title'>Ward Admission</h3>";
							echo "<p>History</p>";
							echo "</div>";
							echo "<div class='panel-body'>";
							//echo "<div>";
							echo "<table class='table table-bordered table-striped zero_config'>";
							echo "<thead><tr><th>Ward Number</th><th>Bed Number</th><th>Admission Date</th><th>Release Date</th><th>Admission Status</th></tr></thead>";
							echo "<tbody>";

						$conn = OpenCon();

						$sql = "SELECT * FROM accommodation WHERE patient_id = $patient_id";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								echo "<tr><td>". $row['ward_no']."</td><td>". $row['bed_no']."</td><td>". $row['admission_date']."</td><td>". $row['release_date']."</td><td>". $row['state']."</td></tr>";
						}

							echo "</tbody>";
							echo "</table>";
							echo "</div>";
							echo "</div>";
							echo "</div>";
							echo "</div>";        
							
					?> 
					
					<?php
						//include db connection
						//include 'db_connection.php';

							echo "<div class='row'>";
							echo "<div class='col-md-12'>";
							echo "<div class='panel'>";
							echo "<div class='panel-heading'>";
							echo "<h3 class='panel-title'>Prescription Records</h3>";
							echo "<p>History</p>";
							echo "</div>";
							echo "<div class='panel-body'>";
							//echo "<div>";
							echo "<table class='table table-bordered table-striped zero_config'>";
							echo "<thead><tr><th>Medicine</th><th>Start date</th></tr></thead>";
							echo "<tbody>";

						$conn = OpenCon();

						$sql = "SELECT * FROM prescription WHERE patient_id = $patient_id";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
								echo "<tr><td>". $row['medicine']."</td><td>". $row['date']."</td></tr>";
						}

							echo "</tbody>";
							echo "</table>";
							echo "</div>";
							echo "</div>";
							echo "</div>";
							echo "</div>";        
							
					?>   
				</div>

                </div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; <?php echo date("Y"); ?> MRS - Medicine Reminding System</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="../assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="../assets/vendor/toastr/toastr.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
	<script src="../assets/scripts/alarm.js"></script>
	<!-- this page js -->
	<script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('.zero_config').DataTable();
	</script>
	
	<!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
	<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
    