<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  include('../index/connection.php');
  $docname=$_POST['username'];
  $email=$_POST['email'];
  $doctorid=$_POST['doctor_id'];
  $password=$_POST['password'];
  $select="SELECT * FROM `doctor-login` WHERE `email`='$email'";
  $run=mysqli_query($conn,$select);
  $num=mysqli_num_rows($run);

  $select_doctor="SELECT * FROM `doctor` WHERE `doctor_id`='$doctorid'";
  $run_doctor=mysqli_query($conn,$select_doctor);
  $num_doctor=mysqli_fetch_array($run_doctor);
  if($num>0)
  {
  if($num_doctor["doctor_id"]!=0)
  {
    echo '<script>alert("SPECIAL ID YOU ENTER IS ALREADY ASSIGN TO SOMEONE ELSE PLEASE ENTER CORRECT ID")</script>';
  }
  else
  {
    echo '<script>alert("EMAIL ALREADY EXISTS")</script>';
  }
  }
  else
  {
    $special_id=$num_doctor["doctor_id"];
    $sql="INSERT INTO `doctor-login`(`username`,`email`,`doctor_id`,`password`) VALUES ('$docname','$email','$special_id','$password')";
     $result=mysqli_query($conn,$sql);
    if($result)
    {
      echo '<script>alert("DATA INSETERTED SUCESSFULLY")</script>';
      header("location:doctor-login.php");
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
    <link rel="stylesheet" href="../patient-portal/css/register.css">
    <script src="../patient-portal/patient.js"></script>
    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
</head>
<body>
<div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../index/images-avatar/profile.png" alt="REGISTRATION FORM " height="90px" width="90px" >
                <h3>REGISTRATION FORM HERE</h3>
            </div>
            <div class="form">
                <form action="" method="post" name="myforms">
                    <input type="text" name="username" id="username" class="user" placeholder="USERNAME HERE" required="" oninput="name_validation()">
                    <p class="username">*USERNAME MUST CONTAIN MORE THAN 5 LETTERS</p>

                    <input type="email" name="email" id="email" class="emails" placeholder="EMAIL HERE" required="" oninput="email_validation()">
                    <p class="email">*EMAIL MUST CONTAIN MORE THAN 10 LETTERS</p>

                    <input type="number" name="doctor_id" id="doctor_id"  placeholder="DOCTOR SPECIAL ID HERE" required="">
        
                    
                    <div class="checkbb">
                       <input type="password" name="password" id="password" class="pass" placeholder="PASSWORD HERE" required="" oninput="password_validation()" >
                       <input value="SHOW" type="button" onclick="show()">
                      </div>
                      
                    <ul id="ul" style="display:none;flex-direction:column;justify-content:center;align-items:center;">
                      <li id="capital" >PASSWORD MUST CONTAIN AN CAPITAL LETTER</li>
                      <li id="number" >PASSWORD MUST CONTAIN A NUMBER</li>
                      <li id="special" >PASSWORD MUST CONTAIN A SPECIAL CHARACTER</li>
                      <li id="letter">PASSWORD MUST CONTAIN 8-20 LETTERS</li>
                    </ul>
                    <input type="cpassword" name="cpassword" id="cpassword" class="cpass" placeholder="CONFIRM PASSWORD HERE" required="" oninput="cpassword_validation()">
                    <p class="cpassword">*PASSWORD DO NOT MATCHED</p>
                    <input type="submit" value="REGISTER" >
                </form>
            </div>
            <div class="textt">
                <div class="back">
                    <a href="doctor-login.php">GO BACK</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>