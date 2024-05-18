<?php
  include('../index/connection.php');
  $id=$_GET['id'];
  $select="SELECT * FROM `doctor` WHERE `doctor_id`='$id'";
  $run=mysqli_query($conn,$select);
  $data=mysqli_fetch_array($run);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSPITAL MANAGMENT SYSTEM</title>
    <link rel="stylesheet" href="../patient-portal/css/register.css">
    <script src="validation-js/doctor-update.js"></script>
</head>
<body>

<div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../index/images-avatar/profile.png" alt="UPDATION FORM " height="90px" width="90px" style="margin-bottom:10px;" >
                <h1 style="margin:10px 0px 10px 0px;">DOCTOR UPDATE DATA FORM</h1>
            </div>
    <!---FORM STARTS HERE--->
            <div class="form">
                <form action="" method="post" name="myforms">

    <!--DOCTOR NAME SELECTION STARTS HERE--->
                <div class="input input-1">
                <label for="doctorname">DOCTOR NAME:</label>
                <input value="<?php echo $data['doctorname']?>"  type="text" name="doctorname" id="doctorname" required="" placeholder="doctor Name here" oninput="name_validation()">
                <p class="username">*DOCTOR NAME MUST CONTAIN 7-15 LETTERS</p>
                    <p class="username1">*DOCTOR NAME CANNOT CONTAIN NUMBERS</p>
            </div>
      <!--DOCTOR SPECILIZATION SELECTION STARTS HERE--->
              <div class="input input-4">
                <label for="specilist">SPECILIST:</label>
                <select  name="specilist" id="specilist">
                  <option value="<?php echo $data['specilist'];?>"><?php echo $data['specilist'];?></option>
                  <option value="corona">CORONA SPECILIST</option>
                  <option value="cancer">CANCER SPECILIST</option>
                  <option value="skin">SKIN SPECILIST</option>
                  <option value="belgum">BELGUM SPECILIST</option>
                  <option value="dentist">DENTIST</option>
                  <option value="child">CHILD SPECILIST</option>
                  <option value="bones">BONE SPECILIST</option>
                  <option value="cancer">SURGICAL SPECILIST</option>
                  <option value="theropist">THEROPIST</option>
                </select>
              </div>
    <!--DOCTOR MOBILE NUMBER SELECTION STARTS HERE--->
              <div class="input input-5">
                <label for="mobile">MOBILE-NUMBER:</label>
                <input value="<?php echo $data['mobile'] ?>"  type="text" name="mobile" id="mobile" required="" placeholder="MOBILE NO HERE" oninput="mobile_validation()">
                <p class="text">*MOBILE MUST CONTAIN  11 NUMBERS AND NO LETTERS OR SPECIAL CHARACTERS</p>
              <p class="text2">*MOBILE NUMBER IS INVALID</p>
              </div>

  <!--DOCTOR ADDRESS SELECTION STARTS HERE--->
                 <div class="input input-6">
                  <label for="address">ADDRESS:</label>
                  <input value="<?php echo $data['address'] ?>"  type="text" name="address" id="address" required="" placeholder="ADDRESS HERE">
                  </div>

  <!--DOCTOR SPECIAL ID SELECTION STARTS HERE--->
                 <div class="input input-6">
                  <label for="doctor_id">ADDRESS:</label>
                  <input value="<?php echo $data['doctor_id'] ?>"  type="number" name="doctor_id" id="doctor_id" required="" placeholder="DOCTOR ID HERE">
                  </div>

    <!--DOCTOR GENDER SELECTION STARTS HERE--->
              <div class="input input-7">
                <label for="gender">GENDER:</label>
                <select   name="gender" id="gender">
                <?php if($data["gender"]=="male") 
                  {
                    ?>
                  <option value="male">MALE</option>
                  <option value="female">FEMALE</option>
                  <?php 
                  }
                  else
                  {
                  ?>
                  <option value="female">FEMALE</option>
                  <option value="male">MALE</option>
                  <?php } ?>
                </select>
              </div>
              <input type="submit" value="UPDATE">
                </form>

            </div>  <!--FORM DIV ENDS  HERE--->

            <div class="textt">
                <div class="back">
                    <a href="manage-doctor.php">GO BACK</a>
                </div>
            </div>
        </div>
</div>

      <!--PHP CODING STARTS HERE-->
      <?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $dname=$_POST['doctorname'];
        $specilist=$_POST['specilist'];
        $doctorid=$_POST['doctor_id'];
        $mobile=$_POST['mobile'];
        $address=$_POST['address'];
        $gender=$_POST['gender'];;
        $sql=" UPDATE `doctor` SET `doctorname`='$dname',`specilist`='$specilist',`doctor_id`='$doctorid',`mobile`='$mobile',`address`='$address',`gender`='$gender' WHERE `doctor_id`='$id'";
     $result=mysqli_query($conn,$sql);
    if($result)
    {
      echo '<script>alert("DATA UPDATED SUCESSFULLY")</script>';
      
    }
    else
    {
      echo '<script>alert("DATA NOT UPDATED")</script>';
    }
  }
  ?>
</body>
</html>