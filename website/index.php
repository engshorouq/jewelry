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
                <li>
                    <a href="all_stores.php">Categories</a></li>
                </li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>
    <article>
        <section class="all_products">
            <div class="all_products_div">
                <div class="row">
                    <p>New Products, Great <br> Deals</p>
                </div>
                <div class="row">
                    <a href="all_products.php?data=0" class="btn"> Shop Now </a>
                </div>
            </div>
        </section>
    </article>
    <article>
        <section class="new_product" title="new products">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                    <li data-target="#demo" data-slide-to="3"></li>
                    <li data-target="#demo" data-slide-to="4"></li>
                </ul>
                <div class="carousel-inner">
                    <?php 
                    $result = $obj->display_all_products();
                    $counter=1; 
                    foreach ($result as $product_data) {
                        if($counter>5)
                            break;
                        ?>
                    <div class="carousel-item">
                        <a href="product_cart.php?data=<?=$product_data['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$product_data['photo']?>" alt="new product">
                        </a>
                    </div>
                    <?php
                    $counter++;
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

        </section>
        <section class="most_popular_product" title="most popular products">
            <div id="demo2" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <?php 
                    $result = $obj->display_popular_products();
                    ?>
                    <div class="carousel-item active">
                        <a href="product_cart.php?data=<?=$result[0]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[0]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[1]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[1]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[2]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[2]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[3]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[3]['photo']?>" alt="new product">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="product_cart.php?data=<?=$result[4]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[4]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[5]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[5]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[6]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[6]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[7]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[7]['photo']?>" alt="new product">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="product_cart.php?data=<?=$result[8]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[8]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[9]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[9]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[10]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[10]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[11]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[11]['photo']?>" alt="new product">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="product_cart.php?data=<?=$result[12]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[12]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[13]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[13]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[14]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[14]['photo']?>" alt="new product">
                        </a>
                        <a href="product_cart.php?data=<?=$result[15]['id']?>" class="product_cart">
                            <img src="../assets/product_img/<?=$result[15]['photo']?>" alt="new product">
                        </a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#demo2" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo2" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>

        </section>
        <section class="about_us_section" title="about us">
            <div class="about_us">

                <h1>Our Origins</h1>
                <p>How We Got Here</p>
                <img src="../assets/img/about_us.jpg" class="img-thumbnail rounded-circle" alt="image about us">
                <br>
                <p>
                    Since day one , we have been working tirelessly in oreder to expand our product offerings and <br>
                    make
                    our customers experience even better . We have proud of how far we have come , <br>yet remain
                    committed to
                    performing event better.
                    <br>
                    <br>
                    Our collectons are carefully selected . Delivery options and payment method generous and flexable .
                    <br>Browser through our product gallery and experience shopping with Jewelry for yourself . Please<br>
                    don not
                    hesitate to contact us with questions , comments or suggestions .
                </p>
                <a href="about_us.php">Learn more</a>

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
    $('.carousel-inner').children('div').first().attr('class', 'carousel-item active')
    </script>
</body>

</html>