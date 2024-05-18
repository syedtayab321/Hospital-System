<?php
session_start();
if(isset($_SESSION['username']))
{
  include("../../index/connection.php");
  $wardid=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
    <link rel="stylesheet" href="../admin-css/details.css">
    <script src="../validation.js/manage-patient.js"></script>
    <link rel="stylesheet" href="../../bootsrap/css/bootstrap.min.css">
    <script src="../../bootsrap/js/bootstrap.min.js"></script>

</head>
<body style="background-color:#00003a5c;">
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
                        <a class="nav-link active" style="color: #00fff3; " aria-current="page" href="manage-room.php">BACK TO ROOM DETAILS</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="../../index/logout.php">LOGOUT</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

            <!--table data starts here-->
            <div class="table1 table-responsive">
            <h2 style="text-align:center;color:white;"><?php echo $wardid; ?> Patients DATA</h2>
                <table class="table table-bordered table-dark" style="border: 2px solid black;">
                    <tr>
                        <th>NAME</th>
                        <th>DIEASES</th>
                        <th>MOBILE NO</th>
                        <th>ADDRESS</th>
                        <th>GENDER</th>
                        <th>DOCTOR NAME</th>
                        <th>DOCTOR SPECILIZATION</th>
                        <th>STATE</th>
                    </tr>
                       <?php
                         $sel="SELECT * FROM `patient`  LEFT JOIN `doctor` ON `patient`.`doctor_id`=`doctor`.`doctor_id` WHERE `patient`.`dieases`='$wardid'";
                          $sql=mysqli_query($conn,$sel);
                          $num=mysqli_num_rows($sql);
                          if($num==0)
                          {
                            echo '<script>alert("NO DATA FOUND----")</script>';
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
                        <td style="background-color:black; color:white;"><?php echo $row["doctorname"];?></td>
                        <td style="background-color:black; color:white;"><?php echo $row["specilist"];?></td>
                        <?php if($row["email"]=="")
                        {
                          ?>
                          <td style="background-color:red; color:white;"><?php echo ("DISCHARGED");?></td>
                          <?php
                        } 
                        else
                        {
                          ?>
                          <td style="background-color:dodgerblue; color:black;"><?php echo ("UNDER TREATMENT");?></td>
                          <?php
                        } ?>
                        </tr>
                        <?php
                            }
                          }
                          ?>
                </table>
     </div>
</body>
</html>
<?php
}
else 
{
  echo '<script>alert("YOU HAVE TO LOGIN FIRST BEFORE ACCESSING THE INFORMATION")</script>';
  header("location:login.php");
}
?>