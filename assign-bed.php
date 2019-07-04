<?php 
 session_start();
 include 'php/details.php';
 include 'php/patient_data.php';
?>
<!doctype html>
<html lang="en">

<head>
	<title>Assign Bed | MRS - Medicine Reminding System</title>
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
						<li><a href="assign-bed.php" class="active"><i class="lnr lnr-cog"></i> <span>Assign Bed</span></a></li>
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
					<h3 class="page-title">Assign bed to patient</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Assign Bed</h3>
									<p class="panel-subtitle">Please select bed and ward to assign</p>
								</div>
								<div class="panel-body">
								<form method="POST">
					<table class="table table-striped table-bordered" width=60%>
						<thead class="thead-dark">
							<tr>
								<th scope="col" width= >Patient Details</th>
							</tr>
						</thead>

						<tbody>
                        <tr>
                            <td scope="col">
                                <!--<form  action="php/assign_bed.php" method="POST"> -->
								Patient ID: <br>
								<span id="IDHint"></span> 
								<input type="number" class="form-control" placeholder="Enter Patient ID" name="patient_id" onkeyup="showIDHint(this.value)" required>
                                <br>
								Ward Number: <br>
								<?php include 'php/get_wards.php' ?>
                                <br>
								Bed Number : <br>
								
                                <input class="form-control" name="bed_no" id="bed_no" required>
                                <br>
                                
                                Expected Release Date: (Optional): <br>
                                <input type="date" class="form-control" placeholder="Enter Patient ID" name="release_date">
                                <br>
                                <input type="submit" class="btn btn-success" value="Assign">
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
									
								</div>
							</div>
							<!-- END PANEL HEADLINE -->
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

		function showBed(str) {
			if (str.length == 0) { 
				document.getElementById("bed_no").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						//document.getElementById("bed_no").innerHTML = this.responseText;
						$('#bed_no').val(this.responseText);
					}
				};
				xmlhttp.open("GET", "php/get_ward_bed.php?q=" + str, true);
				xmlhttp.send();
			}
		}

		$(function () {

		$('form').on('submit', function (e) {

		e.preventDefault();

		$.ajax({
			type: 'post',
			url: 'php/assign_bed.php',
			data: $('form').serialize(),
			success: function () {
			alert('Bed assigned successfully');
			location.reload(true);
			}
		});

		});

		});
	</script>

		
</body>

</html>
