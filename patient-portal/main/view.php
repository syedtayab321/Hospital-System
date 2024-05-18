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
    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
    <link rel="stylesheet" href="css/details.css">
    <link rel="stylesheet" href="../../bootsrap/css/bootstrap.min.css">
    <script src="../../bootsrap/js/bootstrap.min.js"></script>

</head>
<body style="background-color:#00003a5c;">
            <nav class="navbar navbar-expand-lg bg-body-tertiary"style="background-color: #0000007d;">
                <div class="container-fluid">
                  <a class="navbar-brand" href="../patient-dashboard.php" style="color: white; font-weight: bold;">HOSPITAL</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" style="color: white; " aria-current="page" href="../patient-dashboard.php">HOME</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="#" target="_blank">CONTACT ADMIN</a>
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
            <h2 style="text-align:center;color:white;">MY OWN  DATA</h2>
                <table class="table table-bordered table-dark" style="border: 2px solid black;">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>DIEASES</th>
                        <th>EMAIL</th>
                        <th>MOBILE NO</th>
                        <th>ADDRESS</th>
                        <th>GENDER</th>
                        <th>DR NAME</th>
                        <th>DR SPECILIZATION</th>
                    </tr>
                       <?php
                           $em=$_SESSION['username'];
                           $sel="SELECT * FROM `patient` LEFT JOIN `doctor` ON `patient`.`doctor_id`=`doctor`.`doctor_id` LEFT JOIN `room` ON `patient`.`ward_id`=`room`.`ward_id` WHERE `patient`.`email`='$em'";
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
                        <td><?php echo $row["id"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["patientname"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["dieases"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $_SESSION["username"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["mobile"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["address"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["gender"];?></td>
                        <!------CHECKING AILAIBLITY FOR DOCTOR-->
                        <?php if($row["doctor_id"]!=""){ ?>
                          <td style="background-color:white; color:black;"><?php echo $row["doctorname"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["specilist"];?></td>
                        <?php }
                        else
                        { ?>
                        <td style="background-color:slateblue; color:white;"><?php echo ("NO DOCTOR AVAILAIBLE");?></td>
                        <td style="background-color:slateblue; color:white;"><?php echo("NO DOCTOR AVAILAIBLE");?></td>
                        <?php }?>
                         <!------CHECKING AILAIBLITY FOR DOCTOR-->
                         <?php if($row["ward_id"]!=""){ ?>
                          <td style="background-color:white; color:black;"><?php echo $row["ward_name"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["room_no"];?></td>
                        <?php }
                        else
                        { ?>
                        <td style="background-color:slateblue; color:white;"><?php echo ("NO ROOM AVAILAIBLE");?></td>
                        <td style="background-color:slateblue; color:white;"><?php echo("NO ROOM AVAILAIBLE");?></td>
                        <?php }?>
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
  header("location:patient-login.php");
}
?>