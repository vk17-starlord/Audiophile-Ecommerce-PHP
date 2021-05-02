<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiophile</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="./product.css">
</head>
<body>

<?php

$pdo= new PDO('mysql:host=localhost;port=3306;dbname=audiophile','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$id=$_GET['id'] ?? null;
if(isset($id)){
    
$stmt=$pdo->query("SELECT * FROM `products` WHERE `id`='$id'");
$CurrentProduct = $stmt->fetch();
// var_dump($CurrentProduct);
}
?>
<div class="product-detail-container">
<div class="container">

<div class="product-card row">

<div class="col s12 l5 m7 img" style="background-image:url('<?php echo $CurrentProduct['image'] ?>')">
</div>
<div class="col s12 l7 m5">
    <h2><?php echo $CurrentProduct['title'] ?> <br>    <span><?php echo $CurrentProduct['category'] ?></span>
 </h2>

<p><?php echo $CurrentProduct['description'] ?></p>
    <p id="price"> <?php echo $CurrentProduct['price'] ?></p>

    <p>Qty <input type="number" maxlength="10" min="1" max="<?php echo $CurrentProduct['copies'] ?>" value="1"> </p>
    <div style="width:80%">

    <button data-target="slide-out" class="sidenav-trigger ">Add to Cart <i class='bx bxs-cart-alt'></i></button> 
    </div>
</div>


</div>

    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
M.AutoInit();
</script>
</body>
</html>