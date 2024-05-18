<?php
  include('../../index/connection.php');
  $email=$_GET["email"];
  $select="SELECT * FROM `patient-login` WHERE `email`='$email'";
  $run=mysqli_query($conn,$select);
  $row=mysqli_fetch_array($run);
?>
<!--document starts here-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../patient-portal/css/register.css">

    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
</head>
<body>
<div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../../index/images-avatar/profile.png" alt="UPDATION FORM " height="90px" width="90px" style="margin-bottom:10px;" >
                <h1>ACCOUNT UPDATE FORM</h1>
            </div>
            <div class="form">
                <form action="" method="post" name="myforms">
                <div class="input input-2">
                <label for="username">USER NAME:</label>
                <input type="text" value="<?php echo $row['username'];?>" name="username" id="username" required="" placeholder="USER NAME">
              </div>
              <div class="input input-3">
                <label for="email">EMAIL:</label>
                <input type="email" value="<?php echo $row['email'];?>" name="email" id="email" required="" placeholder="EMAIL HERE">
              </div>
              <div class="input input-4">
                <label for="password">PASSWORD:</label>
                <input type="text" value="<?php echo $row['password'];?>" name="password" id="password" required="" placeholder="Password HERE">
              </div>
              <div class="input input-5">
                <label for="cpassword">CONFIRM PASSWORD:</label>
                <input type="text" value="<?php echo $row['password'];?>" name="cpassword" id="cpassword" required="" placeholder="CONFIRM Password">
                </div>
                </form>
            </div>
            <div class="textt">
                <div class="back">
                    <a href="patient-accounts.php">GO BACK</a>
                </div>
            </div>
        </div>
    </div>
    <!--PHP CODING STARTS HERE-->
      <?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $patname=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $sql=" UPDATE `patient-login` SET `username`='$patname',`email`='$email',`password`='$password' WHERE `email`='$email'";
     $result=mysqli_query($conn,$sql);
    if($result)
    {
      echo '<script>alert("DATA UPDATED SUCESSFULLY")</script>';
      header('location:patient-accounts.php?');
    }
    else
    {
      echo '<script>alert("DATA NOT UPDATED")</script>';
    }
  }
  ?>
</body>
</html>