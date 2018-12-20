<?php
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$dateTime = date("Y-m-d h:i:s", time());
if(!empty($_POST['price_24'])){
    $price_24 = $_POST['price_24'];
    $price_12 = $price_24 * 0.50;
    $price_14 = $price_24 * 0.583;
    $price_18 = $price_24 * 0.750;
    $price_21 = $price_24 * 0.875;
    $price_22 = $price_24 * 0.916;
    //mysqli_query($conn,"update price_gold set price_12=30,price_14=50,price_18=10,price_21=20,price_22=20,price_24=50, where id=1");
    mysqli_query($conn, "update price_gold set price_12=$price_12, price_14=$price_14, price_18=$price_18, price_21=$price_21, price_22=$price_22, price_24=$price_24, last_update='$dateTime' where id=1");
    $result = '<p class="last_update">The Last Update The Price at : 
    <span style="color:#d45f6f" id="last_update">'.$dateTime.'</span></p>
    <p class="last_update">Gold 12 Kerat <span style="color:#d45f6f" id="last_update_12">'.$price_12.' $<span> </p>
    <p class="last_update">Gold 14 Kerat <span style="color:#d45f6f" id="last_update_14">'.$price_14.' $<span> </p>
    <p class="last_update">Gold 18 Kerat <span style="color:#d45f6f" id="last_update_18">'.$price_18.' $<span> </p>
    <p class="last_update">Gold 21 Kerat <span style="color:#d45f6f" id="last_update_21">'.$price_21.' $<span> </p>
    <p class="last_update">Gold 22 Kerat <span style="color:#d45f6f" id="last_update_22">'.$price_22.' $<span> </p>
    <p class="last_update">Gold 24 Kerat <span style="color:#d45f6f" id="last_update_24">'.$price_24.' $<span> </p>
    ';
    echo $result;
}else{
    echo "<p>please fill the field</p>";
}
?>
