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
                <li><a href="all_products.php?data=0">Products</a></li>
                <li><a href="all_stores.php">Stores</a></li>
                <li><a href="all_product_cat.php">Categories</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>
    <article class="">
        <section class="display_products">
            <div class="category_list">
                <?php $result = $obj->category_names();
                    foreach ($result as $ydata) {?>
                <a href="javascript:display_product(<?=$ydata['id']?>)" class="cat_name">
                    <?=$ydata['name']?></a>
                <?php
                    }
                ?>
                <div class="row" id="display_product">
                    <?php $result_product = $obj->product_category($result[0]['id']);
                    foreach ($result_product as $pdata) {?>

                    <div class="col-col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 product_card_div">

                        <img src="../assets/product_img/<?=$pdata['photo']?>" alt="product image" class="img-thumbnail">
                        <p>
                            <?=$pdata['name']?>
                        </p>
                        <span>
                            <?=($pdata['gold_weight']*$obj->get_price($pdata['gold_kerat'])+$pdata['manuf']); ?> $</span>
                        <a href="product_cart.php?data=<?=$pdata['id']?>" class="book">Book It</a>
                    </div>
                    <?php
                    }
                ?>

                </div>

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
    function display_product(id) {
        $.ajax({
            url: "core/product_category.php",
            type: "POST",
            async: false,
            data: {
                "id": id
            },
            success: function(data) {
                $('#display_product').html('');
                $('#display_product').html(data);
            }
        });
    }
    </script>
</body>

</html>