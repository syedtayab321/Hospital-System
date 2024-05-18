<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  include("../index/connection.php");
  $user=$_POST['email'];
  $password=$_POST['password'];
  $sel="SELECT * FROM `patient-login` WHERE `email`='$user'";
  $ex=mysqli_query($conn,$sel);
  $numm=mysqli_num_rows($ex);
  $row=mysqli_fetch_array($ex);
  if($numm>0)
  {

  if($user==$row["email"] && $password==$row["password"])
  {
    $_SESSION["username"]=$row["email"];
    echo '<script>alert("LOGIN SUCESSFULL------");</script>';
    header('location:patient-dashboard.php?message=LOGIN SUCESSFULL!');
  }
  else
  if($row["email"]!=$user)
  {
     ?>
     <script>alert("username is incorrect! try again please");</script>
     <?php
  }
  if($row["password"]!=$password)
  {
     ?>
     <script>alert("password is incorrect! try again please");</script>
     <?php
  }
}
else
{
    ?>
     <script>alert("NO DATA FOUND PLEASE REGISTER YOURSELF FIRST");</script>
     <?php  
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
                <img src="../index/images-avatar/user.png" alt="LOGO HERE" height="90px" width="90px">

                <h2 style="padding-top:15px;">PATIENT LOGIN FORM</h2>
            </div>
            <div class="form">
                <form action="" method="post">
                    <input type="email" name="email" id="email" placeholder="EMAIL HERE" required="">
                    <input type="password" name="password" id="password" placeholder="PASSWORD HERE" required="">
                    <button type="submit">LOGIN</button>
                </form>
            </div>
            <div class="textt">
                <div class="back">
                    <a href="../index.php">GO BACK</a>
                </div>
                <div class="forgot">
                    <a href="patient-registration.php">CREATE ACCOUNT</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>