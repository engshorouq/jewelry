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
                                <a class="nav-link " href="main.php">
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
                            <li class="nav-item ">
                                <a class="nav-link active" href="withdraw_request.php">
                                    <i class="fa fa-fw fa-dollar-sign"></i>Withdraw Request</a>

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
                    <div class="table-users">
                        <h3>Withdraw Request</h3>
                        <table class="table table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Saller</th>
                                    <th></th>
                                    <th>Withdraw Amount</th>
                                    <!--<th></th>-->
                                    <th>Description</th>
                                    <!--<th></th>-->
                                    <th>Date</th>
                                    <!--<th></th>-->
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $withdraw_result = $obj->get_withdraw();
                            //print_r($withdraw_result);
                            foreach ($withdraw_result as $data) {
                                $name_saller = $obj->get_user($data['saller_id']);?>
                                <tr class="data" id='<?=$data["id"]?>'>
                                    <td>
                                        <?php echo $name_saller[0]['first_name'].' '.$name_saller[0]['last_name'];
                           ?>
                                    <td>
                                    <td>
                                        <?=$data['amount']?>
                                    </td>
                                    <td>
                                        <?=$data['description']?>
                                    </td>
                                    <td>
                                        <?=$data['date']?>
                                    </td>
                                    <td>
                                        <?php 
                                        if($data['status']==='pending'){
                                            ?>
                                        <a href="javascript:pendingRequest(0)" class="btn btn-danger pending">reject</a>
                                        <a href="javascript:pendingRequest(1)" class="btn btn-info pending">accept</a>
                                        <?php
                                        }else{
                                           ?>
                                        <span class="btn btn-info">
                                            <?=$data['status']?></span>
                                        <?php }
                                        ?>
                                    </td>
                                </tr>
                                <?php }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!--==============================================================-->
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
    <script>
    $('.pending').click(function(e) {
        e.target.classList.add('done');
    });

    function pendingRequest(type) {
        let id = $('.done').parent().parent().attr('id');
        let status;
        if (type == 0) {
            $('.done').parent().html('<span class="btn btn-info">reject</span>');
            status = "reject";
        } else {
            $('.done').parent().html('<span class="btn btn-info">accept</span>');
            status = "accept";
        }
        $.ajax({
            url: "core/edit_withdraw.php",
            type: "POST",
            async: false,
            data: {
                "id": id,
                "type": status
            },
            success: function(data) {
                console.log(data);
            }
        });
    }
    </script>
</body>

</html>