<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/style/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/bootstrap/css/bootstrap.min.css"/>
    

</head>
<body class="content_logo">

 <img src="assets/img/logo.jpg" alt="logo" class="logo">   
<div class="container_logo">
  
  <form name="form_login" method="post" id="form_login" enctype="multipart/form-data" >
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="assword" placeholder="Enter password" required>
    </div>
    <div class="custom-control custom-checkbox mb-3">
      <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
      <label class="custom-control-label" for="customCheck">Remember Me</label>
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block" name="send">Submit</button>
  </form>

<?php
if(isset($_POST['send'])){
    include_once("core/admin.class.php");
    $obj=new admin();
    $xdata=$obj->check_login($_POST['email'],$_POST['password']);
    if($xdata != NULL){
      $_SESSION['login_id']=$xdata['id'];
        $_SESSION['login_first_name']=$xdata['first_name'];
        $_SESSION['login_last_name']=$xdata['last_name'];
        header("location:main.php");
    }else{
       ?> <p style="color:red;">Please Enter Correct Email and Password</p><?php 
    }
}
?>
</div>
    <script src="assets//jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>

</body>
</html>