<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  include('../index/connection.php');
  $patname=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];
  $select="SELECT * FROM `patient-login` WHERE `email`='$email'";
  $run=mysqli_query($conn,$select);
  $num=mysqli_num_rows($run);
  $row=mysqli_fetch_array($run);


  
  if($num>0)
  {
    echo '<script>alert("DATA ALREADY EXISTS")</script>';
  }
  else
  if($row["username"]===$patname)
  {
    echo '<script>alert("USERNAME IS NOT VALID TRY DIFFERENT ONE")</script>';
  }
  else
  if($row["password"]===$password)
  {
    echo '<script>alert("USERNAME IS NOT VALID TRY DIFFERENT ONE")</script>';
  }
  else if($password!=$cpassword)
  {
    echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
  }
  else
  {
    $sql="INSERT INTO `patient-login`(`username`,`email`,`password`) VALUES ('$patname','$email','$password')";
     $result=mysqli_query($conn,$sql);
    if($result)
    {
      echo '<script>alert("DATA INSETERTED SUCESSFULLY")</script>';
      header("location:patient-login.php");
    }
    else
    {
      echo '<script>alert("DATA NOT INSETERTED")</script>';
    }
  }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <script src="patient.js"></script>
    <script src="../admin-portal/jquery/jquery-3.6.4.min.js"></script>
    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
    <style>
.main .login-form .form form .checkbb input[type=checkbox]
{
    font-size:15px;
    cursor:pointer;
    padding:4px;
    border-radius: 10px;
    width:20px;
    
}
    </style>
</head>
<body>
<body>
    <div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../index/images-avatar/profile.png" alt="REGISTRATION FORM " height="90px" width="90px" >
                <h1>REGISTRATION FORM HERE</h1>
            </div>
            <div class="form" >
                <form action="" method="post" name="myforms">
                    <input type="text" name="username" id="username" class="user" placeholder="USERNAME HERE" required="" oninput="name_validation()">
                    <p class="username">*USERNAME MUST CONTAIN MORE THAN 5 LETTERS AND NUMBERS</p>

                    <input type="email" name="email" id="email" class="emails" placeholder="EMAIL HERE" required="" oninput="email_validation()">
                    <p class="email">*EMAIL MUST CONTAIN MORE THAN 10 LETTERS</p>
                    
                     <div class="checkbb">
                       <input type="password" name="password" id="password" class="pass" placeholder="PASSWORD HERE" required="" oninput="password_validation()" >
                       <input value="SHOW" type="checkbox" onclick="show()">
                      <ul id="ul" style="display:none;flex-direction:column;justify-content:center;align-items:center;">
                      <li id="capital" >PASSWORD MUST CONTAIN AN CAPITAL LETTER</li>
                      <li id="number" >PASSWORD MUST CONTAIN A NUMBER</li>
                      <li id="special" >PASSWORD MUST CONTAIN A SPECIAL CHARACTER</li>
                      <li id="letter">PASSWORD MUST CONTAIN 8-20 LETTERS</li>
                    </ul>
                    <input type="text" name="cpassword" id="cpassword" class="cpass" placeholder="CONFIRM PASSWORD HERE" required="" oninput="cpassword_validation()">
                    <p class="cpassword">*PASSWORD DONOT MATCHED</p>
              
                       <input type="submit" value="REGISTER"  >
                </form>
            </div>
            <div class="textt">
                <div class="back">
                    <a href="patient-login.php">GO BACK</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>