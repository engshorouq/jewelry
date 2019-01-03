<?php
session_start();
if (!isset($_SESSION['user_id']) or empty($_SESSION['user_id'])) {
    die();
}
include_once("core/website.class.php");
$obj = new website();

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/style/style.css">
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
                <a class="navbar-brand" href="saller_index.php">
                    <img src="../assets/img/logo.jpg" alt="logo" id="logo">
                </a>
                <h2 id="logo-h"> Jewelry</h2>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-listt">
                                        <div class="list-group">
                                        <a href='contact.php' class="list-group-item list-group-item-action">
                                                Notifications
                                            </a>
                                            
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/users_img/<?=$_SESSION['user_img']?>" alt="" class="user-avatar-md rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?=$_SESSION['user_first_name']." ".$_SESSION['user_last_name'];?></h5>
                                </div>
                                <a class="dropdown-item" href="setting_saller.php"><i class="fas fa-cog mr-2"></i>Setting</a>
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="saller_index.php">
                                    <i class="fa fa-fw fa-dollar-sign"></i>Stors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="withdraw.php">
                                    <i class="fa fa-fw fa-user-circle"></i>Withdraw</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="purchase.php">
                                    <i class="fas fa-fw fa-list"></i>Purchase</a>
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
                            
                            <h2 id="header_name">Admin</h2>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                            <p class="p_head" style="float:right;">
                            <a href="javascript:delete_chat();"><i class="fa fa-trash"></i>  Delete</a></p>
                        </div>
                    </div>
                    <div class="row">

                            <div class="content_msg" style="width: 63rem;margin-left: 25px;height: 300px;">
                                
                                
                                    
                                
                                </div>
                            
                        </div>
                        <div class="form_div">
                                <form name="request" id="rep_div" method="post" class="form-inline form-request" enctype="multipart/form-data">
                                <textarea class="form-control-plaintext" name="text_msg" style="width: 56rem;margin-left: 10px;" rows="2" id="comment" placeholder="typing your message ..." autofocus></textarea>
                                <i class="fa fa-camera" id="file_icon"></i>
                                <input type="file" name="file" id="file_photo">
                                <input type="hidden" name="user_id" id="user_id" value="<?=$_SESSION['user_id']?>">
                                <button type="submit" class="btn btn-primary" name="send" id="send"><i class="fa fa-chevron-circle-right"></i></button>
                                </form>
                            </div>

                    </div>
                </div>
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
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../assets/libs/js/dashboard-ecommerce.js"></script>
</body>
<script>
 /*$('.unread').parent().css({"background":"rgba(225, 228, 224, 0.78)"});*/
 
 //when click on the file icon tthe file input open
    $("#file_icon").click(function () {
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
                success: function (data) {
                    $('.content_msg').html('');
                    $('.content_msg').html(data);
                    scroll(); 
                }
            });

});

setInterval(function(){
    var user_id=$('#user_id').val();
    $.ajax({
        url: "core/display_msg.php",
            type: "POST",
            async: false,
            data: {
                "user_id":user_id
            },
            success: function(data){
                $('.content_msg').html('');
                $('.content_msg').html(data); 
                scroll();
            }
    });
    
}, 2000);

//when click submit for message
$('#rep_div').submit(function(e){
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
                success: function (data) {
                    $('#comment').val('');
                    $('.content_msg').html('');
                    $('.content_msg').html(data);
                    scroll();
                }
            });
});

//to scroll to the last message
function scroll(){
    $('.content_msg').children().removeAttr('id');
    $('.content_msg').children().last().attr('id','last');
    if(document.getElementById('last')!=undefined){
        document.getElementById('last').scrollIntoView();
    }
    
}


//display messages when load the page
window.onload = function(){
    var id = $('#user_id').val();
    $.ajax({
        url: "core/display_msg.php",
            type: "POST",
            async: false,
            data: {
                "user_id":id
            },
            success: function(data){
                $('.content_msg').html('');
                $('.content_msg').html(data); 
                scroll();
            }
    });
}

function delete_chat(){
    var id = $('#user_id').val();
    $.ajax({
        url: "core/delete_msg_request.php",
        type: "POST",
        async: false,
        data: {
            "user_id":id
        },
        success: function(data){
            alert(data);
            //$('.content_msg').html(''); 
        }
    });
}

   
</script>

</html>