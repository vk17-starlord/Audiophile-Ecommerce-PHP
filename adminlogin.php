<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiophile</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="./login.css">
</head>
<body>
<?php
require('adminconnection.php')
?>
    <div class="form-container row">
    <div class="col s12 l5 m5">
    <form action="" method="POST">
    <h1>Login</h1>
    <p>Enter Your Username</p>
    <input class="browser-default" type="text" name="Username" placeholder="user123">
    <p>Enter Your Password</p>
    <input class="browser-default" type="text" name="Password" placeholder="user@23432">
<br>
    <button type="submit " name="login">Login</button>
    </form>
    </div>
    <div class="col s12 l7 m7 img"></div>

    </div>
    <?php

if(isset($_POST['login']))
{
    $Username=$_POST['Username'];
    $Password=$_POST['Password'];

$query = "SELECT * FROM `admin` WHERE `Username`='$Username' AND `Password`='$Password'" ;

$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)==1){
session_start();

$_SESSION['Adminlogin']=$Username;
header('location:admindashboard.php');
}else{
echo "<script> alert('invalid username or password') ; </script>";
}

}else{
}    
    ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
M.AutoInit();
</script>
</body>
</html>