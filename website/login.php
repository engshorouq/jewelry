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
        <div class="row" style="background: lightgoldenrodyellow;">
            <div class="col-col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                <img src="../assets/img/logo.png" alt="logo" class="logo-header">
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
    <!--Start of Nav-->
    <nav>
        <div class="row" id="row">
                <ul class="ul_nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Stores</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
        </div>
    </nav>
<!-- Start of Sign up form-->
    <div class="container_signup">
        <h2 style="margin-bottom: 30px;">Login</h2>
        <form class="login_form" method="post">
            
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required autocomplete="off">
            </div>
 
            <button type="submit" class="btn btn-primary" id="signup_btn" name="submit">Log in</button>
            <!-- div for user already exists-->
            <div id="error_msg">

            </div>
        </form>
    </div>
    <!--Start of footer-->
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
        $('.login_form').submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: "core/login.php",
                type: "POST",
                async: false,
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if(data==="false"){
                        $('#error_msg').html('<p style="color:red; margin-top:20px;"><i class="fa fa-exclamation-circle"></i> Make Sure From Your Email And Password</p>');
                    }else{
                        if(data==='saller'){
                            window.location.href="saller_index.php";
                        }else{
                            window.history.back();
                        }   
                    }
                }
            });
        });
    </script>
</body>
</html>