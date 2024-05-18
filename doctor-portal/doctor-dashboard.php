<?php
session_start();
if(isset($_SESSION['doctor_id']))
{
  include("../index/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootsrap/css/bootstrap.min.css">
    <script src="../bootsrap/js/bootstrap.min.js"></script>
    <title>HOSPITAL MANAMENT SYSTEM(HMS)</title>
    <link rel="stylesheet" href="../patient-portal/css/patient.css">
</head>
<body>

    <div class="main-dashboard">
        <nav class="navbar navbar-expand-lg bg-body-tertiary"style="background-color: #0000007d;">
            <div class="container-fluid">
              <a class="navbar-brand" href="doctor-dashboard.php" style="color: white; font-weight: bold;">HOSPITAL</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" style="color: white; " aria-current="page" href="doctor-dashboard.php">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" style="color: white; " aria-current="page" href="../index/logout.php">LOGOUT</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!--section-2 starts here-->
  <div class="login-section">
                          <!--- patient login-->
    <div class="patient">
         <div class="p1">
            <img src="../index/images/5.jpg" alt="" width="100%" height="100%">
         </div>
         <div class="p2">
            <h4>VIEW DETAILS OF PATIENT UNDER TREATMENT</h4>
            <a href="main/doctor-view.php">CLICK HERE</a>
         </div>
    </div>
    <div class="patient">
         <div class="p1">
            <img src="../index/images/2645.jpg" alt="" width="100%" height="100%">
         </div>
         <div class="p2">
            <h4>VIEW OWN DATA</h4>
            <a href="main/doctor-data.php">CLICK HERE</a>
         </div>
    </div>
  </div>
    </div>
</body>
</html>
<?php 
}
else 
{
 ?><script>alert("YOU HAVE TO LOGIN FIRST BEFORE ACCESSING THE INFORMATION");</script>;
 <?php
  header("location:doctor-login.php");
}
?>