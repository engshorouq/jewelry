<?php
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$result = mysqli_query($conn,"SELECT * FROM delete_conversation WHERE type='request' and user_id=".$_POST['user_id']); 
$dateTime = date("Y-m-d h:i:sa", time());
if(mysqli_num_rows($result)>0){
    mysqli_query($conn,"UPDATE delete_conversation SET date='$dateTime' WHERE type='request' and user_id=".$_POST['user_id']);
}else{
    mysqli_query($conn,"INSERT INTO delete_conversation (user_id,date,type) VALUES (".$_POST['user_id'].",'$dateTime','request')");
}
?>