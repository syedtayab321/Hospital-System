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
    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
    <link rel="stylesheet" href="admin-css/details.css">
    <link rel="stylesheet" href="../bootsrap/css/bootstrap.min.css">
    <script src="../bootsrap/js/bootstrap.min.js"></script>

</head>
<body>
     <div class="main">
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
                        <a class="nav-link active" style="color: #00fff3; " aria-current="page" href="account-details/doctor-account.php">DOCTOR ACCOUNTS</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" style="color: white;" href="../index/logout.php">LOGOUT</a>
                      </li>
                      <li class="nav-item syed">
                          <a class="nav-link active" style="color: white; width: 130px;height:auto;background:#0089ff;border-radius:10px;text-align:center; " aria-current="page" href="add-doctor-details.php">ADD DOCTOR</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

            <!--table data starts here-->
            <div class="table" >
            <h2 style="text-align:center;">DOCTORS DATA</h2>
                <table class="table table-bordered table-responsive table-dark" style="border: 2px solid black;">
                    <tr>
                        <th>NAME</th>
                        <th>DOCTOR SPECIAL ID</th>
                        <th>SPECILIST</th>
                        <th>MOBILE NO</th>
                        <th>ADDRESS</th>
                        <th>GENDER</th>
                        <th>EDIT</th>
                        <th>DELETE</th>

                    </tr>
                    <?php
                          include("../index/connection.php");
                          $select="SELECT * FROM `doctor`";
                          $sql=mysqli_query($conn,$select);
                          $num=mysqli_num_rows($sql);
                          if($num)
                          {
                            while($row=mysqli_fetch_array($sql))
                            {
                    ?>
                    <tr>
                        <td style="background-color:white; color:black;"><?php echo $row["doctorname"];?></td>
                        <?php if($row["doctor_id"]=="")
                        {
                          ?>
                             <td style="background-color:aquamarine; color:black;"><?php echo ("NOT AVAILAIBLE");?></td>
                          <?php
                        } else
                        {
                          ?>
                             <td style="background-color:white; color:black;"><?php echo $row["doctor_id"];?></td>
                          <?php
                        }
                        ?>
                        
                        <td style="background-color:white; color:black;"><?php echo $row["specilist"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["mobile"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["address"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["gender"];?></td>
                        <td><a href="update-doctor.php?id=<?php echo $row["doctor_id"];?>">EDIT</a></td>
                        <td><a href="doctor-delete.php?id=<?php echo $row["doctor_id"];?>">DELETE</a></td>
                    </tr>
                              <?php
                            }
                          }
                          else
                          {
                            echo '<script>alert("NO DATA FOUND----")</script>';
                          }
                       ?>
                </table>
                  
            </div>
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