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
    <link rel="stylesheet" href="../assets/style/style.css">
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
                <li><a href="contact_customer.php">Contact</a></li>
            </ul>
        </div>
    </nav>
    <?php if(!empty($_SESSION['user_id'])){ ?>
    <article class="">
        <div class="row inbox">
            <h2><i class="fa fa-envelope-open"></i> Inbox </h2>
        </div>
        <div class="row head-req">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <p class="p_head">All Messages</p>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">

                <h2 id="header_name">Admin</h2>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <p class="p_head" style="float:right;">
                    <a href="javascript:delete_chat();" style="color: gray;"><i class="fa fa-trash"></i> Delete</a></p>
            </div>
        </div>
        <div class="row">

            <div class="content_msg" style="width: 63rem;margin-left: 145px;height: 300px;">




            </div>

        </div>
        <div class="form_div">
            <form name="request" id="rep_div" method="post" class="form-inline form-request" enctype="multipart/form-data">
                <textarea class="form-control-plaintext" name="text_msg" style="width: 56rem;margin-left: 130px;" rows="2"
                    id="comment" placeholder="typing your message ..." autofocus></textarea>
                <i class="fa fa-camera" id="file_icon"></i>
                <input type="file" name="file" id="file_photo">
                <input type="hidden" name="user_id" id="user_id" value="<?=$_SESSION['user_id']?>">
                <input type="hidden" value="" id="count_messages">
                <button type="submit" class="btn btn-primary" name="send" id="send"><i class="fa fa-chevron-circle-right"></i></button>
            </form>
        </div>

    </article>
    <?php } else {
        header('location:login.php');
     }?>

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
    $("#file_icon").click(function() {
        $("input[type='file']").trigger('click');
    });
    //to send image when selected
    $('input[type="file"]').on('change', function() {
        var file_data = $('#file_photo').prop('files')[0];
        var id = $('#user_id').val();
        var flag = 0;
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('user_id', id);
        form_data.append('flag', flag);
        $.ajax({
            url: "core/add_msg_user.php",
            type: "POST",
            async: false,
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                let length = data.substr(0, data.indexOf('<'));
                $('#count_messages').val(length);
                $('.content_msg').html('');
                $('.content_msg').html(data.substr(data.indexOf('<')));
                scroll();
            }
        });

    });

    setInterval(function() {
        var user_id = $('#user_id').val();
        $.ajax({
            url: "core/display_msg.php",
            type: "POST",
            async: false,
            data: {
                "user_id": user_id
            },
            success: function(data) {
                let length = data.substr(0, data.indexOf('<'));
                let count_msg = $('#count_messages').val();
                if (count_msg !== length) {
                    // console.log('done');
                    $('#count_messages').val(length);
                    $('.content_msg').html('');
                    $('.content_msg').html(data.substr(data.indexOf('<')));
                    scroll();
                }
            }
        });

    }, 2000);

    //when click submit for message
    $('#rep_div').submit(function(e) {
        e.preventDefault();
        var flag = 1;
        var formdata = new FormData(this);
        formdata.append('flag', flag);
        $.ajax({
            url: "core/add_msg_user.php",
            type: "POST",
            async: false,
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#comment').val('');
                $('.content_msg').html('');
                $('.content_msg').html(data.substr(data.indexOf('<')));
                scroll();
            }
        });
    });

    //to scroll to the last message
    function scroll() {
        $('.content_msg').children().removeAttr('id');
        $('.content_msg').children().last().attr('id', 'last');
        if (document.getElementById('last') != undefined) {
            document.getElementById('last').scrollIntoView();
        }

    }


    //display messages when load the page
    window.onload = function() {
        var id = $('#user_id').val();
        $.ajax({
            url: "core/display_msg.php",
            type: "POST",
            async: false,
            data: {
                "user_id": id
            },
            success: function(data) {
                let length = data.substr(0, data.indexOf('<'));
                $('#count_messages').val(length);
                $('.content_msg').html('');
                $('.content_msg').html(data.substr(data.indexOf('<')));
                scroll();
            }
        });
    }

    function delete_chat() {
        var id = $('#user_id').val();
        $.ajax({
            url: "core/delete_msg_request.php",
            type: "POST",
            async: false,
            data: {
                "user_id": id
            },
            success: function(data) {
                //alert(data);
                //$('.content_msg').html(''); 
            }
        });
    }
    </script>
</body>

</html>