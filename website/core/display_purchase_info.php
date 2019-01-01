<?php 
include_once('website.class.php');
$obj = new website();
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$id = $_POST['id'];
$output = '';
//get all info about purchase
$result_purchase = mysqli_query($conn,"select * from purchase where id=$id");
$data_purchase=array();
while($row = mysqli_fetch_array($result_purchase)){
    $data_purchase[]=$row;
}
foreach ($data_purchase as $ydata) {
    //to display product information
    $product_info = $obj->product_information($ydata['product_id']);
    foreach ($product_info as $data) {
       $output .='<div class="row">
       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 product">
       <h3>Product Information</h3>
       <span class="title1">Product Image : </span><img src="../assets/product_img/'.$data['photo'].'" class="img-thumbnail rounded-circle" alt="product img">
       <br><br> <span class="title1"> Product Name : </span><span>'.$data['name'].'</span>
       <br><br><span class="title1"> Product Number : </span><span>'.$data['number'].'</span>
       <br><br><span class="title1"> Product Price : </span><span>'.$ydata['price'].' $</span>
       <br><br><span class="title1">Store Name : </span><span>'.$obj->get_store_name($data['store_id']).'</span>
       </div>'; 
    }
    //to display customer information
    $user_info = $obj->user_information($ydata['user_id']);
    foreach ($user_info as $data) {
        $output .='<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 user">
        <h3>Customer Information</h3>
        <br> <span class="title1"> Customer Name : </span><span>'.$data['first_name'].' '.$data['last_name'].'</span>
        <br><br><span class="title1"> Customer Number : </span><span>'.$data['phone_number'].'</span>
        <br><br><span class="btn btn-info" id="cancel">Cancel</span>
        </div>
        </div>'; 
     }
}
echo $output;

?>