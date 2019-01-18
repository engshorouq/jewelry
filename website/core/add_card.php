<?php 
session_start();
if(empty($_SESSION['card'])){
    $_SESSION['card']=array();
}
$id=$_POST['product_id'];
$size=$_POST['size'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$name=$_POST['product_name'];
$_SESSION['card'][]=['id'=>$id,'size'=>$size,'quantity'=>$quantity,'price'=>$price,'name'=>$name];
echo count($_SESSION['card']);
?>