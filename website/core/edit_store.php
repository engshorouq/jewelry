<?php 
    $conn=mysqli_connect("localhost","root","","jewelry");
    $output = '';
    $uploadFile = "";
    if(isset($_FILES["file"]["type"]) and $_POST['flag']=='2'){
     $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
     $new_name_image=uniqid().date("dmyish").".".$ext;
     $valid_extensions = array("jpeg", "jpg", "png");
     if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($ext, $valid_extensions)){
     
         move_uploaded_file($_FILES['file']['tmp_name'],"../stores_img/".$new_name_image);
     }
     mysqli_query($conn,"update stores set name='".$_POST['store_name']."',image='".$new_name_image."',address='".$_POST['address']."',mobile='".$_POST['mobile']."',f_link='".$_POST['f_link']."',g_link='".$_POST['g_link']."' where id=".$_POST['store_id']);
    }
    else{
        mysqli_query($conn,"update stores set name='".$_POST['store_name']."',address='".$_POST['address']."',mobile='".$_POST['mobile']."',f_link='".$_POST['f_link']."',g_link='".$_POST['g_link']."' where id=".$_POST['store_id']);
    }
    $result = mysqli_query($conn,"select * from stores where id=".$_POST['store_id']);
while($ydata = mysqli_fetch_array($result)){
    $output .=' <div class="img_cont">
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
       
    </div>';
}
echo $output;
?>