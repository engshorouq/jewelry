<?php 
$conn = mysqli_connect("localhost","root","","jewelry");
$output = '';
$uploadFile = "";
if(!empty($_FILES["file"]["type"])){
    $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    $new_name_image=uniqid().date("dmyish").".".$ext;
    $valid_extensions = array("jpeg", "jpg", "png");
    if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($ext, $valid_extensions)){
    
        move_uploaded_file($_FILES['file']['tmp_name'],"../stores_img/".$new_name_image);
    }
    mysqli_query($conn,"insert stores (name,address,mobile,image,f_link,g_link) VALUES ('".$_POST['store_name']."','".$_POST['address']."','".$_POST['mobile']."','".$new_name_image."','".$_POST['f_link']."','".$_POST['g_link']."')");
   }
   $result = mysqli_query($conn,"select * from stores");
   $num=0;
   $output .='<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 container">
   <div class="img_cont">
       <img src="../assets/category_img/products.png" alt="store image" class="img-thumbnail cat_img">
   </div>
   <div class="content">
       
       <a href="products.php?data='.$num.'" class="">
           <i class="fa fa-list"></i></a>
       <p>
           All Producs
       </p>

   </div>
</div>';
while($ydata = mysqli_fetch_array($result)){
    $output .='<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 container" data-id="'.$ydata['id'].'">
    <div class="img_cont">
    <img src="stores_img/'.$ydata['image'].'" alt="store image" class="img-thumbnail cat_img">
    </div>
    <div class="content">
    <a href="javascript:delete_store('.$ydata['id'].','.$ydata['name'].');" class="">
    <i class="fa fa-trash"></i> </a>
    <a href="javascript:edit_store('.$ydata['id'].',\''.$ydata['image'].'\',\''.$ydata['name'].'\',\''.$ydata['address'].'\',\''.$ydata['mobile'].'\',\''.$ydata['f_link'].'\',\''.$ydata['g_link'].'\');" class="">
    <i class="fa fa-edit"></i></a>
        <a href="products.php?data='.$ydata['id'].'" class="">
        <i class="fa fa-list"></i></a>
        <p>'.$ydata['name'].'</p>
       
    </div>
</div>';
}
echo $output;
?>
