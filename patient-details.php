<?php 
 session_start();
 include 'php/details.php';
 include 'php/patient_data.php';
?>
<!doctype html>
<html lang="en">

<head>
	<title>Patient Details | MRS - Medicine Reminding System</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="home.php"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $_SESSION['nurse_names']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="page-profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="php/logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
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
						<li><a href="home.php" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li><a href="register-patient.php" class=""><i class="lnr lnr-file-add"></i> <span>Register Patient</span></a></li>
						<li><a href="all-patients.php" class=""><i class="lnr lnr-file-empty"></i> <span>Registered Patients</span></a></li>
						<li><a href="admitted-patients.php" class=""><i class="lnr lnr-list"></i> <span>Admitted Patients</span></a></li>
						<li><a href="assign-bed.php"><i class="lnr lnr-cog"></i> <span>Assign Bed</span></a></li>
						<li><a href="prescription.php" class=""><i class="lnr lnr-file-empty"></i> <span>Prescriptions</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Nurse</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.php" class="">Profile</a></li>
								</ul>
							</div>
						</li>
                        <li><a href="wards.php" class=""><i class="lnr lnr-dice"></i> <span>Wards</span></a></li>
                        <li><a href="patient-details.php" class="active"><i class="lnr lnr-user"></i> <span>Patient Details</span></a></li>
						</ul>
				</nav>
			</div>
		</div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
                    <h3 class="page-title">Patient Details</h3>
                    <form action="php/patient_details.php" method="POST">
					<div class="row">
						<div class="col-md-12">
							<!-- PANEL DEFAULT -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Select patient to view his/her details</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										
									</div>
								</div>
								<div class="panel-body">
                                    <span id="IDHint"></span>
                                    <input type="number" class="form-control" placeholder="Enter Patient ID Number" name="patient_id" onkeyup="showIDHint(this.value)" required>
                                    <br>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Search">
								</div>
							</div>
							<!-- END PANEL DEFAULT -->
						</div>
                    </div>
                    </form>
				</div>
            </div>
            
            <!-- Patient details below -->
            <div id="details"class="container-fluid" style="display:none">
					<h3 class="page-title">Patient Details:</h3>
					
					

					<div class="row">
						<div class="col-md-6">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Basic Information</h3>
								</div>
								<div class="panel-body">
									<h4>First Name:</h4>
									<?php echo $fname; ?>
									<br>
									<h4>Middle Name:</h4>
									<input type="text" class="form-control" placeholder="Enter patient middle name" name="mname" required>
									<br>
									<h4>Last Name:</h4>
									<input type="text" class="form-control" placeholder="Enter patient last name" name="lname" required>
									<br>
									<h4>Gender:</h4>
									
									<label class="fancy-radio">
										<input name="gender" value="Male" type="radio">
										<span><i></i>Male</span>
									</label>
									<label class="fancy-radio">
										<input name="gender" value="Female" type="radio">
										<span><i></i>Female</span>
									</label>
									
									<br>
									<h4>Date of Birth:</h4>
									<input type="date" class="form-control" name="bdate" required>
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
								<h4>City:</h4>
									<input type="text" class="form-control" placeholder="Enter city" name="city">
									
									<h4>State:</h4>
									<input type="text" class="form-control" placeholder="Enter state" name="state">
									<br>
									<h3>Contacts</h3>
									<h4>Phone Number:</h4>
									<input type="number" class="form-control" placeholder="Enter phone number" name="phone_no">
									<h4>Work Number:</h4>
									<input type="number" class="form-control" placeholder="Enter work number" name="work_no">
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
								<h4>Marital Status:</h4>
									<select class="form-control" name="marital_status">
										<option value="single">Single</option>
										<option value="married">Married</option>
										<option value="divorced">Divorced</option>
										<option value="widowed">Widowed</option>
									</select>									
									<br>
									<h4>Current Medication:</h4>
									<input type="text" class="form-control" placeholder="Enter medication" name="em_medicine">
									<br>
								</div>
							</div>
							<!-- END PANEL NO CONTROLS -->
						</div>
						
					</div>
					<h3>In case of emergency</h3>
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
									<h4>First Name:</h4>
									<input type="text" class="form-control" placeholder="Enter first name" name="em_fname">
									<br>
									<h4>Last Name:</h4>
									<input type="text" class="form-control" placeholder="Enter last name" name="em_lname">
									<br>
									<h4>Relationship with patient:</h4>
									<input type="text" class="form-control" placeholder="Relationship" name="em_relation">

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
									<h4>Phone Number:</h4>
									<input type="text" class="form-control" placeholder="Phone number" name="em_phone_no">
									<br>
									<h4>Work Number:</h4>
									<input type="text" class="form-control" placeholder="Work number" name="em_work_no">
									<br>
								</div>
							</div>
							<!-- END PANEL NO CONTROLS -->
						</div>
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
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/vendor/toastr/toastr.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="assets/scripts/alarm.js"></script>
	<script>
		function showIDHint(str) {
			if (str.length == 0) { 
				document.getElementById("IDHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("IDHint").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "php/get_id_hint.php?q=" + str, true);
				xmlhttp.send();
			}
		}
	</script>
</body>
</html>
    