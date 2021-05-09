<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiophile</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="./main.css">
</head>
<body>

<?php

$pdo= new PDO('mysql:host=localhost;port=3306;dbname=audiophile','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$stmt=$pdo->query("SELECT * FROM `products` WHERE `title`='XX99 MARK II HEADPHONES'");
$MarkHeadphone = $stmt->fetch();

$stmt=$pdo->query("SELECT * FROM `products` WHERE `title`='ZX9 Speaker'");
$ZX9Speaker= $stmt->fetch();

$stmt=$pdo->query("SELECT * FROM `products` WHERE `title`='Z x speaker'");
$ZXSpeaker= $stmt->fetch();

$stmt=$pdo->query("SELECT * FROM `products` WHERE `title`='YX1 Speaker'");
$YX1Speaker= $stmt->fetch();

?>
    
<div class="hero">
<div class="container">
<nav class="transparent z-depth-0">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">audiophile</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger">
      <i class='bx bx-menu-alt-left'></i>
      </a>
      <ul class="right hide-on-med-and-down">
        <li><a id="home-section" >Home</a></li>
        <li><a id="headphones-section" >Headphones</a></li>
        <li><a id="speakers-section" >Speakers</a></li>
        <li><a id="earphones-section" >Earphones</a></li>
        <li><a href="./cart.php"><i class='bx bxs-cart-alt'></i></a></li>
     <li><a href="./adminlogin.php"><i class='bx bxs-user'></i></a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">

  <li><a id="home-section" >Home</a></li>
        <li><a id="headphones-section" >Headphones</a></li>
        <li><a id="speakers-section" >Speakers</a></li>
        <li><a id="earphones-section" >Earphones</a></li>
        <li><a href="./cart.php"><i class='bx bxs-cart-alt'></i></a></li>
     <li><a href="./adminlogin.php"><i class='bx bxs-user'></i></a></li>
     </ul>


  <div class="row">
  <div class="col s12 m12 l6" id="hero-txt">
  <span>NEW PRODUCT</span>
  <h1 class="heading">
<?php   echo $MarkHeadphone['title'];
?>
  </h1>
<p><?php   echo $MarkHeadphone['description'];
?></p>
 <a href="./detail.php?id=<?php   echo $MarkHeadphone['id'];
?>">
  <button class="cta-button">SEE PRODUCT <i class='bx bx-caret-right'></i></button>
 </a>
  </div>
  <div class="col s12 m12 l6" id="hero-img">
  </div>

  </div>
</div>
</div>



<!-- product cards section -->
<div class="container">
<div class="product-container row">
<div class="col s12 m6 l4">
<div class="p-card">
<img src="./static/earphones.png" alt="">
<h2>EARPHONES</h2>
<a href="./products.php?category=earphones">shop <i class='bx bx-chevron-right'></i></a>
</div>
</div>
<div class="col s12 m6 l4">
<div class="p-card">
<img src="./static/headphone1.png" alt="">
<h2>HEADPHONES</h2>
<a href="./products.php?category=headphones">shop <i class='bx bx-chevron-right'></i></a>
</div>
</div>
<div class="col s12 m6 l4">
<div class="p-card">
<img src="./static/speaker.png" alt="">
<h2>speaker</h2>
<a href="./products.php?category=speakers">shop <i class='bx bx-chevron-right'></i></a>
</div>
</div>



</div>
</div>
<div class="container">
<div class="speaker-hero row">
<div class="col s12 m6 l6 text">
    <h2 class="heading"><?php echo $ZX9Speaker['title'] ?> </h2>
<p><?php echo $ZX9Speaker['description'] ?></p>
<a href="./detail.php?id=<?php echo $ZX9Speaker['id'] ?>">
<button class="cta-button">SEE product</button>
</a>
</div>
<div class="col s12 m6 l6 img">
<img src="<?php echo$ZX9Speaker['image'] ?>" alt="" style="max-width:85%">
</div>
</div>

<div class="z-speaker">
    <div class="p-heading"><?php echo $ZXSpeaker['title'] ?></div>
    <a href="./detail.php?id=<?php echo $ZXSpeaker['id']?>">

    <button class="p-btn">see product</button>

   </a>
</div>

<div class="y-headphone row">
<div class="col s12 l6 m6">
    <div class="y-card img"></div>
</div>
<div class="col s12 l6 m6">
    <div class="y-card">
    <h2 class="p-heading"><?php echo $YX1Speaker['title'] ?></h2>
    <a href="./detail.php?id=<?php echo $YX1Speaker['id'] ?>">

    <button class="p-btn">see product</button>

   </a>
    </div>
</div>

</div>

<div class="exp-container row">
<div class="col s12 m12 l6">
    <h2 class="p-heading">BRinging you the <span>best</span> audio gear</h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo vero recusandae facere odit voluptates veniam quo cum numquam repellendus, laborum, eos porro repellat impedit reprehenderit aliquam qui voluptas at iusto possimus asperiores quia nesciunt odio, consectetur ut. Harum sint commodi corporis doloribus doloremque delectus, debitis, voluptates perspiciatis nesciunt illum libero!</p>
</div>
<div class="col s12 m12 l6 img">
    
</div>

</div>
</div>

<footer>
    <div class="container">
    <nav class="transparent z-depth-0">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">audiophile</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger">
      <i class='bx bx-menu-alt-left'></i>
      </a>
      <ul class="right hide-on-med-and-down">
      <li><a id="home-section" >Home</a></li>
        <li><a id="headphones-section" >Headphones</a></li>
        <li><a id="speakers-section" >Speakers</a></li>
        <li><a id="earphones-section" >Earphones</a></li>
        <li><a href="./cart.php"><i class='bx bxs-cart-alt'></i></a></li>
     <li><a href="./adminlogin.php"><i class='bx bxs-user'></i></a></li>
     
      </ul>
    </div>
  </nav>  
  <div class="row">
      <div class="col s12 l6 m6">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet corrupti dolores fugiat debitis ullam repellendus optio quaerat, natus repudiandae reiciendis quis nostrum possimus id quam asperiores, dolor perferendis recusandae saepe.</p>
      </div>
      <div class="col s12 l6 m6">
    <div>  <i class='bx bxl-instagram'></i>
      <i class='bx bxl-facebook-circle' ></i>
      <i class='bx bxl-twitter' ></i>
      <i class='bx bxl-twitch' ></i></div>
    </div>
  </div> 
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
M.AutoInit();

</script>
</body>
</html>