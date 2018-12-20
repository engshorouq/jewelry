<?php
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$dateTime = date("Y-m-d h:i:s", time());
$price=$_POST['commission'];
mysqli_query($conn, "update commission set value=$price, last_update='$dateTime' where id=1");
echo $dateTime;
