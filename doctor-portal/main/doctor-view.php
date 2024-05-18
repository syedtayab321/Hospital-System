<?php
session_start();
if(isset($_SESSION['doctor_id']))
{
  include("../../index/connection.php");
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
    <link rel="stylesheet" href="../../admin-portal/admin-css/details.css">
    <link rel="stylesheet" href="../../bootsrap/css/bootstrap.min.css">
    <script src="../../bootsrap/js/bootstrap.min.js"></script>

</head>
<body style="background-color:#00003a5c;">
            <nav class="navbar navbar-expand-lg bg-body-tertiary"style="background-color: #0000007d;">
                <div class="container-fluid">
                  <a class="navbar-brand" href="../doctor-dashboard.php" style="color: white; font-weight: bold;">HOSPITAL</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" style="color: white; " aria-current="page" href="../doctor-dashboard.php">HOME</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="../../index/logout.php">LOGOUT</a>
                      </li>
                    </ul>
                    <form class="d-flex" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit" style="color: white;">Search</button>
                    </form>
                  </div>
                </div>
              </nav>
            <!--table data starts here-->
            <div class="table1 table-responsive">
            <h2 style="text-align:center;color:white;">PATIENTS UNDER TREATMENT </h2>
                <table class="table table-bordered table-dark" style="border: 2px solid black;">
                    <tr>
                        <th>PATIENT NAME</th>
                        <th>DIEASES</th>
                        <th>MOBILE NO</th>
                        <th>ADDRESS</th>
                        <th>GENDER</th>
                    </tr>
                       <?php
                       $email=$_SESSION['doctor_id'];
                       $elect="SELECT * FROM `doctor` WHERE `doctor_id`= '$email'";
                       $ruu=mysqli_query($conn,$elect);
                       $data=mysqli_fetch_array($ruu);
                        if($data["specilist"]!="")
                        {
                          $em= $data["specilist"];
                          $sel="SELECT * FROM `patient` WHERE `dieases`='$em'";
                           $sql=mysqli_query($conn,$sel);
                           $num=mysqli_num_rows($sql);
                           if($num==0)
                           {
                             echo '<script>alert("NO PATIENT IS AVAILAIBLE----")</script>';
                           }
                           else
                           {
                             while($row=mysqli_fetch_array($sql))
                             {
                         ?>
                     <tr>
                         <td style="background-color:white; color:black;"><?php echo $row["patientname"];?></td>
                         <td style="background-color:white; color:black;"><?php echo $row["dieases"];?></td>
                         <td style="background-color:white; color:black;"><?php echo $row["mobile"];?></td>
                         <td style="background-color:white; color:black;"><?php echo $row["address"];?></td>
                         <td style="background-color:white; color:black;"><?php echo $row["gender"];?></td>
                         </tr>
                         <?php
                             }
                           }
                          }
                          else
                          {
                           header("location:doctor-dashboard.php");
                          }
                          ?><!--CHECKING IF DOCTOR IS AVAILAIBLE OR NOT--->
                        
                </table>
     </div>
</body>
</html>
<?php
  }
else 
{
  echo '<script>alert("YOU HAVE TO LOGIN FIRST BEFORE ACCESSING THE INFORMATION")</script>';
  header("location:doctor-login.php");
}
?>