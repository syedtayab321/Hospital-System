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
                        <a class="nav-link active" style="color:#9ce22b; " aria-current="page" href="../manage-doctor.php">BACK TO DETAILS</a>
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
            <h2 style="text-align:center;color:white;">DOCTORS ACCOUNT DETAILS</h2>
                <table class="table table-bordered table-dark" style="border: 2px solid black;">
                    <tr>
                        <th>USER NAME</th>
                        <th>USER EMAIL</th>
                        <th>PASSWORD</th>
                        <th style="background-color:white; color:black;">UPDATE</th>
                        <th style="background-color:white; color:black;">DELETE</th>
                    </tr>
                       <?php
                         $sel="SELECT * FROM `doctor-login`";
                          $sql=mysqli_query($conn,$sel);
                          $num=mysqli_num_rows($sql);
                          if($num==0)
                          {
                            echo '<script>alert("NO ACCOUNT FOUND----")</script>';
                          }
                          else
                          {
                            while($row=mysqli_fetch_array($sql))
                            {
                        ?>
                    <tr>
                        <td style="background-color:white; color:black;"><?php echo $row["username"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["email"];?></td>
                        <td style="background-color:white; color:black;"><?php echo $row["password"];?></td>
                        <td><a href="doctor-account-update.php?email=<?php echo $row["email"];?>">EDIT</a></td>
                        <td><a href="doctor-account-delete.php?email=<?php echo $row["email"];?>">DELETE</a></td>
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