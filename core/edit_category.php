<?php 
    $conn=mysqli_connect("localhost","root","","jewelry");
    $output = '';
    $uploadFile = "";
    if(isset($_FILES["file"]["type"]) and $_POST['flag']=='2'){
     $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
     $new_name_image=uniqid().date("dmyish").".".$ext;
     $valid_extensions = array("jpeg", "jpg", "png");
     if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($ext, $valid_extensions)){
     
         move_uploaded_file($_FILES['file']['tmp_name'],"../assets/category_img/".$new_name_image);
     }
     mysqli_query($conn,"update category set name='".$_POST['cat_name']."',photo='".$new_name_image."' where id=".$_POST['cat_id']);
    }
    else{
        mysqli_query($conn,"update category set name='".$_POST['cat_name']."' where id=".$_POST['cat_id']);
    }
    $result=mysqli_query($conn,"select * from category  where id=".$_POST['cat_id']);
    $output='';
    while($ydata = mysqli_fetch_array($result)){
        $output .= '
        <div class="img_cont">
        <img src="assets/category_img/'.$ydata['photo'].'" alt="category image" class="img-thumbnail cat_img">
    </div>
        <div class="content">
        <a href="javascript:delete_category('.$ydata['id'].');" class="">
        <i class="fa fa-trash"></i> </a>
        <a href="javascript:edit_category('.$ydata['id'].',\''.$ydata['photo'].'\',\''.$ydata['name'].'\');" class="">
        <i class="fa fa-edit"></i></a>
            <a href="javascript:display_product('.$ydata['id'].');" class="">
            <i class="fa fa-list"></i></a>
            <p>'.$ydata['name'].'</p>
           
        
    </div>';
    }
    echo $output;
?>