<?php
session_start();
include_once("core/website.class.php");
$obj = new website();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jewelry</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="style/main.css" />
</head>

<body>
    <header>
        <div class="row" style="background: lightgoldenrodyellow;">
            <div class="col-col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <img src="../assets/img/logo.png" alt="logo" class="logo-header">
            </div>
            <div class="col-col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">


                <ul class="ul_header">
                    <?php if(!empty($_SESSION['user_id'])) {?>
                    <li style=" display: inline-flex;">
                        <img src="../assets/users_img/<?=$_SESSION['user_img']?>" alt="" class="customer_img rounded-circle">
                        <a href="logout.php">Log Out</a>
                        <a href="setting_customer.php">Setting</a>
                    </li>
                    <?php }else{?>
                    <li style="margin-left: 7rem;"><a href="login.php">Login</a></li>
                    <li><a href="signup.php">signup</a></li>
                    <?php } ?>
                    <li><a href="#"><i class="fab">&#xf09a;</i></a></li>
                    <li><a href="#"><i class="fab">&#xf099;</i></a></li>
                    <li><a href="#"><i class="fab">&#xf08c;</i></a></li>
                    <li><a href="display_card.php"><i class="fa fa-shopping-cart"></i><span class="num_card">
                                <?php
                    if(!empty($_SESSION['card'])) echo count($_SESSION['card']);?></span></a></li>
                </ul>
            </div>
        </div>
    </header>
    <nav>
        <div class="row" id="row">
            <ul class="ul_nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">Products</a></li>
                <li><a href="all_stores.php">Stores</a></li>
                <li><a href="all_product_cat.php">Categories</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>
    <article class="main_card" style="height: 515px;">
        <div class="customer_setting" style="margin:20px">
            <h2 class="header_setting"><i class="fa fa-cog"></i> Setting </h2>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <?php $data=$obj->user_information($_SESSION['user_id']);
                        //var_dump($data);
                        foreach($data as $ydata){
                        ?>
                    <p class="title">General Information</p>
                    <form class="form-inline" id="form_setting_general" action="" method="post">
                        <fieldset class="result_edit">

                            <div class="form-group setting_form" style="margin-bottom: 15px;">
                                <label class="control-label">First Name : </label>
                                <input type="text" value="<?=$ydata['first_name'];?>" name="first_name" placeholder="First Name"
                                    id="first_name" class="form-control setting_input">
                            </div>
                            <div class="form-group setting_form" style="margin-bottom: 15px;">
                                <label class="control-label">Last Name : </label>
                                <input type="text" value="<?=$ydata['last_name'];?>" name="last_name" placeholder="Last Name"
                                    id="last_name" class="form-control setting_input">
                            </div>
                            <div class="form-group setting_form" style="margin-bottom: 15px;">
                                <label class="control-label">Email &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:
                                </label>
                                <input type="email" value="<?=$ydata['email'];?>" name="email" placeholder="email" id="email"
                                    class="form-control setting_input">
                            </div>
                            <div class="form-group setting_form" style="margin-bottom: 15px;">
                                <label class="control-label">Phone &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: </label>
                                <input type="text" value="<?=$ydata['phone_number'];?>" name="number" placeholder="Phone Number Start With 05-"
                                    id="number" patten="[0-9]{10}" class="form-control setting_input">
                            </div>
                            <input type="hidden" name="id" id="id" value="<?=$ydata['id'];?>">
                            <input type="hidden" name="flag" id="flag" value="1">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="edit_file" name="file">
                                <label class="custom-file-label" for="customFile">Change Profile Picture</label>
                            </div>
                            <div class="btn_group">
                                <input type="submit" name="edit" class="btn btn-primary btn_edit" value="edit">
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <p class="title">Change Password</p>
                    <form class="form-inline" id="form_setting_password" action="" method="post">
                        <fieldset>


                            <input type="hidden" name="id" value="<?=$ydata['id'];?>">
                            <?php } ?>
                            <div class="form-group setting_form" style="margin-bottom: 15px;">
                                <label class="control-label">Old Password
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <input type="password" name="old" placeholder="old password" id="old" class="form-control setting_input">
                            </div>
                            <div class="form-group setting_form" style="margin-bottom: 15px;">
                                <label class="control-label">New Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <input type="password" name="new" placeholder="new password" id="new" class="form-control setting_input">
                            </div>
                            <div class="form-group setting_form" style="margin-bottom: 15px;">
                                <label class="control-label">Confirm Password</label>
                                <input type="password" name="confirm" placeholder="confirm password" id="confirm" class="form-control setting_input">
                            </div>

                            <div class="btn_group">
                                <input type="submit" name="edit" class="btn btn-primary btn_edit" value="edit">
                            </div>
                            <div class="result_password">
                                <input type="hidden" name="old_password" value="<?=$ydata['password'];?>">
                                <div>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </article>

    <footer>
        <div class="row">
            <span><a href="#"><i class="fab">&#xf09a;</i></a></span>
            <span><a href="#"><i class="fab">&#xf099;</i></a></span>
            <span><a href="#"><i class="fab">&#xf08c;</i></a></span>
        </div>
    </footer>


    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script>
    $('#form_setting_general').submit(function(e) {
        //e.preventDefault();
        //alert("done");
        var formdata = new FormData(this);
        //alert(data.get('file').name);
        $.ajax({
            url: "core/edit_user.php",
            type: "POST",
            async: false,
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.result_edit').html('');
                $('#flag').val('1');
                $('.result_edit').html(data);
            }
        });
    });

    $('input[id="edit_file"]').on('change', function() {
        $('#flag').val('2');
    });

    $('#form_setting_password').submit(function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
            url: "core/edit_user.php",
            type: "POST",
            async: false,
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#old').val('');
                $('#new').val('');
                $('#confirm').val('');

                $('.result_password').html('');
                $('.result_password').html(data);
            }
        });
    });
    </script>
</body>

</html>