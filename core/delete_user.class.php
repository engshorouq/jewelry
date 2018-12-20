<?php 
   $conn=mysqli_connect("localhost","root","","jewelry");
   if(isset($_POST['done'])){
       $id=$_POST['id'];
    mysqli_query($conn,"delete from users where id=$id");  
   }
    ?>