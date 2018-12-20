<?php 
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$user_id=$_POST['user_id'];
mysqli_query($conn,"delete from contact where user_id=$user_id");
mysqli_query($conn,"delete from replay where user_id=$user_id");
?>