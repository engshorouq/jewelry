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
                <li><a href="contact_customer.php">Contact</a></li>
            </ul>
        </div>
    </nav>
    <article class="main_card">
        <section class="product_card">
            <div class="row">
                <div class="col-col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"></div>
                <?php
                $result=$obj->product_information($_GET['data']);
                foreach ($result as $ydata) {?>
                <div class="col-col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                    <img src="../assets/product_img/<?=$ydata['photo']?>" alt="product image" class="img-thumbnail">
                </div>
                <div class="col-col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 card_info">
                    <form id="product_card_form" method="POST">
                        <p>Product Name &nbsp;&nbsp;&nbsp;&nbsp; : </p><span>
                            <?=$ydata['name']?></span><br><br>
                        <p>Product Store &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </p>
                        <span>
                            <?=$obj->get_store_name($ydata['store_id'])?></span><br><br>
                        <p>Product Category : </p><span>
                            <?php
                        $category=$obj->get_category_name($ydata['cat_id']);
                        foreach ($category as  $cat_data) {
                            echo $cat_data['name'];
                        }?></span><br><br>
                        <p>Product Weight &nbsp;&nbsp;&nbsp;: </p><span>
                            <?=$ydata['gold_weight']?>g</span><br><br>
                        <p>Product Kerat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
                        <span>
                            <?=$ydata['gold_kerat']?> kerat</span><br><br>
                        <p>Product Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </p>
                        <input type="hidden" name="product_name" value="<?=$ydata['name']?>">
                        <input type="hidden" name="product_id" value="<?=$ydata['id']?>">
                        <input type="hidden" name="price" value="<?=($ydata['gold_weight']*$obj->get_price($ydata['gold_kerat'])+$ydata['manuf']); ?>">
                        <span>
                            <?=($ydata['gold_weight']*$obj->get_price($ydata['gold_kerat'])+$ydata['manuf']); ?> $</span><br><br>
                        <span>Size&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span>
                        <input type="number" step="1" name="size" class="size" required><br>
                        <br><span>Quantity : </span>
                        <input type="number" step="1" name="quantity" class="quantity" required>
                        <input type="submit" value="Add To Card" name="send" id="send">
                    </form>
                </div>

                <?php    }
            ?>
            </div>

        </section>
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
    /*for add iin the shopping card */
    $('#product_card_form').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: "core/add_card.php",
            type: "POST",
            async: false,
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('.num_card').html(data);
            }
        });
    });
    </script>
</body>

</html>