<?php 
   $conn=mysqli_connect("localhost","root","","jewelry");
   $output = '';
   $uploadFile = "";
   if(!empty($_FILES["file"]["type"])){
    $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    $new_name_image=uniqid().date("dmyish").".".$ext;
    $valid_extensions = array("jpeg", "jpg", "png");
    if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($ext, $valid_extensions)){
    
        move_uploaded_file($_FILES['file']['tmp_name'],"../assets/category_img/".$new_name_image);
    }
    mysqli_query($conn,"insert category (name,photo) VALUES ('".$_POST['cat_name']."','".$new_name_image."')");
   }

   /**Display all category */
   $cat=0;
   $result = '<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 container">
   <div class="img_cont">
       <img src="assets/category_img/products.png" alt="category image" class="img-thumbnail cat_img">
   </div>
   <div class="content">
       
       <a href="product.php?data='.$cat.'" class="">
           <i class="fa fa-list"></i></a>
       <p>
           All Producs
       </p>

   </div>
</div>';
   $output = mysqli_query($conn,"select * from category");
   while($ydata = mysqli_fetch_array($output)){
    $result .='<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 container" data-id="'.$ydata['id'].'">
    <div class="img_cont">
    <img src="assets/category_img/'.$ydata['photo'].'" alt="category image" class="img-thumbnail cat_img">
    </div>
    <div class="content">
    <a href="javascript:delete_category('.$ydata['id'].');" class="">
    <i class="fa fa-trash"></i> </a>
    <a href="javascript:edit_category('.$ydata['id'].',\''.$ydata['photo'].'\',\''.$ydata['name'].'\');" class="">
    <i class="fa fa-edit"></i></a>
        <a href="product.php?data='.$ydata['id'].'" class="">
        <i class="fa fa-list"></i></a>
        <p>'.$ydata['name'].'</p>
       
    </div>
</div>';
}
echo $result;
    ?>