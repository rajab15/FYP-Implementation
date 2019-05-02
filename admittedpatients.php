<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admitted Patients</title>
    
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

    <body class="">
        <!-- Navigation bar -->
        <nav class="navbar fixed-top navbar-dark bg-primary">
            <a class="navbar-brand" href="welcomePage.html">
                <img src="backgrounds/hospital.png" width="30" height="30" class="d-inline-block align-top" alt=""> Hospital
            </a>
        </nav> <br> <br> <br>

        <div class="container">
            <center>                

            <!-- Table for list of admitted patients -->
            <table border="0" class="table table-striped" width=80%>
                <thead class="thead-dark">
                    <tr>
                    <th scope="col" width=7%>Patient ID</th>
                    <th scope="col" width=35%>Patient Names</th>
                    <th scope="col" width=10%>Gender</th>
                    <th scope="col" width=10%>Ward</th>
                    <th scope="col" width=10%>Bed No.</th>
                    <th scope="col" width=18%>Discharge Date</th>
                    <th scope="col" width=5%></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Rajab Yassin Juma</td>
                        <td>m</td>
                        <td>A</td>
                        <td>122</td>
                        <td>03/03/1009</td>
                        <td>
                            <button type="button" class="btn btn-danger">Discharge</button>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>Rajab Yassin Juma</td>
                        <td>m</td>
                        <td>A</td>
                        <td>122</td>
                        <td>03/03/1009</td>
                    </tr>

                    <tr>
                        <?php 
                        include 'php/fetch_patients.php';
                        ?>
                        
                    </tr>

                    <!-- PHP for fetching names from the database -->
                    
                </tbody>
                   
            </table>
            </center>
        </div>        
    </body>
</html>