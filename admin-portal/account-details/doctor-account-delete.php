<?php
include "../../index/connection.php";
$email = $_GET["email"];
$query = "DELETE FROM `doctor-login` WHERE `email` = '$email'";
$execute = mysqli_query($conn,$query);

if($execute)
{
   echo ' <script>alert ("ACCONT OF DOCTOR DELETED SUCESSFULLYY!!!");</script>';
   header("location:doctor-account.php");
}
else
{
    "try again";
}

?>