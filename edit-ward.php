<?php 
 session_start();
 include 'php/details.php';
 include 'php/patient_data.php';
?>
<?php
if(isset($_POST["submit"]))
{
 
if(count($_POST)>0) 
{
 //Including db_connection file.
//include 'db_connection.php';

$conn = OpenCon();
 
$ward = $_POST["ward"];

$sql = "SELECT * FROM ward WHERE ward_no = $ward";
$result = mysqli_query($conn, $sql);


    while ($row = $result-> fetch_assoc()) {

        $capacity = $row['ward_capacity'];
        $type = $row['ward_type'];
        }
}
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Edit Ward | MRS - Medicine Reminding System</title>
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
						<li><a href="admitted-patients.php" class=""><i class="lnr lnr-list"></i> <span>Admitted Patients</span></a></li>
						<li><a href="assign-bed.php" class=""><i class="lnr lnr-cog"></i> <span>Assign Bed</span></a></li>
						<li><a href="prescription.php" class=""><i class="lnr lnr-file-empty"></i> <span>Prescriptions</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Nurse</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.php" class="">Profile</a></li>
								</ul>
							</div>
						</li>
						<li><a href="wards.php" class="active"><i class="lnr lnr-dice"></i> <span>Wards</span></a></li>
						<li><a href="patient-details.php" class=""><i class="lnr lnr-user"></i> <span>Patient Details</span></a></li>
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
					<h3 class="page-title">Edit Ward</h3>
					<div class="row">
						<div class="col-md-8">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Ward Information</h3>
									<p class="panel-subtitle">Selected ward information</p>
								</div>
								<div class="panel-body">
                                    <form method="POST" action="php/edit_ward.php">
                                        Ward Number:
                                        <input type="text" class="form-control" placeholder="Ward Number" name="ward_no" value="<?php echo $ward; ?>">
                                        <br>
                                        Ward Capacity:
                                        <input type="number" class="form-control" placeholder="Ward capacity" name="ward_capacity" value="<?php echo $capacity; ?>">	
                                        <br>
                                        Ward Type:
                                        <select class="form-control" name="ward_type">
                                        <option default><?php echo $type; ?></option>
                                        <option value="Pediatrics">Pediatrics</option>
										<option value="Maternity">Maternity</option>
										<option value="Oncology">Oncology</option>
                                        <option value="Psychiatric">Psychiatric</option>
                                        <option value="Geriatric">Geriatric</option>
                                        <option value="Detoxification">Detoxification</option>
                                        <option value="Dialysis">Dialysis</option>
                                        <option value="Intensive Care Unit">Intensive Care Unit</option>
                                        <option value="Emergency">Emergency</option>
                                        </select>
                                        <br>
                                        <input type="submit" class="btn btn-primary" style="" name="submit" value="Submit Changes" onclick="">
                                    </form>
								
								</div>
							</div>
							<!-- END PANEL HEADLINE -->
						</div>
						
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
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/vendor/toastr/toastr.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="assets/scripts/alarm.js"></script>
	<script>
			$(document).ready(function(){
			setInterval(function(){
				$.post("php/prescription_data.php",function(postresult){
					//var alarm_data = new Array();
					alarm_data = JSON.parse(postresult);
					for (var i = 0; i < alarm_data.length; i++) { 
					display(alarm_data[i]);
				}
			});
			}, 1800000);
			});
	</script>
</body>

</html>
