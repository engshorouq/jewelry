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
    <header>
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
                <li><a href="all_products.php?data=0">Products</a></li>
                <li><a href="all_stores.php">Stores</a></li>
                <li><a href="all_product_cat.php">Categories</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_customer.php">Contact</a></li>
            </ul>
        </div>
    </nav>
    <!-- Start of Sign up form-->
    <div class="container_signup">
        <h2>Create Account</h2>
        <p> Already have an account ? <a href="login.php" target="_blank">login</a></p>
        <form class="signup_form" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name"
                    required autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"
                    required autocomplete="off">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required
                    autocomplete="off">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="number" id="number" placeholder="Phone Number Start With 05-"
                    pattern="[0-9]{10}" required autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                    required autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password"
                    required autocomplete="off">
            </div>
            <!-- the div if the password and confirm password not matches-->
            <div id="error_msg_pass">

            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="customRadio" name="type" value="saller">
                <label class="custom-control-label" for="customRadio" style="margin-right: 91%;">Saller</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="customRadio2" name="type" value="customer">
                <label class="custom-control-label" for="customRadio2" style="margin-right: 90%;">Customer</label>
            </div>
            <button type="submit" class="btn btn-primary" id="signup_btn" name="submit">Create Account</button>
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
    $('.signup_form').submit(function(e) {
        e.preventDefault();
        let confirm_password = document.getElementById('confirm_password').value;
        let password = document.getElementById('password').value;
        if (confirm_password === password) {
            $('#error_msg_pass').html('');
            var formdata = new FormData(this);
            $.ajax({
                url: "core/add_user.php",
                type: "POST",
                async: false,
                data: formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data === "true") {
                        window.location.href = "login.php";
                    } else {
                        $('#error_msg').html(
                            '<p style="color:red; margin-to:10px;"><i class="fa fa-exclamation-circle"></i> This User Is olready exist .... !!'
                        );
                    }
                }
            });
        } else {
            $('#error_msg_pass').html(
                '<p style="color:red;"><i class="fa fa-exclamation-circle"></i> The password and confirm password not matches !!</p>'
            )
        }
    });
    </script>
</body>

</html>