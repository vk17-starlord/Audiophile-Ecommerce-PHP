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
require('checkifadmin.php');

$errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){

    $pdo= new PDO('mysql:host=localhost;port=3306;dbname=audiophile','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     $title = $_POST['title'];
     $description = $_POST['description'];
     $price = $_POST['price'];
     $category = $_POST['category'];
     $quantity=$_POST['quantity'];

     
     $stmt = $pdo->prepare("SELECT * FROM `products` WHERE 	`title`='$title'");
     $stmt->execute();
 
     if($stmt->rowCount() > 0){
         echo "<script>alert('Product with this name already exists') </script>";
     } else {


        $image=$_FILES['product_image'];
   
        $imagepath='';
   
        
        $imagepath='images/'.randomString(8).'/'.$image['name'];
        mkdir(dirname($imagepath));
        move_uploaded_file($image['tmp_name'],$imagepath);
       
        $statement=$pdo->prepare("INSERT INTO products ( title, description, image, price, category, copies) 
        VALUES(:title, :description, :image, :price, :category, :copies)");
        
        $statement->bindValue(':title',$title);
        $statement->bindValue(':image',$imagepath);   
        $statement->bindValue(':price',$price);
        $statement->bindValue(':description',$description);   
        $statement->bindValue(':category',$category);
        $statement->bindValue(':copies',$quantity);
   
        $statement->execute(); 
      echo"<script>alert('added product successfully')</script>";
      header('location:admindashboard.php');
        
    }
}

function randomString($n){
$characters ='01234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
$str='';
for($i=0;$i<$n;$i++){
  $index=rand(0,strlen($characters)-1);
  $str .= $characters[$index];

}
return $str;
}
?>

<div class="row form-container">
    <div class="col s12 l5">
        <h2> Create Product  </h2>
<form action="" method="POST"  enctype="multipart/form-data">
    <p>Product Title</p>
    <input class="browser-default" type="text" name="title" placeholder="title" required>

    
    <p>Product category</p>
    <input class="browser-default" type="text" name="category" placeholder="category" required>

    
    <p>Product image</p>
 
<div class="button-wrap">
    <label for="upload" class="new-button">Upload Image</label>
    <input class="browser-default" id="upload" name="product_image" type="file" required>
</div>



    
    <p>Product description</p>

    <textarea  name="description" placeholder="Enter Your Description" id="" cols="30" rows="10"></textarea>
    
    <p>Product price</p>
    <input class="browser-default" type="number" name="price" placeholder="price" required>

    <p>Product quantity</p>
    <input class="browser-default" type="number" name="quantity" placeholder="quantity" required>

    <button>Add Product <i class='bx bxs-layer-plus'></i></button>
</form>
    </div>
    <div class="col s12 l7 img">

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
M.AutoInit();


</script>
</body>
</html>