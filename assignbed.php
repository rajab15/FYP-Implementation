<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">    
        <title>Assign Bed</title>

    <!-- OFFLINE BOOTSTRAP FOR CSS -->
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.css" />
    <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="bootstrap4/css/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="bootstrap4/css/bootstrap-reboot.css" />
    <link rel="stylesheet" href="bootstrap4/css/bootstrap-reboot.min.css" />
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" />

    <!-- OFFLINE BOOTSTRAP FOR JS -->
    <link rel="stylesheet" href="bootstrap4/js/bootstrap.bundle.js" />
    <link rel="stylesheet" href="bootstrap4/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="bootstrap4/js/bootstrap.js" />
    <link rel="stylesheet" href="bootstrap4/js/bootstrap.min.js" />

    <!-- My CSS-->
    <link rel="stylesheet" href="rajabcss.css" />

    </head>

    <body>
    <center>
        <!-- Navigation bar -->
        <nav class="navbar fixed-top navbar-dark bg-primary">
            <a class="navbar-brand" href="welcomePage.html">
                <img src="backgrounds/hospital.png" width="30" height="30" class="d-inline-block align-top" alt=""> Hospital
            </a>
        </nav> <br> <br> <br>


        
        <div class="container">
            <form action="php/assign_bed.php" method="POST">
                <table class="table table-striped table-bordered" width=60%>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" width= >Patient Details</th>
                            <th scope="col" width= >Ward Details</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td scope="col">
                                <!--<form  action="php/assign_bed.php" method="POST"> -->
                                Patient ID: <br>
                                <input type="number" class="form-control" placeholder="Enter Patient ID" name="patient_id">
                                <br>
                                Ward Number: <br>
                                <input type="number" class="form-control" placeholder="Enter Ward Number" name="ward_no">
                                <br>
                                Bed Number : <br>
                                <input type="number" class="form-control" placeholder="Enter Bed Number" name="bed_no">
                                <br>
                                Admission Date: <br>
                                <input type="date" class="form-control" placeholder="Enter PAdmission Date" name="admission_date">
                                <br>
                                Expected Release Date: (Optional): <br>
                                <input type="date" class="form-control" placeholder="Enter Patient ID" name="release_date">
                                <br>
                                <input type="submit" class="btn btn-success" value="Assign">
                                
                            </td>
                            
                            <td scope="col" width="30%">
                                <?php include 'php/ward_data.php' ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </center>
    </body>
</html>