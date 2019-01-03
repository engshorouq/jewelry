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
                <form class="form-inline form-search" name="Search" method="post" enctype="multipart/form-data">

                    <div class="form-group" style="display: grid">
                        <?php if($_GET['data']!=0){?>
                    <a href="javascript:add_product();" class="btn btn-danger" id="add_cat" style="margin-bottom: 10px;"><i class="fa fa-plus"></i>
                                Add Product</a>
                                
                        <?php } ?>
                        
                        <input type="search" class="form-control search-text" id="search" placeholder="Search ..."
                            name="text">


                    </div>
                </form>
                <div class="table-users">
                        <table class="table table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>photo</th>
                                    <th>Product Name</th>
                                    <th>Product No.</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>delete<th>
                                </tr>
                            </thead>
                            <tbody id="result_search">
                                <?php
                                $result_product = $obj->display_products($_GET['data']);
                                if($result_product!= null){
                                foreach ($result_product as $ydata) {?>
                                    <tr data-id="<?php echo $ydata['id'] ?>">

                                        <td class="img"><img src="../assets/product_img/<?=$ydata['photo']?>" alt="personal photo" class="img-thumbnail rounded-circle product_img" id="personal-photo"></td>
                                        <td class="name"><?=$ydata['name'];?></td>
                                        <td class="number"><?=$ydata['number'];?></td>
                                        <td class="cat_name" data='<?=$ydata['cat_id']?>'><?php 
                                            $result = $obj->get_category_name($ydata['cat_id']);
                                            foreach($result as $row){
                                                echo $row['name'];
                                            }
                                        ?></td>
                                        <td class="gold_weight" hidden><?=$ydata['gold_weight'];?></td>
                                        <td class="gold_kerat" hidden><?=$ydata['gold_kerat'];?></td>
                                        <td class="manuf" hidden><?=$ydata['manuf'];?></td>
                                        <td><?=($ydata['gold_weight']*$obj->get_price($ydata['gold_kerat'])+$ydata['manuf']); ?> $</td>
                                        <td>
                                            <a href="javascript:delete_product(<?php echo $ydata['id'] ?>);" class="btn btn-danger">delete</a>
                                            <a href="javascript:edit_product(<?php echo $ydata['id'] ?>);" class="btn btn-info">edit</a>
                                            </td>

                                   </tr>
                                  <?php }
                                  }else{?>
                                      <tr><?php echo "No Products";?></tr>
                                 <?php }?>
                            </tbody>
                        </table>
                </div>

                </div>
            </div>
        </div>   
        
            <!-- Add Strore -->
            <div class="modal fade" id="add_product" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style=" height: 80% !important;padding-top:1%;">
                    <div class="modal-content" style=" height: 560px !important;overflow:visible;">

                        <!-- Modal Header -->
                        <div class="modal-header" style="padding-bottom: 27px;">
                            <h4 class="modal-title"> <i class="fa fa-plus"></i> Add Product</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="target" action="" method="post" class="form-inline">
                                <fieldset>

                                    <div class="form-group">
                                        <label class="control-label">Product Name :</label>
                                        <input type="text" name="product_name" id="product_name" placeholder="Product Name" style="width: 19rem;margin-left: 21px;" class="form-control" required autocomplete="off">
                                    </div>
                                    <input type="hidden" id="store_id" name="store_id" value="<?=$_GET['data']?>">
                                    <div class="form-group">
                                        <label class="control-label">Product No:</label>
                                        <input type="text" name="number" id="number" placeholder="Product Number" style="margin-left: 48px;width: 19rem;" class="form-control" pattern="[0-9]{10}" required autocomplete="off">
                                    </div>

                                    <div class="custom-file form-group">
                                        <input type="file" class="custom-file-input" id="file" name="file" required autocomplete="off">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" style="margin-top: 10px;">Gold Weight:</label>
                                        <input type="number" name="weight" id="weight" placeholder="Gold weight" style="width: 18rem;margin-left: 49px;" class="form-control" step="0.01" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gold Manufactor:</label>
                                        <input type="number" name="manuf" id="manuf" placeholder="Gold Manufactor" style="width: 18rem;" class="form-control" step="0.01"  required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="gold_kerat">Choose Gold Kerat:</label>
                                        <select class="form-control" name="gold_kerat" id="gold_kerat" required>
                                            <option value="24">24</option>
                                            <option value="22">22</option>
                                            <option value="21">21</option>
                                            <option value="18">18</option>
                                            <option value="14">14</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gold_cat">Gold Category:</label>
                                        <select class="form-control" id="gold_cat" name="gold_cat" style=" margin-left: 47px;" required>
                                            <?php $result = $obj->category_names();
                                            foreach($result as $cat) {?>
                                            <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="btn_group">
                                        <input type="submit" name="add" class="btn btn-primary" value="Add Product">

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
            <div class="modal fade" id="product_delete" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style=" height: 80% !important;padding-top:10%;">
                    <div class="modal-content" style=" height: 250px !important;overflow:visible;">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title"> <i class="fa fa-trash"></i> Delete Product</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form name="formAdd" id="store_form_delete" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <fieldset>

                                    <input type="hidden" class="product_id_del" name="product_id_del" id="product_id_del" value="">


                                    <div class="form-group">
                                        <label class="col-lg-6 control-label">Are You Sure To Delete Product ?</label>
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

                        <!-- Edit product-->

            <div class="modal fade" id="edit_product" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style=" height: 80% !important;">
                    <div class="modal-content" style=" height: 650px !important;overflow:visible;">

                        <!-- Modal Header -->
                        <div class="modal-header" style="padding-bottom: 27px;">
                            <h4 class="modal-title"> <i class="fa fa-edit"></i> Edit Product</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                        <form id="edit_product_form" action="" method="post" class="form-inline">
                                <fieldset>

                                    <div class="form-group">
                                        <label class="control-label">Product Name :</label>
                                        <input type="text" name="product_name" id="edit_product_name" placeholder="Product Name" style="width: 19rem;margin-left: 21px;" class="form-control" required autocomplete="off">
                                    </div>
                                    <input type="hidden" id="edit_store_id" name="store_id" value="<?=$_GET['data']?>">
                                    <input type="hidden" id="edit_product_id" name="product_id" value="">
                                    <div class="form-group">
                                        <label class="control-label">Product No:</label>
                                        <input type="text" name="number" id="edit_number" placeholder="Product Number" style="margin-left: 48px;width: 19rem;" class="form-control" pattern="[0-9]{10}" required autocomplete="off">
                                    </div>
                                    <span>category image </span>
                                    <img src="" id="pic_product" alt="product photo" class="img-thumbnail pic_cat">
                                   <input type="hidden" id="flag" value="1" name="flag">
                                    <div class="custom-file form-group">
                                        <input type="file" class="custom-file-input" id="edit_file" name="file" autocomplete="off">
                                        <label class="custom-file-label" for="customFile">Choose Image</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" style="margin-top: 10px;">Gold Weight:</label>
                                        <input type="number" name="weight" id="edit_weight" placeholder="Gold weight" style="width: 18rem;margin-left: 49px;" class="form-control" step="0.01" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Gold Manufactor:</label>
                                        <input type="number" name="manuf" id="edit_manuf" placeholder="Gold Manufactor" style="width: 18rem;" class="form-control" step="0.01"  required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="gold_kerat">Choose Gold Kerat:</label>
                                        <select class="form-control" name="gold_kerat" id="edit_gold_kerat" required>
                                            <option value="24">24</option>
                                            <option value="22">22</option>
                                            <option value="21">21</option>
                                            <option value="18">18</option>
                                            <option value="14">14</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gold_cat">Gold Category:</label>
                                        <select class="form-control" id="edit_gold_cat" name="gold_cat" style=" margin-left: 47px;" required>
                                            <?php $result = $obj->category_names();
                                            foreach($result as $cat) {?>
                                            <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="btn_group">
                                        <input type="submit" name="add" class="btn btn-primary" value="Edit Product">

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

/**to display popup edit product */
    
    function edit_product(id){
        $('#edit_product_name').val($('tr[data-id="'+id+'"]').children('.name').text());
        $('#edit_weight').val($('tr[data-id="'+id+'"]').children('.gold_weight').text());
        $('#edit_manuf').val($('tr[data-id="'+id+'"]').children('.manuf').text());
        $('#edit_number').val($('tr[data-id="'+id+'"]').children('.number').text());
        $('#edit_gold_kerat').val($('tr[data-id="'+id+'"]').children('.gold_kerat').text());
        $('#edit_gold_cat').val($('tr[data-id="'+id+'"]').children('.cat_name').attr('data'));
        $('#edit_file').val('');
        $('#edit_product_id').val($('tr[data-id="'+id+'"]').attr('data-id'));
        $('#pic_product').attr('src',$('tr[data-id="'+id+'"]').find('.product_img').attr('src'));
        $('#flag').val('1');
        $('tr').removeClass('select_product');
        $('tr[data-id="' + $('tr[data-id="'+id+'"]').attr('data-id') + '"]').addClass('select_product');
        $('#edit_product').modal();
    }

    $('#search').keyup(function () {
            var text = $(this).val();
            let id = $('#store_id').val();
            $('#result_search').html('');
            $.ajax({
                url: "core/search_product.php",
                type: "POST",
                async: false,
                data: { 
                    "search": text ,
                    "id" : id
                    },
                success: function (data) {
                    //alert(data);
                    $('tbody').html(data);
                }
            })

        });

    $('#target').submit(function(e){
        e.preventDefault();
            var formdata = new FormData(this);
            $.ajax({
                url: "core/add_product.php",
                type: "POST",
                async: false,
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                   $('#add_product').modal('hide');
                   $('#result_search').html('');
                   $('#result_search').html(data);

                }
            });
    });

    $('#submit_delete').click(function(e){
        let id = $('#product_id_del').val();
        $.ajax({
                url: "core/delete_product.php",
                type: "POST",
                async: false,
                data: {
                    "done": 1,
                    "id": id
                },
                success: function (data) {
                    $('.select_product').closest('tr').remove();
                }
            })
    });

    $('#edit_product_form').submit(function (e) {
            e.preventDefault();
            let id = $('#edit_product_id').val();
            var formdata = new FormData(this);
            $.ajax({
                url: "core/edit_product.php",
                type: "POST",
                async: false,
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#edit_product').modal('hide');
                    $('.select_product').html('');
                    $('.select_product').html(data);
                    $('tr[data-id="' + id + '"]').removeClass('select_product');
                }
            });
    });

    $('input[id="edit_file"]').on('change', function() {
            $('#flag').val('2');
        });

    function delete_product(id){
        $('tr').removeClass('select_product');
        $('tr[data-id="' + id + '"]').addClass('select_product');
        //$('tr[data-id="' + id + '"]').attr('onclick','');
        $('#product_id_del').val(id);
        $('#product_delete').modal();


    } 

    function add_product(){
        $('#product_name').val('');
        $('#weight').val('');
        $('#manuf').val('');
        $('#number').val('');
        $('#gold_kerat').val('');
        $('#gold_cat').val('');
        $('#file').val('');
        $('#add_product').modal();
    }
   
</script>

</html>