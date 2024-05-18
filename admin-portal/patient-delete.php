<?php
include "../index/connection.php";
$id = $_GET["id"];
$query = "DELETE FROM `patient` WHERE `id` = '$id'";
$execute = mysqli_query($conn,$query);

if($execute)
{
    header("location:manage-patient.php");
}
else
{
    "try again";
}

?>