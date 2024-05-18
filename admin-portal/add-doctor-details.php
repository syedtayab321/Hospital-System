<?php
session_start();
if(isset($_SESSION['username']))
{
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  include('../index/connection.php');
  $dname=$_POST['doctorname'];
  $specilist=$_POST['specilist'];
  $doctorid=$_POST['doctor_id'];
  $mobile=$_POST['mobile'];
  $address=$_POST['address'];
  $gender=$_POST['gender'];
  $select="SELECT * FROM `doctor` WHERE `doctor_id`='$doctorid'";
  $run=mysqli_query($conn,$select);
  $num=mysqli_num_rows($run);
  $data=mysqli_fetch_array($run);

  if($num>0)
  {
    echo '<script>alert("LREADY HAVE ONE DOCTOR IN THIS FIELD YOU CANNOT ADD 2 DOCTOR OF ONE FIELD AT A TIME")</script>';
  }
  else
  {
    $sql="INSERT INTO `doctor`(`doctorname`,`specilist`,`doctor_id`,  `mobile`,`address`,`gender`) VALUES ('$dname','$specilist','$doctorid','$mobile','$address','$gender')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      echo '<script>alert("DATA INSERTED SUCESSFULLY")</script>';
      header("location:manage-doctor.php");
    }
    else
    {
      echo'<script>alert("DATA NOT INSERTED!!!!!!")</script>';
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
    <title>HOSPITAL MANAGMENT SYSTEM</title>
    <link rel="stylesheet" href="../patient-portal/css/register.css">
    <script src="../admin-portal/validation-js/doctor-update.js"></script>
</head>
<body>
<div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../index/images-avatar/profile.png" alt="UPDATION FORM " height="90px" width="90px" style="margin-bottom:10px;" >
                <h1>ADD DOCTOR DETAILS </h1>
            </div>
            <div class="form">
                <form action="" method="post" name="myforms">
                <div class="input input-1">
                <label for="doctorname">DOCTOR NAME:</label>
                <input type="text" name="doctorname" id="doctorname" required="" placeholder="doctor Name here" oninput="name_validation()">
                <p class="username">*DOCTOR NAME MUST CONTAIN 7-15 LETTERS</p>
                <p class="username1">*DOCTOR NAME CANNOT CONTAIN NUMBERS</p>
            </div>
              <div class="input input-4">
                <label for="specilist">SPECILIST:</label>
                <select name="specilist" id="specilist">
                  <option value="">--SELECT---</option>
                  <option value="corona">CORONA SPECILIST</option>
                  <option value="cancer">CANCER SPECILIST</option>
                  <option value="skin">SKIN SPECILIST</option>
                  <option value="belgum">BELGUM SPECILIST</option>
                  <option value="dental">DENTIST</option>
                  <option value="child">CHILD SPECILIST</option>
                  <option value="bones">BONE SPECILIST</option>
                  <option value="eye">EYE SPECILIST</option>
                  <option value="theropy">THEROPIST</option>
                </select>
              </div>
              <div class="input input-5">
                <label for="mobile">MOBILE-NUMBER:</label>
                <input type="text" name="mobile" id="mobile" required="" placeholder="MOBILE NO HERE" oninput="mobile_validation()">
                <p class="text">*MOBILE MUST CONTAIN  11 NUMBERS AND NO LETTERS OR SPECIAL CHARACTERS</p>
              <p class="text2">*MOBILE NUMBER IS INVALID</p>
              </div>
              <div class="input input-6">
                  <label for="address">ADDRESS:</label>
                  <input type="text" name="address" id="address" required="" placeholder="ADDRESS HERE">
              </div>

              <div class="input input-6">
                  <label for="doctor_id">ADDRESS:</label>
                  <input type="number" name="doctor_id" id="doctor_id" required="" placeholder="doctor_id HERE">
              </div>
              <div class="input input-7">
                <label for="gender">GENDER:</label>
                <select name="gender" id="gender">
                  <option value="">--SELECT---</option>
                  <option value="male">MALE</option>
                  <option value="female">FEMALE</option>
                </select>
              </div>
                    <input type="submit" value="REGISTER"  >
                </form>
            </div>
            <div class="textt">
                <div class="back">
                    <a href="manage-doctor.php">GO BACK</a>
                </div>
            </div>
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