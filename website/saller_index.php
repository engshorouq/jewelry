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
                                <a class="nav-link active" href="saller_index.php">
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
                <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <p>Stors</p>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <a href="javascript:add_store();" class="btn btn-danger" id="add_cat"><i class="fa fa-plus"></i>
                                Create store</a>
                        </div>
                    </div>
                    <div class="row" id="display_cat">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 container">
                            <div class="img_cont">
                                <img src="../assets/category_img/products.png" alt="category image" class="img-thumbnail cat_img">
                            </div>
                            <div class="content">
                                
                                <a href="products.php?data=<?php echo 0 ?>" class="">
                                    <i class="fa fa-list"></i></a>
                                <p>
                                    All Producs
                                </p>

                            </div>
                        </div>
                        <?php $result = $obj->display_store();
                            foreach ($result as $ydata) {?>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 container" data-id="<?=$ydata['id']?>">
                                    <div class="img_cont">
                                    <img src="stores_img/<?=$ydata['image']?>" alt="store image" class="img-thumbnail cat_img">
                                    </div>
                                    <div class="content">
                                    <a href="javascript:delete_store(<?=$ydata['id']?>,'<?=$ydata['name']?>');" class="">
                                    <i class="fa fa-trash"></i> </a>
                                    <a href="javascript:edit_store(<?=$ydata['id']?>,'<?=$ydata['image']?>','<?=$ydata['name']?>','<?=$ydata['address']?>','<?=$ydata['mobile']?>','<?=$ydata['f_link']?>','<?=$ydata['g_link']?>');" class="">
                                    <i class="fa fa-edit"></i></a>
                                        <a href="products.php?data=<?=$ydata['id']?>" class="">
                                        <i class="fa fa-list"></i></a>
                                        <p><?=$ydata['name']?></p>
                                    
                                    </div>
                                </div>
                          <?php  }
                        ?>
                    </div>
                </div>
            </div>
        </div>   
        
            <!-- Add Strore -->
            <div class="modal fade" id="create_store" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style=" height: 80% !important;padding-top:1%;">
                    <div class="modal-content" style=" height: 590px !important;overflow:visible;">

                        <!-- Modal Header -->
                        <div class="modal-header" style="padding-bottom: 27px;">
                            <h4 class="modal-title"> <i class="fa fa-plus"></i> Create Store</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="target" action="" method="post">
                                <fieldset>

                                    <div class="form-group">
                                        <label class="control-label">Store Name :</label>
                                        <input type="text" name="store_name" id="store_name" placeholder="Store Name" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Store Address :</label>
                                        <input type="text" name="address" id="address" placeholder="Store Address" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Mobile No:</label>
                                        <input type="tel" name="mobile" id="mobile" placeholder="Mobile Number" class="form-control" pattern="[0-9]{10}" required autocomplete="off">
                                    </div>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file" required autocomplete="off">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" style="margin-top: 10px;">Facebook Link:</label>
                                        <input type="url" name="f_link" id="f_link" placeholder="Facebook Link" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Google Link:</label>
                                        <input type="url" name="g_link" id="g_link" placeholder="Google Link" class="form-control"  required autocomplete="off">
                                    </div>
                                    <div class="btn_group">
                                        <input type="submit" name="add" class="btn btn-primary" value="Create Store">

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
            <div class="modal fade" id="store_delete" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
                    <div class="modal-content" style=" height: 250px !important;overflow:visible;">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"> <i class="fa fa-trash"></i> Delete Store</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form name="formAdd" id="store_form_delete" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <fieldset>

                                    <input type="hidden" class="store_id_del" name="store_id_del" id="store_id_del" value="">


                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">Are You Sure To Delete <span id="store_name_del"></span>
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

                        <!-- Edit Category-->

            <div class="modal fade" id="edit_store" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style=" height: 80% !important;">
                    <div class="modal-content" style=" height: 650px !important;overflow:visible;">

                        <!-- Modal Header -->
                        <div class="modal-header" style="padding-bottom: 27px;">
                            <h4 class="modal-title"> <i class="fa fa-edit"></i> Edit Category</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="edit_form" action="" method="post">
                                <fieldset>
                                    <input type="hidden" id="store_id" name="store_id" value="">
                                    <input type="hidden" id="flag" name="flag" value="1">
                                    <div class="form-group">
                                        <label class="control-label">Store Name :</label>
                                        <input type="text" name="store_name" id="edit_store_name" placeholder="Store Name" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Store Address :</label>
                                        <input type="text" name="address" id="edit_address" placeholder="Store Address" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Mobile No:</label>
                                        <input type="tel" name="mobile" id="edit_mobile" placeholder="Mobile Number" class="form-control" pattern="[0-9]{10}" required autocomplete="off">
                                    </div>

                                    <span>store image </span>
                                    <img src="" id="pic_store" alt="store photo" class="img-thumbnail pic_cat">
                                    <div class="custom-file">

                                        <input type="file" class="custom-file-input" id="edit_file" name="file">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" style="margin-top: 10px;">Facebook Link:</label>
                                        <input type="url" name="f_link" id="edit_f_link" placeholder="Facebook Link" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Google Link:</label>
                                        <input type="url" name="g_link" id="edit_g_link" placeholder="Google Link" class="form-control"  required autocomplete="off">
                                    </div>
                                    <div class="btn_group">
                                        <input type="submit" name="add" class="btn btn-primary" value="edit Store">

                                        <button type="button" class="btn btn-cont" data-dismiss="modal">Cancel</button>
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
                            <span><a href="#"><i class="fab">&#xf09a;</i></a></span>
                            <span><a href="#"><i class="fab">&#xf099;</i></a></span>
                            <span><a href="#"><i class="fab">&#xf08c;</i></a></span>
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
    $('#target').submit(function(e){
        e.preventDefault();
            var formdata = new FormData(this);
            $.ajax({
                url: "core/add_store.php",
                type: "POST",
                async: false,
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#create_store').modal('hide');
                   $('#display_cat').html('');
                   $('#display_cat').html(data);

                }
            });
    });

    $('#submit_delete').click(function(e){
        let id = $('#store_id_del').val();
        $.ajax({
                url: "core/delete_store.php",
                type: "POST",
                async: false,
                data: {
                    "done": 1,
                    "id": id
                },
                success: function (data) {
                    $('.select_store').closest('div').remove();
                }
            })
    });

    $('#edit_form').submit(function (e) {
            e.preventDefault();
            let id_store = $('#store_id').val();
            var formdata = new FormData(this);
            $.ajax({
                url: "core/edit_store.php",
                type: "POST",
                async: false,
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#edit_store').modal('hide');
                    $('.select_store').html('');
                    $('.select_store').html(data);
                    $('div[data-id="' + id_store + '"]').removeClass('select_store');
                }
            });
        });

    $('input[id="edit_file"]').on('change', function() {
            $('#flag').val('2');
        });

    function edit_store(id,image,name,address,mobile,f_link,g_link){
        $('div').removeClass('select_store');
        $('div[data-id="' + id + '"]').addClass('select_store');
        $('#store_id').val(id);
        $('#edit_store_name').val(name);
        $('#edit_address').val(address);
        $('#edit_mobile').val(mobile);
        $('#edit_f_link').val(f_link);
        $('#edit_g_link').val(g_link);
        $('#flag').val('1')
        $('#pic_store').attr('src','stores_img/'+image);
        $('#edit_store').modal();


    }

    function delete_store(id,name){
        $('div').removeClass('select_store');
        $('div[data-id="' + id + '"]').addClass('select_store');
        $('#store_id_del').val(id);
        $('#store_name_del').html(name);
        $('#store_delete').modal();


    } 

    function add_store(){
        $('#store_name').val('');
        $('#address').val('');
        $('#mobile').val('');
        $('#f_link').val('');
        $('#g_link').val('');
        $('#file').val('');
        $('#create_store').modal();
    }
   
</script>

</html>