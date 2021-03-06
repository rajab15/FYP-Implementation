<?php 
 session_start();
 include 'php/details.php';
 include 'php/patient_data.php';
?>
<!doctype html>
<html lang="en">

<head>
	<title>Patient Prescription | MRS - Medicine Reminding System</title>
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
						<li><a href="assign-bed.php" class=""><i class="lnr lnr-cog"></i> <span>Assign Bed</span></a></li>
						<li><a href="prescription.php" class="active"><i class="lnr lnr-file-empty"></i> <span>Prescriptions</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Nurse</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.php" class="">Profile</a></li>
								</ul>
							</div>
						</li>
						<li><a href="wards.php" class=""><i class="lnr lnr-dice"></i> <span>Wards</span></a></li>
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
					<h3 class="page-title">Patient prescriptions</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Prescriptions</h3>
									<p class="panel-subtitle">Enter patient prescriptions</p>
								</div>
								<div class="panel-body">
                                    <form id="mainForm" action="php/save_prescription.php" method="POST">

                                        <!-- Table for entering Prescriptions -->
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="6">
                                                    Patient prescriptions administration:
                                                </th>
                                            </tr>
                                            <tr>
                                                <th width="30%">Product *</th>
												<td colspan="5"><input type="text" class="form-control" name="medicineName" placeholder="Medicine Name" onkeyup="showMedicineHint(this.value)" required>
												<span id="medicineHint"></span>
												</td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Patient ID *</th>
												<td colspan="5"> <span id="IDHint"></span>
												<input type="text" class="form-control" name="patient_id" placeholder="Patient ID" onkeyup="showIDHint(this.value)" required> </td>
                                            </tr>
                                            <tr>
                                                <th> Dose *</th>
                                                <td colspan="5">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" placeholder="Pills/ml" name="pills_ml" required>
                                                        <input type="number" class="form-control" placeholder="Times per day" name="times_per_day" required>
                                                        <!-- <input type="text" class="form-control" placeholder="">
                                                        <input type="text" class="form-control" placeholder=""> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Starting date *</th>
                                                <td colspan="5"><input type="date" class="form-control" name="start_day" id="" placeholder="Starting Date" required></td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <th>Times *</th>
                                                <td ><input type="time" class="form-control" name="time1" id="med_time" style="width:100px" required></td> 
                                                <td ><input type="time" class="form-control" name="time2" id="med_time" style="width:100px" ></td>
                                                <td ><input type="time" class="form-control" name="time3" id="med_time" style="width:100px" ></td>
                                                <td ><input type="time" class="form-control" name="time4" id="med_time" style="width:100px" ></td>
                                                <td ><input type="time" class="form-control" name="time5" id="med_time" style="width:100px" ></td>
                                                
                                            </td>
                                            </tr>
                                        </table> <br>

                                        <table width=70%>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col"></div>
                                                        <div class="col"></div>
                                                        <!-- <div class="col"></div> -->
                                                        <div class="col">
                                                            <input type="reset" class="btn btn-warning" name="resetprescription" value="Reset">
                                                            <input type="submit" class="btn btn-primary" name="submit" value="Save">
                                                        </div>
                                                        <div class="col"></div>
                                                        <!-- <div class="col"></div> -->
                                                    </div>

                                                </td>
                                            </tr>
                                        </table>
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
	<script defer>
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

		function showMedicineHint(str) {
			if (str.length == 0) { 
				document.getElementById("medicineHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("medicineHint").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "php/get_medicine_hint.php?q=" + str, true);
				xmlhttp.send();
			}
		}
	</script>
</body>

</html>
