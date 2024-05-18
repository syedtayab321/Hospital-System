<?php
include "../../connection.php";
$id = $_GET["id"];
$query = "DELETE FROM `doctor` WHERE `id` = '$id'";
$execute = mysqli_query($conn,$query);
if($execute)
{
    header("location:manage-doctor.php");
}
else
{
    "try again";
}
?>