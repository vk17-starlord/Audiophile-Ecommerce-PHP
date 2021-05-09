<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiophile</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="./form.css">
</head>
<body>
<?php
require('adminconnection.php');
require('checkifadmin.php');
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=audiophile','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$id=$_GET['id'] ?? null;
function randomString($n){
    $characters ='01234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $str='';
    for($i=0;$i<$n;$i++){
      $index=rand(0,strlen($characters)-1);
      $str .= $characters[$index];
    
    }
    return $str;
    }

if(isset($id)){
    
$stmt=$pdo->query("SELECT * FROM `products` WHERE `id`='$id'");
$product = $stmt->fetch();
if(!$product){
    header('location:index.php');
}
   
}else{
    header('location:index.php');
}


if($_SERVER['REQUEST_METHOD']==='POST'){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category=$_POST['category'];
    $copies=$_POST['quantity'];

    $image=$_FILES['product_image'] ??  null;
    $imagepath=$product['image'];
 

  
    if($image && $image['tmp_name']){
      if($product['image']){
          unlink($product['image']);
      }
      $imagepath='images/'.randomString(8).'/'.$image['name'];
           mkdir(dirname($imagepath));
      move_uploaded_file($image['tmp_name'],$imagepath);
    }
    

  
    $data = [
        'title' => $title,
        'description' => $description,
        'image' => $imagepath,
        'price' => $price,
        'copies' => $copies,
        'category' => $category,
        'id' => $id,

    ];
    $sql = "UPDATE products SET title=:title, description=:description, image=:image ,price=:price ,category=:category , copies=:copies  WHERE id=:id";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);    
 
    header('Location:admindashboard.php'); 
}

?>
<div class="row form-container">
    <div class="col s12 l5">
        <h2> Update Product  </h2>
<form action="" method="POST"  enctype="multipart/form-data">
    <p>Product Title</p>
    <input class="browser-default" value="<?php echo $product['title'] ?>" type="text" name="title" placeholder="title" >

    
    <p>Product category</p>
    <input class="browser-default" value="<?php echo $product['category'] ?>" type="text" name="category" placeholder="category" >

    
    <p>Product image</p>
<div class="button-wrap">
    <label for="upload" class="new-button">Upload Image</label>
    <input  class="browser-default" id="upload" name="product_image" type="file" >
</div>



    
    <p>Product description</p>

    <textarea   name="description" placeholder="Enter Your Description" id="" cols="30" rows="20">
    <?php echo $product['description'] ?></textarea>
    
    <p>Product price</p>
    <input value="<?php echo $product['price'] ?>" class="browser-default" type="number" name="price" placeholder="price" >

    <p>Product quantity</p>
    <input value="<?php echo $product['copies'] ?>" class="browser-default" type="number" name="quantity" placeholder="quantity" >

    <button type="submit">Add Product <i class='bx bxs-layer-plus'></i></button>
</form>
    </div>
    <div class="col s12 l7 img" style="background-position:center;background-size:cover;background-image:url('<?php echo $product['image'] ?>')!important;">

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
M.AutoInit();


</script>
</body>
</html>