<?php
include_once "admin.class.php";
$obj = new admin();
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$output = '';
$text = $_POST['search'];
$cat_id=$_POST['cat_id'];
//var_dump($cat_id);
if($cat_id=='0'){
    $result = mysqli_query($conn, "select * from product where name like '%$text%' or gold_weight like '%$text%'");
}else{
    $result = mysqli_query($conn, "select * from product where cat_id=$cat_id and name like '%$text%' or gold_weight like '%$text%'");
}
//$result = mysqli_query($conn, "select * from product where cat_id=$cat_id and name like '%$text%' or gold_weight like '%$text%'");
$result_store = $obj->get_store_id($text);
if($_POST['search']==''){
    if($cat_id=='0'){
        $result = mysqli_query($conn, "select * from product");
    }else{
        $result = mysqli_query($conn, "select * from product where cat_id=$cat_id");
    }
    while ($ydata = mysqli_fetch_array($result)) {
        $output .= '<tr data-id="' . $ydata['id'] . '">
           <td><img src="assets/product_img/' . $ydata['photo'] . '" alt="personal photo" class="img-thumbnail rounded-circle" id="personal-photo"></td>
           <td>' . $ydata['name'] . '</td>
           <td>' . $obj->get_store_name($ydata['store_id']) . '</td>
           <td>' . $ydata['gold_weight'] . ' kram</td>
           <td>' . ($ydata['gold_weight'] * $obj->get_price($ydata['gold_kerat']) + $ydata['manuf']) . ' $</td>
           <td><a href="javascript:delete_product(' . $ydata['id'] . ')" class="btn btn-danger">delete</a></td>

      </tr>';
    }

}
if (mysqli_num_rows($result) > 0 && $_POST['search'] != '') {
    while ($ydata = mysqli_fetch_array($result)) {
        $output .= '<tr data-id="' . $ydata['id'] . '">
           <td><img src="assets/product_img/' . $ydata['photo'] . '" alt="personal photo" class="img-thumbnail rounded-circle" id="personal-photo"></td>
           <td>' . $ydata['name'] . '</td>
           <td>' . $obj->get_store_name($ydata['store_id']) . '</td>
           <td>' . $ydata['gold_weight'] . ' kram</td>
           <td>' . ($ydata['gold_weight'] * $obj->get_price($ydata['gold_kerat']) + $ydata['manuf']) . ' $</td>
           <td><a href="javascript:delete_product(' . $ydata['id'] . ')" class="btn btn-danger">delete</a></td>

      </tr>';
    }
}
if ($result_store != null && $_POST['search'] != '') {
    foreach ($result_store as $id) {
        $test = intval($id[0]);
        if($cat_id=='0'){
            $result = mysqli_query($conn, "SELECT * FROM product WHERE store_id=$test");
        }else{
            $result = mysqli_query($conn, "select * from product where cat_id=$cat_id and store_id=$test");
        }
        
        if (mysqli_num_rows($result) > 0) {
            while ($ydata = mysqli_fetch_array($result)) {
                $output .= '<tr data-id="' . $ydata['id'] . '">

                <td><img src="assets/product_img/' . $ydata['photo'] . '" alt="personal photo" class="img-thumbnail rounded-circle" id="personal-photo"></td>
                <td>' . $ydata['name'] . '</td>
                <td>' . $obj->get_store_name($ydata['store_id']) . '</td>
                <td>' . $ydata['gold_weight'] . ' kram</td>
                <td>' . ($ydata['gold_weight'] * $obj->get_price($ydata['gold_kerat']) + $ydata['manuf']) . ' $</td>
                <td><a href="javascript:delete_product(' . $ydata['id'] . ')" class="btn btn-danger">delete</a></td>

           </tr>';
            }
        }
    }
}
echo $output;
