<?php 
include_once "website.class.php";
$obj = new website();
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$output = '';
$result_category_search = $obj->search_category_name($_POST['search']);
$result = mysqli_query($conn,"select * from product where store_id = ".$_POST['id']." 
and name like '%".$_POST['search']."%' or number like '%".$_POST['search']."%' order by id desc");

if(mysqli_num_rows($result) > 0){
    $data_search = array();
    while($row = mysqli_fetch_array($result)){
        $data_search[] = $row;
    }
    foreach($data_search as $ydata){
        $gole_price = $obj->get_price($ydata['gold_kerat']);
            $cat_name = $obj->get_category_name($ydata['cat_id']);
            foreach($cat_name as $row){
                $name = $row['name'];
            }
           $output .='<tr data-id="'. $ydata['id'].'">

           <td class="img"><img src="../assets/product_img/'.$ydata['photo'].'" alt="personal photo" class="img-thumbnail rounded-circle product_img" id="personal-photo"></td>
           <td class="name">'.$ydata['name'].'</td>
           <td class="number">'.$ydata['number'].'</td>
           <td class="cat_name" data="'.$ydata['cat_id'].'">'.$name.'</td>
           <td class="gold_weight" hidden>'.$ydata['gold_weight'].'</td>
           <td class="gold_kerat" hidden>'.$ydata['gold_kerat'].'</td>
            <td class="manuf" hidden>'.$ydata['manuf'].'</td>
           <td>'.($ydata['gold_weight']*$gole_price+$ydata['manuf']) .' $</td>
           <td>
           <a href="javascript:delete_product('.$ydata['id'].');" class="btn btn-danger">delete</a>
           <a href="javascript:edit_product('.$ydata['id'].');" class="btn btn-info">edit</a>
           </td>

      </tr>';
    }
    //echo $output;
}
if($result_category_search != null && $_POST['search']!=''){
        foreach ($result_category_search as $id) {
            # code...
            $result_product_search = mysqli_query($conn , "select * from product where store_id = ".$_POST['id']." and cat_id = ".$id['id']." order by id desc");
            $data_search = array();
            while($row = mysqli_fetch_array($result_product_search)){
                $data_search[] = $row;
            }
            foreach($data_search as $ydata){
                $gole_price = $obj->get_price($ydata['gold_kerat']);
                    $cat_name = $obj->get_category_name($ydata['cat_id']);
                    foreach($cat_name as $row){
                        $name = $row['name'];
                    }
                    $output .='<tr data-id="'. $ydata['id'].'">

                    <td class="img"><img src="../assets/product_img/'.$ydata['photo'].'" alt="personal photo" class="img-thumbnail rounded-circle product_img" id="personal-photo"></td>
                    <td class="name">'.$ydata['name'].'</td>
                    <td class="number">'.$ydata['number'].'</td>
                    <td class="cat_name" data="'.$ydata['cat_id'].'">'.$name.'</td>
                    <td class="gold_weight" hidden>'.$ydata['gold_weight'].'</td>
                    <td class="gold_kerat" hidden>'.$ydata['gold_kerat'].'</td>
                     <td class="manuf" hidden>'.$ydata['manuf'].'</td>
                    <td>'.($ydata['gold_weight']*$gole_price+$ydata['manuf']) .' $</td>
                    <td>
                    <a href="javascript:delete_product('.$ydata['id'].');" class="btn btn-danger">delete</a>
                    <a href="javascript:edit_product('.$ydata['id'].');" class="btn btn-info">edit</a>
                    </td>
         
               </tr>';
            }
                }
            }
            echo $output;

?>