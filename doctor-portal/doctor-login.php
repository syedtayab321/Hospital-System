<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  include("../index/connection.php");
  $email=$_POST['email'];
  $password=$_POST['password'];
  $sel="SELECT * FROM `doctor-login` WHERE `email`='$email'";
  $ex=mysqli_query($conn,$sel);
  $num=mysqli_num_rows($ex);
  $row=mysqli_fetch_array($ex);
  if($num>0)
  {
  if($email==$row["email"] && $row["password"]==$password)
  {
    $_SESSION["doctor_id"]=$row["doctor_id"];
    echo '  <script>alert("LOGIN SUCESSFULL------");</script>';
    header('location:doctor-dashboard.php?message=LOGIN SUCESSFULL!');
  }
  else
  if($row["email"]!=$email)
  {
     
   echo '<script>alert("username is incorrect! try again please");</script>';
     
  }
  if($row["email"]!=$password)
  {
    echo '<script>alert("PASSWORD is incorrect! try again please");</script>';
  }
}
else
{
    echo '<script>alert("INVALID DATA");</script>';
}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
    <link rel="stylesheet" href="../bootsrap/css/bootstrap.min.css">
    <script src="../bootsrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../admin-portal/admin-css/login.css">
</head>
<body>
<div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../index/images-avatar/profile.png" alt="LOGO HERE" height="90px" width="90px">

                <h2 style="padding-top:15px;">DOCTOR LOGIN FORM</h2>
            </div>
            <div class="form">
                <form action="" method="post">
                    <input type="email" name="email" id="email" placeholder="EMAIL HERE">
                    <input type="password" name="password" id="password" placeholder="PASSWORD HERE">
                    <button type="submit">LOGIN</button>
                </form>
            </div>
            <div class="textt">
                <div class="back">
                    <a href="../index.php">GO BACK</a>
                </div>
                <div class="forgot">
                    <a href="doctor-registration.php">CREATE ACCOUNT</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>