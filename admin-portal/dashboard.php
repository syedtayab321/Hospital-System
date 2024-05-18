<?php
session_start();
if(isset($_SESSION['username']))
{
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
    <link rel="stylesheet" href="admin-css/dashboard.css">
    <style>
       @media (max-width:799px)
   {
    .main-dashboard
    {
        height: auto;
    }
     .login-section .patient
     {
       margin-top: 100px;
     }
   }
    </style>
</head>
<body>

    <div class="main-dashboard">
        <nav class="navbar navbar-expand-lg bg-body-tertiary"style="background-color: #0000007d;">
            <div class="container-fluid">
              <a class="navbar-brand" href="dashboard.php" style="color: white; font-weight: bold;">HOSPITAL</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" style="color: white; " aria-current="page" href="dashboard.php">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" style="color: white; " aria-current="page" href="../index/logout.php">LOGOUT</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit" style="color: white;">Search</button>
                </form>
              </div>
            </div>
          </nav>
        <!--section-2 starts here-->
  <div class="login-section">
                          <!--- patient login-->
    <div class="patient">
         <div class="p1" >
            <img style="border-radius:15px;" src="../index/images/national-cancer-institute-1c8sj2IO2I4-unsplash.jpg" alt="" width="100%" height="100%">
         </div>
         <div class="p2">
            <h4>MANAGE PATIENT</h4>
            <a href="manage-patient.php">CLICK HERE</a>
         </div>
    </div>

    <div class="patient">
      <div class="p1">
         <img style="border-radius:15px;"  src="../index/images/pexels-vidal-balielo-jr-1250655.jpg" alt="" width="100%" height="100%">
      </div>
      <div class="p2">
         <h4>MANAGE DOCTOR</h4>
         <a href="manage-doctor.php">CLICK HERE</a>
      </div>
 </div>

 <div class="patient">
      <div class="p1">
         <img style="border-radius:15px;"  src="../index/images/marcelo-leal-6pcGTJDuf6M-unsplash.jpg" alt="" width="100%" height="100%">
      </div>
      <div class="p2">
         <h4>DIEASES PORTAL</h4>
         <a href="dieases-portal/dieases.php">CLICK HERE</a>
      </div>
 </div>

 <div class="patient">
      <div class="p1">
         <img style="border-radius:15px;"  src="../index/images/Tiny doctors and patients near hospital flat vector illustration.jpg" alt="" width="100%" height="100%">
      </div>
      <div class="p2">
         <h4>MANAGE ROOMS</h4>
         <a href="room/dashboard-room.php">CLICK HERE</a>
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
  header("location:login.php");
 ?><script>alert("YOU HAVE TO LOGIN FIRST BEFORE ACCESSING THE INFORMATION");</script>;
 <?php
}
?>