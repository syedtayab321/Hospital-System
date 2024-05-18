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
    <link rel="stylesheet" href="../admin-css/details.css">
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
                        <a class="nav-link" style="color: white;" href="../../index/logout.php">LOGOUT</a>
                      </li>
                    </ul>
                    
                  </div>
                </div>
              </nav>

            <!--table data starts here-->
            <div class="table1 table-responsive">
            <h2 style="text-align:center;color:white;">ROOM DATA</h2>
                <table class="table table-bordered table-dark" style="border: 2px solid black;">
                    <tr>
                        <th>ID</th>
                        <th>ROOM NAME</th>
                        <th>ROOM NO</th>
                        <th>TOTAL BEDS</th>
                        <th>TOTAL PATIENTS</th>
                        <th>PATIENTS</th>
                        <th  style="background-color:white; color:black;">VIEW PATIENTS</th>
                        <th style="background-color:white; color:black;">DELETE</th>
                    </tr>
                       <?php
                         $sel="SELECT * FROM `room`";
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
                              $dat=$row["patient"];
                              $sels="SELECT * FROM `patient` WHERE `dieases`='$dat'";
                              $sqls=mysqli_query($conn,$sels);
                              $nums=mysqli_num_rows($sqls);
                        ?>
                    <tr>
                        <td><?php echo $row["ward_id"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["ward_name"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["room_no"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["total_beds"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $nums;?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["patient"];?></td>
                        <td><a href="room-delete.php?id=<?php echo $row["ward_id"];?>">DELETE</a></td>
                        <td><a href="room-patients.php?id=<?php echo $row["patient"];?>">VIEW </a></td>
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