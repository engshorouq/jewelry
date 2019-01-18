<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$dateTime = date("Y-m-d h:i:sa", time());

if(!empty($_SESSION['user_id'])){
    foreach ($_SESSION['card'] as $ydata) {
        $total_price=$ydata['price']*$ydata['quantity'];
        mysqli_query($conn,"INSERT INTO purchase (product_id,start_event,price,end_event,title,user_id,size,quantity)
         VALUES (".$ydata['id'].",'".$dateTime."',".$total_price.",'".$dateTime."','".$ydata['name']."',".$_SESSION['user_id'].",'".$ydata['size']."','".$ydata['quantity']."')");
    }
   unset($_SESSION['card']);
   echo "done";
}else{
 echo '1' ;  
}
?>