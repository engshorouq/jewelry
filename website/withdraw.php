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
                                        <a href='request.php?data=0' class="list-group-item list-group-item-action">
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
                                <a class="nav-link active" href="withdraw.php">
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
                    <a href="javascript:add_withdraw();" class="btn btn-info" id="add_cat" style="margin-bottom: 10px;"><i class="fa fa-plus"></i>
                                Add Withdraw Request</a>
                        
                        <input type="search" class="form-control search-text" id="search" placeholder="Search ..."
                            name="text">


                    </div>
                </form>
                <div class="table-users">
                        <table class="table table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th></th>
                                    <th>Withdraw Amount</th>
                                    <th></th>
                                    <th>Description</th>
                                    <th></th>
                                    <th>Date</th>
                                    <th></th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="result_search">
                                <?php
                                $result_withdraw = $obj->display_withdraw($_SESSION['user_id']);
                                if($result_withdraw!= null){
                                    $counter=1;
                                    $total_withdraw=0;
                                foreach ($result_withdraw as $ydata) {?>
                                    <tr data-id="<?php echo $ydata['id'] ?>">
                                        <td><?=$counter++;?><td>
                                        <td><?php echo $ydata['amount'];
                                            $total_withdraw+=$ydata['amount'];
                                            ?> $<td>
                                        <td><?=$ydata['description']?><td>
                                        <td><?=$ydata['date']?><td>
                                        <td><?php if($ydata['status']=='pending'){
                                            ?> 
                                            <span class="btn btn-danger"><?=$ydata['status']?></span>
                                       <?php } else{
                                           ?> 
                                           <span class="btn btn-info"><?=$ydata['status']?></span>
                                      <?php
                                       } ?></td>   
                                   </tr>
                                  <?php }
                                  }?>
                                  <tr id="total">
                                      <td>Total Withdraw</td>
                                      <td></td>
                                      <td><?=$total_withdraw?> $</td>
                                  </tr>
                            </tbody>
                        </table>
                </div>

                </div>
            </div>
        </div>   
        
            <!-- Add Strore -->
            <div class="modal fade" id="add_withdraw" tabindex="-1" role="basic" aria-hidden="true">
                <div class="modal-dialog" style=" height: 80% !important;padding-top:1%;">
                    <div class="modal-content" style=" height: 330px !important;overflow:visible;">

                        <!-- Modal Header -->
                        <div class="modal-header" style="padding-bottom: 27px;">
                            <h4 class="modal-title"> <i class="fa fa-plus"></i> Withdraw Request</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="target" action="" method="post" class="form-inline">
                                <fieldset>
                                    <input type="hidden" name="saller_id" id="saller_id" value="<?=$_SESSION['user_id']?>">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-top: 10px;">Amount:</label>
                                        <input type="number" name="amount" id="amount" placeholder="Withdraw Amount" style="width: 18rem;margin-left: 49px;" class="form-control" step="0.01" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Description:</label>
                                        <textarea class="form-control-plaintext" name="description" rows="3" style="padding:10px;border: 1px solid #d2d2e4;" id="description" placeholder="typing your Description ..." required></textarea>
                                        </div>
                                    

                                    <div class="btn_group">
                                        <input type="submit" name="add" class="btn btn-primary" value="Send Request">

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
                url: "core/add_withdraw.php",
                type: "POST",
                async: false,
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                   $('#add_withdraw').modal('hide');
                   $('#result_search').html('');
                   $('#result_search').html(data);

                }
            });
    });

 $('#search').keyup(function () {
            var text = $(this).val();
            let id = $('#saller_id').val();
            $('#result_search').html('');
            $.ajax({
                url: "core/search_withdraw.php",
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



    function add_withdraw(){
        $('#amount').val('');
        $('#description').val('');
        $('#add_withdraw').modal();
    }
   
</script>

</html>