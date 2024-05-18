<?php
include "../../index/connection.php";
$id = $_GET["id"];
$query = "DELETE FROM `room` WHERE `ward_id` = '$id'";
$execute = mysqli_query($conn,$query);

if($execute)
{
    header("location:manage-room.php");
}
else
{
    "try again";
}

?>