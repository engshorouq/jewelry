<?php 
session_start();
//echo $_POST['card_index'];
/* array_splice($_SESSION['card'],1,1);
                print_r($_SESSION['card']);*/
array_splice($_SESSION['card'],intval($_POST['offset']),1);
//var_dump(is_array($_SESSION['card']));

?>