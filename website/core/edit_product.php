<?php 
    include_once('website.class.php');
    $obj = new website();
    $conn = mysqli_connect("localhost","root","","jewelry");
    $output = '';
    $uploadFile = "";
    
    if(!empty($_FILES["file"]["type"]) && $_POST['flag']=='2'){
        $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
        $new_name_image=uniqid().date("dmyish").".".$ext;
        $valid_extensions = array("jpeg", "jpg", "png");
        if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($ext, $valid_extensions)){
        
            move_uploaded_file($_FILES['file']['tmp_name'],"../../assets/product_img/".$new_name_image);
        }
        //
         mysqli_query($conn,"update product set name='".$_POST['product_name']."'
                            ,photo='".$new_name_image."'
                            ,cat_id='".$_POST['gold_cat']."'
                            ,gold_weight=".$_POST['weight']."
                            ,gold_kerat='".$_POST['gold_kerat']."'
                            ,manuf=".$_POST['manuf']."
                            ,number='".$_POST['number']."' where id=".$_POST['product_id']);
       }else{
        mysqli_query($conn,"update product set name='".$_POST['product_name']."'
                            ,cat_id='".$_POST['gold_cat']."'
                            ,gold_weight=".$_POST['weight']."
                            ,gold_kerat='".$_POST['gold_kerat']."'
                            ,manuf=".$_POST['manuf']."
                            ,number='".$_POST['number']."' where id=".$_POST['product_id']);
       }
       $result = mysqli_query($conn,"select * from product where id=".$_POST['product_id']);
       $data = array();
       while($xdata = mysqli_fetch_array($result)){
        $data[] = $xdata;
       }
       //var_dump($data);
       foreach ($data as $ydata) {
           # code...
           $gole_price = $obj->get_price($ydata['gold_kerat']);
            $cat_name = $obj->get_category_name($ydata['cat_id']);
            foreach($cat_name as $row){
                $name = $row['name'];
            }
           $output .='
           <td class="img"><img src="../assets/product_img/'.$ydata['photo'].'" alt="personal photo" class="img-thumbnail rounded-circle product_img" id="personal-photo"></td>
           <td class="name">'.$ydata['name'].'</td>
           <td class="number">'.$ydata['number'].'</td>
           <td class="cat_name" data="'.$ydata['cat_id'].'">'.$name.'</td>
           <td class="gold_weight" hidden>'.$ydata['gold_weight'].'</td>
           <td class="gold_kerat" hidden>'.$ydata['gold_kerat'].'</td>
            <td class="manuf" hidden>'.$ydata['manuf'].'</td>
           <td>'.($ydata['gold_weight']*$gole_price+$ydata['manuf']) .' $</td>
           <td><a href="javascript:delete_product('.$ydata['id'].');" class="btn btn-danger">delete</a>
           <a href="javascript:edit_product('.$ydata['id'].');" class="btn btn-info">edit</a>
           </td>';
        }
       
echo $output;
?>