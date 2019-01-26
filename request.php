<?php
session_start();
if (!isset($_SESSION['login_id']) or empty($_SESSION['login_id'])) {
    die();
}
include_once "core/admin.class.php";
$obj = new admin();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Main Page</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="main.html">
                    <img src="assets/img/logo.jpg" alt="logo" id="logo">
                </a>
                <h2 id="logo-h"> Jewelry</h2>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <!--<li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>-->
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span
                                    class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-listt">
                                        <div class="list-group">
                                            <a href='request.php?data=0' class="list-group-item list-group-item-action">
                                                Saller Notifications
                                            </a>
                                            <a href="request.php?data=1" class="list-group-item list-group-item-action">
                                                Customer Notification
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <?php $result=$obj->admin_info($_SESSION['login_id']);
                            foreach($result as $data){

                           
                        ?>
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="assets/admin_img/<?=$data['photo']?>" alt="" class="user-avatar-md rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">
                                        <?= $data['first_name']." ".$data['last_name'];?>
                                    </h5>
                                </div>
                                <?php } ?>
                                <a class="dropdown-item" href="setting_admin.php"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">MENU</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="main.php">
                                    <i class="fa fa-fw fa-dollar-sign"></i>Gold Price</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="users.php">
                                    <i class="fa fa-fw fa-user-circle"></i>Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.php">
                                    <i class="fas fa-fw fa-list"></i>Category</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="commission.php">
                                    <i class="fa fa-fw fa-dollar-sign"></i>Commission</a>

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row inbox">
                        <h2><i class="fa fa-envelope-open"></i> Inbox </h2>
                    </div>
                    <div class="row head-req">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <p class="p_head">All Messages</p>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                            <img src="" id="header_photo" class="img-thumbnail rounded-circle personal-photo" alt="photo of user">
                            <span id="header_name"></span>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                            <p class="p_head" style="float:right;">
                                <a href="javascript:delete_chat();"><i class="fa fa-trash"></i> Delete</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 div-users">

                            <?php 
                            $type='saller';
                            if($_GET['data']==1){$type='customer';}
                            $counter=1;
                            $result=$obj->user_type($type);
                            if($result != null){
                            foreach($result as $data){
                                if($obj->users_contact($data['id'])!=null){
                            ?>
                            <a href="javascript:display_messages(<?=$data['id'];?>);" class="display_link" id="<?=$counter++;?>">
                                <div class="row users" data-id="<?=$data['id'];?>">
                                    <img src="assets/users_img/<?=$data['photo'];?>" class="img-thumbnail rounded-circle personal-photo"
                                        alt="photo of user">
                                    <span class="name_user">
                                        <?=$data['first_name'];?></span>
                                    <?php $msg=$obj->users_contact($data['id']); 
                                    ?>
                                    <div class="last_msg <?=$msg[0]['status'];?>">
                                        <?=$msg[count($msg)-1]['msg'];?>
                                    </div>
                                </div>
                            </a>
                            <?php }}}?>


                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                            <div class="content_msg">

                                <div class="content_msg_user" title="date">


                                </div>

                                <div class="content_msg_admin" title="date">


                                </div>
                            </div>
                            <div class="form_div">
                                <form name="request" id="rep_div" method="post" class="form-inline form-request"
                                    enctype="multipart/form-data">
                                    <textarea class="form-control-plaintext" name="text_msg" rows="2" id="comment"
                                        placeholder="typing your message ..."></textarea>
                                    <i class="fa fa-camera" id="file_icon"></i>
                                    <input type="file" name="file" id="file_photo">
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                    <input type="hidden" value="" id="count_messages">
                                    <button type="submit" class="btn btn-primary" name="send" id="send"><i class="fa fa-chevron-circle-right"></i></button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
<script>
$('.unread').parent().css({
    "background": "rgba(225, 228, 224, 0.78)"
});
$("#file_icon").click(function() {
    $("input[type='file']").trigger('click');
});

//to scroll to the last message
function scroll() {
    $('.content_msg').children().removeAttr('id');
    $('.content_msg').children().last().attr('id', 'last');
    if (document.getElementById('last') != undefined) {
        document.getElementById('last').scrollIntoView();
    }

}

$('input[type="file"]').on('change', function() {
    var file_data = $('#file_photo').prop('files')[0];
    var id = $('#user_id').val();
    var form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('user_id', id);
    $.ajax({
        url: "core/add_msg_admin.php",
        type: "POST",
        async: false,
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            $('.content_msg').html('');
            $('.content_msg').html(data);
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

$('#rep_div').submit(function(e) {
    e.preventDefault();
    var formdata = new FormData(this);
    $.ajax({
        url: "core/add_msg_admin.php",
        type: "POST",
        async: false,
        data: formdata,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            $('#comment').val('');
            let length = data.substr(0, data.indexOf('<'));
            $('#count_messages').val(length);
            $('.content_msg').html('');
            $('.content_msg').html(data.substr(data.indexOf('<')));
            scroll();
        }
    });
});
window.onload = function() {
    var id = $('#1').children("div").attr("data-id");
    var image = $('#1').children("div").children('img').attr("src");
    var firstName = $('#1').children("div").children('span').text();
    $('#header_photo').attr('src', image);
    $('#header_name').text(firstName);
    $('#1').children("div").children('div').attr('class', "last_msg read");
    $('.users[data-id="' + id + '"]').removeClass('selected');
    $('.users[data-id="' + id + '"]').addClass('selected');
    $('#user_id').val(id);

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

function display_messages(id) {
    $('div').removeClass('selected');
    $('div[data-id="' + id + '"]').removeClass('selected');
    $('div[data-id="' + id + '"]').addClass('selected');
    var image = $('div[data-id="' + id + '"]').children('img').attr('src');
    var first_name = $('div[data-id="' + id + '"]').children('span').text();
    $('#header_name').text(first_name);
    $('#header_photo').attr('src', image);
    $('#user_id').val(id);
    $.ajax({
        url: "core/display_msg.php",
        type: "POST",
        async: false,
        data: {
            "user_id": id
        },
        success: function(data) {
            $('.content_msg').html('');
            $('.content_msg').html(data.substr(data.indexOf('<')));
            scroll();
        }
    });
}

function delete_chat() {
    var id = $('#user_id').val();
    $.ajax({
        url: "core/delete_msg.php",
        type: "POST",
        async: false,
        data: {
            "user_id": id
        },
        success: function(data) {
            //$('.content_msg').html('');
        }
    });
}
</script>

</html>