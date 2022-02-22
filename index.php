<?php
include_once 'AppManager.php';
$pm = AppManager::getPM();
$register = $pm->fetchResult("SELECT * FROM register");
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from www.bylancer.com/product/byadmin/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Jan 2017 19:07:07 GMT -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Byadmin - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="Bylancer">
        <meta name="keyword" content="Byadmin, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="assests/img/favicon.png">

        <title>Puttalam |Zahira primary School </title>

        <!-- Bootstrap CSS -->    
        <link href="assests/css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="assests/css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="assests/css/elegant-icons-style.css" rel="stylesheet" />
        <link href="assests/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="assests/css/style.css" rel="stylesheet">
        <link href="assests/css/style-responsive.css" rel="stylesheet" />
        <link href="assests/css/animate.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assests/plugins/bootstrap-datepicker/css/datepicker.css" />
        <link href="assests/css/mycss.css" rel="stylesheet">


    </head>

    <body class="login-img2-body">


        <?php if (empty($register)) { ?>
            <form class="login-form reg" id="frmregister2"  >
                <div class="login-wrap">
                    <p class="login-img"><i class="icon_lock_alt"></i></p>    
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input type="text" class="form-control" placeholder="Username" autofocus="" name="username">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" class="form-control" placeholder="Password" name="password1">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input type="password" class="form-control" placeholder=" Retype Password" name="password2">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-suitcase"></i></span>
                        <input type="text" class="form-control" placeholder=" Occupation" name="occupation">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-building"></i></span>
                        <input type="text" class="form-control" placeholder=" City" name="city">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-star"></i></span>
                        <input id="dp1" type="text" class="form-control" placeholder=" D.O.B" name="dob">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-mobile-phone"></i></span>
                        <input type="text" class="form-control" placeholder=" Mobile" name="mobile">
                    </div>
                    <button class="btn btn-primary btn-lg btn-block"  id="btnregister2">Register</button>
                    <div id="divError" style="display:none;" class="btn btn-danger" >

                    </div>
                </div>
            </form>
        <?php } else {
            ?>
            <div class="container animated fadeInLeftBig">
                <form class="login-form"  id="formlogin" >        

                    <div class="login-wrap">
                        <p class="login-img"><i class="icon_lock_alt"></i></p>
                        <div id="divError" style="display:none;" class="btn btn-danger editerr1" >

                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon_profile"></i></span>
                            <input type="text" class="form-control"style="color: black;" placeholder="Username" autofocus name="username">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                            <input type="password" class="form-control"style="color: black;" placeholder="Password" name="password">
                        </div>
                        <input type="hidden" class="form-control"  name="occupation">
                        <input type="hidden" class="form-control"  name="city">
                        <input type="hidden" class="form-control"  name="dob">
                        <input type="hidden" class="form-control"  name="mobile">

                        <a class="btn btn-primary edit1" id="btnlogin" type="submit">Login</a>


                    </div>
                </form>
            </div>
        <?php } ?>

        <script src="assests/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="assests/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assests/js/form-component.js"></script>
        <script  type="text/javascript" src="assests/js/myjs.js"></script>
    </body>

    <!-- Mirrored from www.bylancer.com/product/byadmin/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Jan 2017 19:07:07 GMT -->
</html>
