<?php 
session_start();
if(empty($_SESSION['card'])){
    $_SESSION['card']=array();
}
$id=$_POST['product_id'];
$size=$_POST['size'];
$quantity=$_POST['quantity'];
$_SESSION['card'][]=['id'=>$id,'size'=>$size,'quntity'=>$quantity];
echo count($_SESSION['card']);
?>