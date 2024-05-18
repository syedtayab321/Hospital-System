<?php
session_start();
if(isset($_SESSION['username']))
{
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  include('../../index/connection.php');
  $room_name=$_POST['room_name'];
  $room_no=$_POST['room_no'];
  $total=$_POST['total_beds'];
  $patients=$_POST['patients'];
  $select="SELECT * FROM `room` WHERE `room_no`='$room_no'";
  $run=mysqli_query($conn,$select);
  $num=mysqli_num_rows($run);
  $data=mysqli_fetch_array($run);
  if($num>0)
  {
    echo '<script>alert("ALREADY HAVE ONE ROOM WITH SAME ROOM NO CREATE A DIFFERENT ONE")</script>';
  }
  else
  {
    $sql="INSERT INTO `room`(`ward_name`,`room_no`,`total_beds`,`patient`) VALUES ('$room_name','$room_no','$total','$patients')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      $_SESSION["roomno"]=$room_no;
      header("location:manage-room.php");
      echo '<script>alert("DATA INSERTED SUCESSFULLY")</script>';
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
    <link rel="stylesheet" href="../../patient-portal/css/register.css">
</head>
<body>
<div class="main">
        <div class="login-form">
            <div class="heading">
                <img src="../../index/images-avatar/profile.png" alt="UPDATION FORM " height="90px" width="90px" style="margin-bottom:10px;" >
                <h1>APPOINTMENT FORM</h1>
            </div>
            <div class="form">
                <form action="" method="post" name="myforms">
                <div class="input input-1">
                <label for="room_no">ROOM NO:</label>
                <input type="number" name="room_no" id="room_no" required="" placeholder="room No here">
            </div>
              <div class="input input-4">
                <label for="room_name">WARD NAME:</label>
                <select name="room_name" id="room_name">
                  <option value="">--SELECT---</option>
                  <option value="corona ward">CORONA WARD</option>
                  <option value="cancer ward">CANCER WARD</option>
                  <option value="skin ward">SKIN WARD</option>
                  <option value="belgum ward">BELGUM WARD</option>
                  <option value="dental ward">DENTAL WARD</option>
                  <option value="child ward">CHILD WARD</option>
                  <option value="bones ward">BONE WARD</option>
                  <option value="eye ward">EYE WARD</option>
                  <option value="theropy ward">THEROPIST WARD</option>
                </select>
              </div>
              <div class="input input-5">
                <label for="total_beds">MOBILE-NUMBER:</label>
                <input type="number" name="total_beds" id="total_beds" required="" placeholder="TOTAL NO OF BEDS HERE">
              </div>
              <div class="input input-7">
                <label for="patients">PATIENTS</label>
                <select name="patients" id="patients">
                  <option value="">--SELECT---</option>
                  <option value="corona">CORONA PATIENT</option>
                  <option value="cancer">CANCER PATIENT</option>
                  <option value="skin">SKIN PATIENT</option>
                  <option value="belgum">BELGUM PATIENT</option>
                  <option value="dental">DENTAL PATIENT</option>
                  <option value="child">CHILD PATIENT</option>
                  <option value="bones">BONE PATIENT</option>
                  <option value="eye">EYE PATIENT</option>
                  <option value="theropy">THEROPIST PATIENT</option>
                </select>
              </div>
                  
                    <input type="submit" value="REGISTER"  >
                </form>
            </div>
            <div class="textt">
                <div class="back">
                    <a href="manage-room.php">GO BACK</a>
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