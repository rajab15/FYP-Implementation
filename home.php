<?php 
 session_start();
 include 'php/details.php';
 include 'php/patient_data.php';
 include 'php/monthly_admissions.php';
?>
<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | MRS - Medicine Reminding System</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	
	<link rel="stylesheet" href="assets/css/demo.css">
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
						<li><a href="home.php" class="active"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li><a href="register-patient.php" class=""><i class="lnr lnr-file-add"></i> <span>Register Patient</span></a></li>
						<li><a href="admitted-patients.php" class=""><i class="lnr lnr-list"></i> <span>Admitted Patients</span></a></li>
						<li><a href="assign-bed.php" class=""><i class="lnr lnr-cog"></i> <span>Assign Bed</span></a></li>
						<li><a href="prescription.php" class=""><i class="lnr lnr-file-empty"></i> <span>Prescriptions</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Nurse</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.php" class="">Profile</a></li>
									<!-- <li><a href="page-lockscreen.php" class="">Lockscreen</a></li> -->
								</ul>
							</div>
						</li>
						<li><a href="wards.php" class=""><i class="lnr lnr-dice"></i> <span>Wards</span></a></li>
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

					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Ward Overview</h3>
							<p class="panel-subtitle"></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-download"></i></span>
										<p>
											<span class="number"><?php echo $patients; ?></span>
											<span class="title">Total registered patients</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number"><?php echo $admitted_patients; ?></span>
											<span class="title">Total Admitted Patients</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number"><?php echo $current_admitted_patients; ?></span>
											<span class="title">Current admitted patients</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-eye"></i></span>
										<p>
											<span class="number"><?php echo $nurses; ?></span>
											<span class="title">Number of registered nurses</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-6">
							<!-- PROGRESS BARS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Ward Occupancies</h3>
								</div>
								<div class="panel-body">
									<?php include "php/ward_data2.php" ?>									
								</div>
							</div>
							<!-- END PROGRESS BARS -->
						</div>
						<div class="col-md-6">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Monthly Admissions</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<div id="patients-per-month-bar-chart" class="ct-chart"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Monthly Discharges</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<div id="discharges-per-month-bar-chart" class="ct-chart"></div>
								</div>
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
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="assets/scripts/prescription_patients.js"></script>
	<script>
		
	</script>
	<script>
		var jan_counter = <?php echo $jan_counter ?>;
		var feb_counter = <?php echo $feb_counter ?>; 
		var mar_counter = <?php echo $mar_counter ?>;
		var apr_counter = <?php echo $apr_counter ?>;
		var may_counter = <?php echo $may_counter ?>;
		var jun_counter = <?php echo $jun_counter ?>;
		var jul_counter = <?php echo $jul_counter ?>;
		var aug_counter = <?php echo $aug_counter ?>;
		var sep_counter = <?php echo $sep_counter ?>;
		var oct_counter = <?php echo $oct_counter ?>;
		var nov_counter = <?php echo $nov_counter ?>;
		var dec_counter = <?php echo $dec_counter ?>;

		var jan_dis = <?php echo $jan_dis ?>;
		var feb_dis = <?php echo $feb_dis ?>; 
		var mar_dis = <?php echo $mar_dis ?>;
		var apr_dis = <?php echo $apr_dis ?>;
		var may_dis = <?php echo $may_dis ?>;
		var jun_dis = <?php echo $jun_dis ?>;
		var jul_dis = <?php echo $jul_dis ?>;
		var aug_dis = <?php echo $aug_dis ?>;
		var sep_dis = <?php echo $sep_dis ?>;
		var oct_dis = <?php echo $oct_dis ?>;
		var nov_dis = <?php echo $nov_dis ?>;
		var dec_dis = <?php echo $dec_dis ?>;
		$(function() {
		var options;
		

		var ppm_data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [
				[jan_counter, feb_counter, mar_counter, apr_counter, may_counter, jun_counter, jul_counter, aug_counter, sep_counter, oct_counter, nov_counter, dec_counter],
			]
		};

		// bar chart
		options = {
			height: "400px",
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#patients-per-month-bar-chart', ppm_data, options);

		var dpm_data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [
				[jan_dis, feb_dis, mar_dis, apr_dis, may_dis, jun_dis, jul_dis, aug_dis, sep_dis, oct_dis, nov_dis, dec_dis],
			]
		};

		// bar chart
		options = {
			barColor: "rgb('255', '0', '0')",
			
			height: "400px",
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#discharges-per-month-bar-chart', dpm_data, options);
	});
	</script>
</body>

</html>
