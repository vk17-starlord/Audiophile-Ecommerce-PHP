<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiophile</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="./dashboard.css">
</head>
<body>
<?php
require('adminconnection.php');
require('checkifadmin.php');
if(isset($_POST['logout'])){
    session_destroy();
    header('location:index.php');
}
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=audiophile','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare( "SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll();



?>

<div class="row mainrow">
    <div class="col s12 l2 m5 dash">
        <h2 class="brand-logo">audiophile</h2>

        <ul class="links">

<li><a href=""><i class='bx bxs-dashboard'></i> Dashboard</a></li>
<li><a href="./createproduct.php"><i class='bx bxs-layer-plus' ></i> Add Product</a></li>
<li><form action="" method="POST">
<button  name="logout" ><i class='bx bx-log-out-circle' ></i> Logout</button>
</form></li>
     
</ul>
    </div>
    <div class="col s12 l2 m5 ">
   
    </div>
    <div class="col s12 l10 m7 main-container">
    
    <div class="row main-row">
    <?php foreach ($products as $i=> $product):?>
    <div class="col s12 l4 m4">
    <div class="p-card">
        <div class="img">
        <img src="<?php echo $product['image'] ?>" alt="">
        </div>
    <h2><?php echo $product['title'] ?></h2>
    <p><span>Price : <?php echo $product['price'] ?> ₹</span></p>
    <div class="btn-container" style="width:80%;">
    <a href="./edit.php?id=<?php echo $product['id'] ?>" class="waves-effect  indigo darken-1 waves-light btn"><i class='bx bxs-edit-alt'></i> Edit </a>
    <a href="./delete.php?id=<?php echo $product['id'] ?>" class=" indigo darken-1 waves-effect waves-light btn"><i class='bx bxs-trash-alt' ></i> Delete  </a>

    </div>
    </div>
    </div>
    <?php endforeach ?>

</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
M.AutoInit();


</script>
</body>
</html>