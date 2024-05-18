<?php
session_start();
if(isset($_SESSION['username']))
{
    session_unset();
    session_destroy();
    ?><script>alert("LOGOUT SUCESSFULL");</script><?php
    header('location:../index.php?message=logout sucessfully!');
}
else
if(isset($_SESSION['doctor_id']))
{
    session_unset();
    session_destroy();
    ?><script>alert("LOGOUT SUCESSFULL");</script><?php
    header('location:../index.php?message=logout sucessfully!');
}
?>