<?php 
    session_start();
    unset($_SESSION['login_id']);
    unset($_SESSION['login_first_name']);
    unset($_SESSION['login_last_name']);
    header("location:index.php");
?>