<?php
  include('../index/connection.php');
  $id=$_GET["id"];
  $select="SELECT * FROM `patient` WHERE `id`='$id'";
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
    <link rel="stylesheet" href="../patient-portal/css/register.css">
      <script src="validation-js/patient-update.js"></script>
    <title>HOSPITAL MANAGMENT SYSTEM(HMS)</title>
</head>
<body>
<div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../index/images-avatar/profile.png" alt="UPDATION FORM " height="90px" width="90px" style="margin-bottom:10px;" >
                <h1>PATIENT UPDATION FORM</h1>
            </div>
            <div class="form">
                <form action="" method="post" name="myforms">
<!---PATIENT NAME SECTION STARTS HERE--->
                   <label for="patientname">PATIENT NAME:</label>
                    <input type="text" name="patientname" id="patientname" value="<?php echo $row["patientname"] ?>" class="user" placeholder="PATIENT NAME HERE" required="" oninput="name_validation()">
                    <p class="username">*PATIENT NAME MUST CONTAIN 7-15 LETTERS</p>
                    <p class="username1">*PATIENT NAME CANNOT CONTAIN NUMBERS</p>

<!---DIEASES SELECTION STARTS HERE-->
                    <?php
                    $check="SELECT * FROM `doctor`";
                    $wee=mysqli_query($conn,$check);
                   ?>
                <label for="dieases">DIEASES:</label>
                <select name="dieases" id="dieases">
                  <?php
                while($rows=mysqli_fetch_array($wee))
                {
                ?>
                  <option value="<?php echo $rows["specilist"];?>"><?php echo $rows["specilist"];?> patient</option>
                <?php
                 }
                ?>
                </select>
<!---MOBILE NUMBER SELECTION STARTS HERE-->
                <label for="mobile">MOBILE NUMBER:</label>
              <input type="text" name="mobile" id="mobile"  value="<?php echo $row["mobile"] ?>" class="mobile" placeholder="MOBILE NUMBER HERE" required="" oninput="mobile_validation()">
              <p class="text">*MOBILE MUST CONTAIN  11 NUMBERS AND NO LETTERS OR SPECIAL CHARACTERS</p>
              <p class="text2">*MOBILE NUMBER IS INVALID</p>
<!--GENDER SELECTION STARTS HERE-->
                <label for="gender">GENDER:</label>
                <select name="gender" id="gender">
                  <?php if($row["gender"]=="male") 
                  {
                    ?>
                  <option value="male">MALE</option>
                  <option value="female">FEMALE</option>
                  <?php 
                  }else
                  {
                  ?>
                  <option value="female">FEMALE</option>
                  <option value="male">MALE</option>
                  <?php } ?>
                </select>
<!--ADDRESS SELECTION STARTS HERE--->
                <label for="address">ADDRESS:</label>
                    <input type="text" name="address" id="address"  value="<?php echo $row["address"] ?>" class="cpass" placeholder="ADDRESS HERE" required="">
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
<!-- PHP CODING STARTS HERE---->
      <?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $patname=$_POST['patientname'];
    $email=$_POST['email'];
    $dieases=$_POST['dieases'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $sql=" UPDATE `patient` SET `patientname`='$patname',`email`='$email',`dieases`='$dieases',`mobile`='$mobile',`address`='$address',`gender`='$gender' WHERE `id`='$id'";
     $result=mysqli_query($conn,$sql);
    if($result)
    {
      echo '<script>alert("DATA UPDATED SUCESSFULLY")</script>';
      header('location:manage-patient.php?');
    }
    else
    {
      echo '<script>alert("DATA NOT UPDATED")</script>';
    }
  }
  ?>
</body>
</html>