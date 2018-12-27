<?php 
    $conn=mysqli_connect("localhost","root","","jewelry");

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];
    $result = mysqli_query($conn,"select * from users where email='$email'");
    if (mysqli_num_rows($result)>0){
        echo "false";
    }else{
        mysqli_query($conn,"insert users (first_name,last_name,email,password,type) VALUES ('$first_name','$last_name','$email','$password','$type')");
        echo "true";
    }
?>