<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","jewelry");
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn,"select * from users where email='$email' and password='$password'");
    if(mysqli_num_rows($result) > 0){
        while($row=mysqli_fetch_array($result)){
           $_SESSION['user_id'] = $row['id'];
           $_SESSION['user_first_name'] = $row['first_name'];
           $_SESSION['user_last_name'] =$row['last_name'];
           $_SESSION['user_img'] = $row['photo'];
           $_SESSION['user_type'] = $row['type'];
        }
        if($_SESSION['user_type']==='saller'){
            echo "saller";
        }
    }else{
        echo "false";
    }

?>