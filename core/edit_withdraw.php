<?php 
$conn=mysqli_connect("localhost","root","","jewelry");
echo $_POST['id'].' '.$_POST['type'];
mysqli_query($conn,"update withdraw set status='".$_POST['type']."' where id=".$_POST['id']);
?>