<?php
session_start();
if(isset($_SESSION['username']))
{
    include("../../index/connection.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootsrap/css/bootstrap.min.css">
    <script src="../../bootsrap/js/bootstrap.min.js"></script>
    <script src="../jquery/jquery-3.6.4.min.js"></script>
    <title>HOSPITAL MANAMENT SYSTEM(HMS)</title>
    <link rel="stylesheet" href="dieases.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary"style="background-color: #0000007d;">
            <div class="container-fluid">
              <a class="navbar-brand" href="../dashboard.php" style="color: white; font-weight: bold;">HOSPITAL</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" style="color: white; " aria-current="page" href="../dashboard.php">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" style="color: white; " aria-current="page" href="../../index/logout.php">LOGOUT</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    <div class="main-dashboard">
           <form action="" method="post">
           <div class="input input-4">
                <select name="dieases" id="dieases">
                  <option value="">--SELECT--</option>
                  <option value="corona">CORONA PATIENTS</option>
                  <option value="cancer">CANCER PATIENTS</option>
                  <option value="skin">SKIN PATIENTS</option>
                  <option value="belgum">BELGUM PATIENTS</option>
                  <option value="dental">DENTIST PATIENTS</option>
                  <option value="child">CHILD PATIENTS</option>
                  <option value="bones">BONE PATIENTS</option>
                  <option value="eye">EYE PATIENTS</option>
                  <option value="theropy">THEROPISY PATIENTS</option>
                </select>
              </div>
            <button type="submit" class="btn btn-secondary">SHOW</button>
           </form>
    </div>
    <!--tables data start here--->
    <div class="table1 table-responsive">
                <table class="table table-bordered table-dark" style="border: 2px solid black;">
                    <tr>
                        <th>PATIENT ID</th>
                        <th>PATIENT NAME</th>
                        <th>PATIENT EMAIL</th>
                        <th>PATIENT DIEASES</th>
                        <th>PATIENT MOBILE NO</th>
                        <th>PATIENT ADDRESS</th>
                        <th>PATIENT GENDER</th>
                        <th>DR NAME</th>
                        <th>DR ID</th> 
                       
                    </tr>
                       <?php
                       if($_SERVER["REQUEST_METHOD"]=="POST")
                       {
                         $dieases=$_POST["dieases"];
                         $sel="SELECT * FROM `patient` LEFT JOIN `doctor` ON `patient`.`doctor_id`=`doctor`.`doctor_id` WHERE `patient`.`dieases`='$dieases'";
                          $sql=mysqli_query($conn,$sel);
                          $num=mysqli_num_rows($sql);

                          // $room="SELECT * FROM `room` WHERE `patient`='$dieases'";
                          // $room_sql=mysqli_query($conn,$room);
                          // $room_num=mysqli_num_rows($room_sql);
                          // $room_row=mysqli_fetch_array($room_sql);
                          if($num==0)
                          {
                            echo '<script>alert("NO PATIENTS AVAILAIBLE ")</script>';
                          }
                          else
                          {
                            while($row=mysqli_fetch_array($sql))
                            {
                        ?>
                    <tr>
                        <td><?php echo $row["id"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["patientname"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["email"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["dieases"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["mobile"];?></td>
                       <td style="background-color:white; color:black;"><?php echo $row["address"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["gender"];?></td>
                        <td style="background-color:#007eff; color:white;"><?php echo $row["doctorname"];?></td>
                        <td style="background-color:#007eff; color:white;"><?php echo $row["doctor_id"];?></td>
                        <!--checking room availaible or not-->
                       
                        <!--CHECKING DOCTOR AVIALAIBLE OR NOT--->

                        </tr>
                        <?php
                            }
                          }
                        }
                          ?>
                </table>
     </div>
     <script>
        $(dcoument).ready(function()
        {
            
        });
     </script>
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