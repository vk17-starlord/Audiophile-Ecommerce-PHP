<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiophile</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="./Shop.css">
</head>
<body>
<?php

$pdo= new PDO('mysql:host=localhost;port=3306;dbname=audiophile','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$category=$_GET['category']??null;
$stmt = $pdo->prepare( "SELECT * FROM products WHERE `category`='$category'");

$stmt->execute();
$products = $stmt->fetchAll();
?>
<?php require('header.php') ?>
   <div class="shop-container row">
   <?php foreach ($products as $i=> $product):?>
     <div class="col l4 m4 s12">
<div class="inner-card">
<img class="materialboxed" src="<?php echo $product['image'] ?>" alt="">

<h2 class="title"><?php echo $product['title'] ?></h2>
<h4>Price : <span><?php echo $product['price'] ?></span>
<a class="waves-effect waves-light btn indigo darken-3" href="./detail.php?id=<?php echo $product['id'] ?>">View </a></h4>
</div>
     </div>
     <?php endforeach ?>
   </div> 

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
M.AutoInit();
</script>
</body>
</html>