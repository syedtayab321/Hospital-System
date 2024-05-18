<?php
include "../../index/connection.php";
$email = $_GET["email"];
$query = "DELETE FROM `patient-login` WHERE `email` = '$email'";
$execute = mysqli_query($conn,$query);

if($execute)
{
   echo ' <script>alert ("ACCONT OF PATIENT DELETED SUCESSFULLYY!!!");</script>';
   header("location:patient-accounts.php");
}
else
{
    "try again";
}

?>