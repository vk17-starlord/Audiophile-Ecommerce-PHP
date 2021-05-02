<?php
session_start();
$admin=$_SESSION['Adminlogin'];


if(!isset($admin)){
    header('location:index.php');
}

?>