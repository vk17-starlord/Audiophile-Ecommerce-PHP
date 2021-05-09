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
    
    <table>
        <thead>
          <tr>
              <th>Image</th>
              <th> Name</th>
              <th> Category</th>
              <th> Description</th>
              <th> Quantity</th>
              <th> Price</th>

          </tr>
        </thead>
        <?php foreach ($products as $i=> $product):?>
            <tr>
            <td><img class="materialboxed" src="<?php echo $product['image'] ?>" alt=""></td>
            <td><div class="title"><?php echo $product['title'] ?> </div></td>
            <td><div class="category"><p><?php echo $product['category'] ?></p> </div></td>
            <td><div class="desc"><p><?php echo substr($product['description'],0,100) ?></p> </div></td>
            <td><div><span class="new indigo darken-3 badge" data-badge-caption=""><?php echo $product['copies'] ?></span> </div></td>
            <td><div><?php echo '₹'.$product['price'] ?> </div></td>
<td><div> <a class="waves-effect orange darken-1 waves-light  z-depth-0 btn" href="./edit.php?id=<?php echo $product['id'] ?>">Edit</a></div></td>
<td><div> <a class="waves-effect red darken-1 waves-light  z-depth-0 btn" href="./delete.php?id=<?php echo $product['id'] ?>">Delete</a></div></td>

</tr>
    <?php endforeach ?>

        <tbody>
          
        </tbody>
      </table>
  

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
M.AutoInit();


</script>
</body>
</html>