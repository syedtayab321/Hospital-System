<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  include("../index/connection.php");
  $username="admin123";
  $pass="root";
  $user=$_POST['username'];
  $password=$_POST['password'];
  if($username==$user && $password==$pass)
  {
    $_SESSION["username"]=$username;
    header('location:dashboard.php?message=LOGIN SUCESSFULL!');
    ?>
     <script>alert("LOGIN SUCESSFULL------");</script>
     <?php
  }
  else
  if($username!=$user)
  {
     ?>
     <script>
        alert("USERNAME YOU ENTER IS INNCORECT");
     </script>
     <?php
  }
  if($pass!=$password)
  {
     ?>
     <script>alert("password is incorrect! try again please");</script>
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
    <script src="jquery/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="admin-css/login.css">
</head>
<body>
<div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../index/images-avatar/profile.png" alt="LOGO HERE" height="90px" width="90px">

                <h2 style="padding-top:15px;">ADMIN LOGIN FORM</h2>
            </div>
            <div class="form">
                <form action="" method="post">
                    <input type="text" name="username" id="username" placeholder="USERNAME HERE" required="">
                    <input type="password" name="password" id="password" placeholder="PASSWORD HERE" required="">
                    <button type="submit">LOGIN</button>
                </form>
            </div>
            <div class="textt">
                <div class="back">
                    <a href="../index.php">GO BACK</a>
                </div>
            </div>
        </div>
    </div>
     
</body>
</html>