<?php
  include('../../index/connection.php');
  $email=$_GET["email"];
  $select="SELECT * FROM `doctor-login` WHERE `email`='$email'";
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
    <script src="../../patient-portal/patient.js"></script>
    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
</head>
<body>
<div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../../index/images-avatar/profile.png" alt="REGISTRATION FORM " height="90px" width="90px" >
                <h3>UPDATION FORM</h3>
            </div>
            <div class="form">
                <form action="" method="post" name="myforms">
                    <input type="text" name="username" id="username" value="<?php echo $row["username"];?>" class="user" placeholder="USERNAME HERE" required="" oninput="name_validation()">
                    <p class="username">*USERNAME MUST CONTAIN MORE THAN 5 LETTERS</p>

                    <input type="email" name="email" id="email"  value="<?php echo $row["email"];?>" class="emails" placeholder="EMAIL HERE" required="" oninput="email_validation()">
                    <p class="email">*EMAIL MUST CONTAIN MORE THAN 10 LETTERS</p>

                    <input type="doctor_id" name="doctor_id" id="doctor_id"  value="<?php echo $row["doctor_id"];?>" placeholder="DOCTOR SPECIAL ID HERE" required="" >

                    <input type="text" name="password" id="password"  value="<?php echo $row["password"];?>" class="pass" placeholder="PASSWORD HERE" required="" oninput="password_validation()">
                    <ul id="ul" style="display:none;flex-direction:column;justify-content:center;align-items:center;">
                      <li id="capital" >PASSWORD MUST CONTAIN AN CAPITAL LETTER</li>
                      <li id="number" >PASSWORD MUST CONTAIN A NUMBER</li>
                      <li id="special" >PASSWORD MUST CONTAIN A SPECIAL CHARACTER</li>
                      <li id="letter">PASSWORD MUST CONTAIN 8-20 LETTERS</li>
                    </ul>

                    <input type="cpassword" name="cpassword" value="<?php echo $row["password"];?>"  id="cpassword" class="cpass" placeholder="CONFIRM PASSWORD HERE" required="" oninput="cpassword_validation()">
                    <p class="cpassword">*PASSWORD DO NOT MATCHED</p>
                    <input type="submit" value="REGISTER" >
                </form>
            </div>
            <div class="textt">
                <div class="back">
                    <a href="doctor-account.php">GO BACK</a>
                </div>
            </div>
        </div>
    </div>
      <?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $patname=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $sql=" UPDATE `doctor-login` SET `username`='$patname',`email`='$email',`password`='$password' WHERE `email`='$email'";
     $result=mysqli_query($conn,$sql);
    if($result)
    {
      echo '<script>alert("DATA UPDATED SUCESSFULLY")</script>';
      header('location:doctor-account.php?');
    }
    else
    {
      echo '<script>alert("DATA NOT UPDATED")</script>';
    }
  }
  ?>
</body>
</html>