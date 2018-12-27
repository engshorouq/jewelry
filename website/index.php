<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/main.css" />
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <header >
        <div class="row">
            <div class="col-col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                <img src="../assets/img/logo_pho.png" alt="logo" class="logo-header">
            </div>
            <div class="col-col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                
                
                <ul class="ul_header">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">signup</a></li>
                    <li><a href="#"><i class="fab">&#xf09a;</i></a></li>
                    <li><a href="#"><i class="fab">&#xf099;</i></a></li>
                    <li><a href="#"><i class="fab">&#xf08c;</i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
        </div>
    </header>
    <nav>
        <div class="row" id="row">
                <ul class="ul_nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Stores</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
       </div>
    </nav>
    <article>
        <section class="all_products">
            <div class="row">
                <p>New Products, Great <br> Deals</p>
            </div>
            <div class="row">
                <a href="all_products" class="btn"> Shop Now </a>
            </div>
        </section>
    </article>
    <article>
        <section class="new_product">
            <div class="slideshow_container">
                <div class="myslides fade">
                    <img src="../assets/product_img/pro1.jpg" alt="new product">
                </div>
                <div class="myslides fade">
                    <img src="../assets/product_img/pro2.jpg" alt="new product">
                </div>
                <div class="myslides fade">
                    <img src="../assets/product_img/pro3.jpg" alt="new product">
                </div>
                <div class="myslides fade">
                    <img src="../assets/product_img/pro4.png" alt="new product">
                </div>
                <div class="myslides fade">
                    <img src="../assets/product_img/pro5.jpg" alt="new product">
                </div>
                
            </div>
            <div class="dot_container">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
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
        var slideIndex = 0;
        showSlide();
            function showSlide(){
                var i;
                var slides = document.getElementsByClassName('myslides');
                var dots = document.getElementsByClassName('dot');
                for(i = 0; i<slides.length; i++){
                    slides[i].style.display='none';
                }
                for(i = 0; i<dots.length; i++){
                    dots[i].className = dots[i].className.replace(" active","");
                }
                if(slideIndex == slides.length){
                    slideIndex = 0;
                }
                slides[slideIndex].style.display='block';
                dots[slideIndex].className += " active"
                slideIndex++;
                setTimeout(showSlide,3000);
            }
    </script>
</body>
</html>