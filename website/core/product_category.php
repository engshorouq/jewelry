<?php
include_once("website.class.php"); 
$obj = new website();
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$result = $obj->product_category($_POST['id']);
$output = '';
foreach ($result as $ydata) {
    $output .='<div class="col-col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 product_card_div">

    <img src="../assets/product_img/'.$ydata['photo'].'" alt="product image" class="img-thumbnail">
    <p>
        '.$ydata['name'].'
    </p>
    <span>
        '.($ydata['gold_weight']*$obj->get_price($ydata['gold_kerat'])+$ydata['manuf']).' $</span>
    <a href="product_cart.php?data='.$ydata['id'].'" class="book">Book It</a>
</div>';
}
echo $output;
?>