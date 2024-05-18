<?php
session_start();
if(isset($_SESSION['username']))
{
  include('../index/connection.php');
  $email=$_SESSION['username'];
  if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  $patname=$_POST['patientname'];
  $dieases=$_POST['dieases'];
  $mobile=$_POST['mobile'];
  $address=$_POST['address'];
  $gender=$_POST['gender'];
  $email=$_SESSION['username'];
  //to check patient already exits in this dieases or not
  $select="SELECT * FROM `patient` WHERE `dieases`='$dieases'";
  $run=mysqli_query($conn,$select);
  $num=mysqli_num_rows($run);
  $row=mysqli_fetch_array($run);
  //to select values of the doctor
  $doctor_select="SELECT * FROM `doctor` WHERE `specilist`='$dieases'";
  $doctor_run=mysqli_query($conn,$doctor_select);
  $doctor_num=mysqli_num_rows($doctor_run);
  $doctor_row=mysqli_fetch_array($doctor_run);
  //to select room 
  $room_select="SELECT * FROM `room` WHERE `patient`='$dieases'";
  $room_run=mysqli_query($conn,$room_select);
  $room_num=mysqli_num_rows($room_run);
  $room_row=mysqli_fetch_array($room_run);
  if($num>0)
  {
    echo '<script>alert("DATA ALREADY EXISTS FOR THIS DIEASES")</script>';
  }
  else if($doctor_num==0)
  {
    echo '<script>alert("DOCTOR IS NOT AVAILAIBLE")</script>';
  }
  else
  if($room_num==0)
  {
    echo '<script>alert("ROOM IS NOT AVAILAIBLE")</script>';
  }
  else
  { 
    $doctor_id=$doctor_row["doctor_id"];
    $ward_id=$room_row["ward_id"];
    $sql="INSERT INTO `patient`(`patientname`,`email`,`dieases`,`mobile`,`address`,`gender`,`doctor_id`,`ward_id`) VALUES ('$patname','$email','$dieases','$mobile','$address','$gender','$doctor_id','$ward_id')";
     $result=mysqli_query($conn,$sql);
    if($result)
    {
     
      echo '<script>alert("DATA INSETERTED SUCESSFULLY")</script>';
      header("location:manage-patient.php");
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
    <script src="validation-js/patient-update.js"></script>
    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
</head>
<body>
<div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../index/images-avatar/profile.png" alt="REGISTRATION FORM " height="90px" width="90px" style="margin-bottom:10px;" >
                <h1>ADD PATIENTS</h1>
            </div>
            <div class="form">
                <form action="" method="post" name="myforms">
                <label for="patientname">PATIENT NAME:</label>
                    <input type="text" name="patientname" id="patientname" class="user" placeholder="PATIENT NAME HERE" required="" oninput="name_validation()">
                    <p class="username">*PATIENT NAME MUST CONTAIN MORE THAN 5 LETTERS AND NO NUMBERS</p>
                    <p class="username1">*PATIENT NAME CANNOT CONTAIN NUMBERS</p>

                    <div class="input input-4">
                <label for="dieases">DIEASES:</label>
                <select name="dieases" id="dieases">
                  <option value="">--SELECT DIEASES---</option>
                  <option value="corona">CORONA </option>
                  <option value="cancer">CANCER </option>
                  <option value="skin">SKIN </option>
                  <option value="belgum">BELGUM </option>
                  <option value="dental">DENTIST</option>
                  <option value="child">CHILD </option>
                  <option value="bones">BONE </option>
                  <option value="eye">EYE </option>
                  <option value="theropy">THEROPY</option>
                </select>
              </div>

              <label for="mobile">MOBILE:</label>
              <input type="text" name="mobile" id="mobile" class="mobile" placeholder="MOBILE NUMBER HERE" required="" oninput="mobile_validation()">
              <p class="text">*MOBILE MUST CONTAIN  11 NUMBERS AND NO LETTERS OR SPECIAL CHARACTERS</p>
              <p class="text2">*MOBILE NUMBER IS INVALID</p>

                <label for="gender">GENDER:</label>
                <select name="gender" id="gender">
                  <option value="">--SELECT---</option>
                  <option value="male">MALE</option>
                  <option value="female">FEMALE</option>
                </select>

                <label for="address">ADDRESS:</label>
                    <input type="text" name="address" id="address" class="cpass" placeholder="ADDRESS HERE" required="">
                    <input type="submit" value="REGISTER"  >
                </form>
            </div>
            <div class="textt">
                <div class="back">
                    <a href="manage-patient.php">GO BACK</a>
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