<?php 
session_start();
if(!isset($_SESSION['login_id']) or empty($_SESSION['login_id'])){
    die();
}
include_once("core/admin.class.php");
        $obj=new admin();
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
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/admin_img/<?=$data['photo']?>" alt="" class="user-avatar-md rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?= $data['first_name']." ".$data['last_name'];?></h5>
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
                                <a class="nav-link active" href="category.php">
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
                <div class="container-fluid dashboard-content products">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>Categories</p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <a href="javascript:add_category();" class="btn btn-danger" id="add_cat"><i class="fa fa-plus"></i>
                                Add Category</a>
                        </div>
                    </div>
                    <div class="row" id="display_cat">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 container">
                            <div class="img_cont">
                                <img src="assets/category_img/products.png" alt="category image" class="img-thumbnail cat_img">
                            </div>
                            <div class="content">
                                
                                <a href="product.php?data=<?php echo 0 ?>" class="">
                                    <i class="fa fa-list"></i></a>
                                <p>
                                    All Producs
                                </p>

                            </div>
                        </div>
                        <?php 
                        $data = $obj->display_cat();
                        if($data != null){
                        foreach($data as $ydata){?>


                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 container" data-id="<?php echo $ydata['id']?>">
                            <div class="img_cont">
                                <img src="assets/category_img/<?php echo $ydata['photo'] ?>" alt="category image" class="img-thumbnail cat_img">
                            </div>
                            <div class="content">
                                <a href="javascript:delete_category(<?php echo $ydata['id']?>,'<?php echo $ydata['name'] ?>');"
                                    class="">
                                    <i class="fa fa-trash"></i> </a>
                                <a href="javascript:edit_category(<?php echo $ydata['id']?>,'<?php echo $ydata['photo'] ?>','<?php echo $ydata['name'] ?>');"
                                    class="">
                                    <i class="fa fa-edit"></i></a>
                                <a href="product.php?data=<?php echo $ydata['id']?>" class="">
                                    <i class="fa fa-list"></i></a>
                                <p>
                                    <?php echo $ydata['name'] ?>
                                </p>

                            </div>
                        </div>

                        <?php  } }
                        ?>


                    </div>
                </div>
            </div>

            <!-- Add Category -->
            <div class="modal fade" id="add_category" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
                    <div class="modal-content" style=" height: 250px !important;overflow:visible;">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"> <i class="fa fa-plus"></i> Add Category</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="target" action="" method="post">
                                <fieldset>

                                    <div class="form-group">
                                        <label class="control-label">Catergory Name :</label>
                                        <input type="text" name="cat_name" id="cat_name" class="form-control" required>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="File" name="file" required>
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                    </div>
                                    <div class="btn_group">
                                        <input type="submit" name="add" class="btn btn-primary" value="Add Category">

                                        <button type="button" class="btn btn-cont" data-dismiss="modal">Cancel</button>
                                    </div>
                                </fieldset>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Edit Category-->

            <div class="modal fade" id="edit_category" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
                    <div class="modal-content" style=" height: 295px !important;overflow:visible;">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"> <i class="fa fa-edit"></i> Edit Category</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="edit_form" action="" method="post">
                                <fieldset>
                                    <input type="hidden" id="cat_id" name="cat_id" value="">
                                    <input type="hidden" id="flag" name="flag" value="1">
                                    <div class="form-group">
                                        <label class="control-label">Catergory Name :</label>
                                        <input type="text" name="cat_name" id="edit_cat_name" class="form-control"
                                            value="">
                                    </div>
                                    <span>category image </span>
                                    <img src="" id="pic_cat" alt="category photo" class="img-thumbnail pic_cat">
                                    <div class="custom-file">

                                        <input type="file" class="custom-file-input" id="edit_file" name="file">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                    </div>
                                    <div class="btn_group">
                                        <input type="submit" name="add" class="btn btn-primary" value="edit Category">

                                        <button type="button" class="btn btn-cont" data-dismiss="modal">Cancel</button>
                                    </div>
                                </fieldset>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Delete OF Category-->
            <!-- The Modal -->
            <div class="modal fade" id="cat_delete" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
                    <div class="modal-content" style=" height: 250px !important;overflow:visible;">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"> <i class="fa fa-trash"></i> Delete cat</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form name="formAdd" id="cat_form_delete" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <fieldset>

                                    <input type="hidden" class="cat_id_del" name="cat_id_del" id="cat_id_del" value="">


                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">Are You Sure To Delete <span id="cat_name_del"></span>
                                            ?</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-6 col-lg-offset-2">

                                            <button type="submit" name="submit_delete" data-dismiss="modal" id="submit_delete"
                                                class="btn btn-primary">Delete
                                            </button>
                                            <button type="button" class="btn btn-cont" data-dismiss="modal">Cancel</button>

                                        </div>
                                    </div>
                                </fieldset>
                            </form>
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

    <script>

        $('#target').submit(function (e) {
            e.preventDefault();
            var formdata = new FormData(this);
            //alert(data.get('file').name);
            $.ajax({
                url: "core/add_category.php",
                type: "POST",
                async: false,
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#add_category').modal('hide');
                    $('#display_cat').html('');
                    $('#display_cat').html(data);

                }
            });
        });

        $('#edit_form').submit(function (e) {
            e.preventDefault();
            var id_cat = $('#cat_id').val();
            var formdata = new FormData(this);
            $.ajax({
                url: "core/edit_category.php",
                type: "POST",
                async: false,
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#edit_category').modal('hide');
                    $('.select_cat').html('');
                    $('.select_cat').html(data);
                    $('div[data-id="' + id_cat + '"]').removeClass('select_cat');
                }
            });
        });

        $('#submit_delete').click(function () {
            var id = $('#cat_id_del').val();
            $.ajax({
                url: "core/delete_category.php",
                type: "POST",
                async: false,
                data: {
                    "done": 1,
                    "id": id
                },
                success: function (data) {
                    $('.select_user').closest('div').remove();
                }
            })
        });

        $('input[id="edit_file"]').on('change', function() {
            $('#flag').val('2');
        });

        function add_category() {
            $('#cat_name').val('');
            $('#file').val('');
            $('#add_category').modal();
        }
        function edit_category(id, photo, name) {
            $('#pic_cat').attr('src', 'assets/category_img/' + photo);
            $('#cat_id').val(id);
            $('#edit_cat_name').val(name);
            $('#flag').val('1');
            $('div[data-id="' + id + '"]').removeClass('select_cat');
            $('div[data-id="' + id + '"]').addClass('select_cat');
            $('#edit_category').modal();
        }
        function delete_category(id, name) {
            $('div[data-id="' + id + '"]').removeClass('select_user');
            $('div[data-id="' + id + '"]').addClass('select_user');
            $('#cat_id_del').val(id);
            $('#cat_name_del').html(name);
            $('#cat_delete').modal();
        }
    </script>
</body>

</html>