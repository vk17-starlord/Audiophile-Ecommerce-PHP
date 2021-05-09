<?php

require('adminconnection.php');
require('checkifadmin.php');
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=audiophile','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$id=$_GET['id'] ?? null;

if(isset($id)){
    $stmt = $pdo->prepare( "DELETE FROM  products WHERE id =:id" );
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if( ! $stmt->rowCount() ) echo "Deletion failed";
    header('location:admindashboard.php');
}else{
    header('location:index.php');
}

?>