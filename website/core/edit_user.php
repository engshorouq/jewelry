<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$output = '';
$uploadFile = "";
if (!empty($_POST['old_password'])) {
    if ($_POST['old'] != $_POST['old_password']) {
        $output .= '<input type="hidden" name="old_password" value="'.$_POST['old_password'].'"><p style="color: #c15757c9;font-size: 17px;"><i class="fa fa-times-circle"></i> Please Write correct old Password<p>';
    }else if($_POST['new']!=$_POST['confirm']){
        $output .= '<input type="hidden" name="old_password" value="'.$_POST['old_password'].'"><p style="color: #c15757c9;font-size: 17px;"><i class="fa fa-times-circle"></i> Please Ensure the new and confirm password are matching Password<p>'; 
    }else if($_POST['new']==$_POST['old']){
        $output .= '<input type="hidden" name="old_password" value="'.$_POST['old_password'].'"><p style="color: #c15757c9;font-size: 17px;"><i class="fa fa-times-circle"></i> The old and new password are matching !!<p>';
    }else{
        mysqli_query($conn,"update users set password='".$_POST['new']."' where id=".$_POST['id']."");
        $output .='<input type="hidden" name="old_password" value="'.$_POST['new'].'">';
    }
} else {
    if (isset($_FILES["file"]["type"]) and $_POST['flag'] == '2') {
        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $new_name_image = uniqid() . date("dmyish") . "." . $ext;
        $valid_extensions = array("jpeg", "jpg", "png");
        if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($ext, $valid_extensions)) {

            move_uploaded_file($_FILES['file']['tmp_name'], "../../assets/users_img/" . $new_name_image);
        }
        mysqli_query($conn, "update users set first_name='" . $_POST['first_name'] . "',last_name='" . $_POST['last_name'] . "',photo='" . $new_name_image . "',email='" . $_POST['email'] . "',phone_number='" . $_POST['number'] . "' where id=" . $_POST['id']);
    } else {
        mysqli_query($conn, "update users set first_name='" . $_POST['first_name'] . "',last_name='" . $_POST['last_name'] . "',email='" . $_POST['email'] . "',phone_number='" . $_POST['number'] . "' where id=" . $_POST['id']);
    }
    $result = mysqli_query($conn, "select * from users  where id=" . $_POST['id']);
    $output = '';
    while ($ydata = mysqli_fetch_array($result)) {
        $_SESSION['user_first_name']=$ydata['first_name'];
        $_SESSION['user_last_name']=$ydata['last_name'];
        $_SESSION['user_img']=$ydata['photo'];
        $output .= '<div class="form-group setting_form" style="margin-bottom: 15px;">
        <label class="control-label">First Name : </label>
        <input type="text" value="' . $ydata['first_name'] . '" name="First_name" placeholder="First Name" id="first_name" class="form-control setting_input">
    </div>
    <div class="form-group setting_form" style="margin-bottom: 15px;">
        <label class="control-label">Last Name : </label>
        <input type="text" value="' . $ydata['last_name'] . '" name="Last_name" placeholder="Last Name" id="last_name" class="form-control setting_input">
    </div>
    <div class="form-group setting_form" style="margin-bottom: 15px;">
        <label class="control-label">Email 	&nbsp;&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;: </label>
        <input type="email" value="' . $ydata['email'] . '" name="email" placeholder="email" id="email" class="form-control setting_input">
    </div>
    <div class="form-group setting_form" style="margin-bottom: 15px;">
        <label class="control-label">Phone &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;: </label>
        <input type="text" value="'.$ydata['phone_number'].'" name="number" placeholder="Phone Number Start With 05-" id="number" patten="[0-9]{10}" class="form-control setting_input">
    </div>
    <input type="hidden" name="id" id="id" value="' . $ydata['id'] . '">
    <input type="hidden" name="flag" id="flag_file" value="1">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="file" name="file">
        <label class="custom-file-label" for="customFile">Change Profile Picture</label>
    </div>
    <div class="btn_group">
        <input type="submit" name="edit" class="btn btn-primary btn_edit" value="edit">
    </div>';
    }
}
echo $output;
