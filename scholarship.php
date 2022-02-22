<?php
 session_start();
  if (!array_key_exists("login_user_id", $_SESSION)) {
  header("location: index.php");
  } 
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from www.bylancer.com/product/byadmin/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Jan 2017 19:06:42 GMT -->
    <head>
        <?php include 'fragmants/head.php'; ?>
        <title>SCHOLARSHIP </title>
    </head>

    <body>
        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->
            <header class="header white-bg">           
                <?php include 'fragmants/header.php'; ?>
            </header>
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <?php include 'fragmants/aside.php'; ?>
            </aside>
            <!--sidebar end-->

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <!-- page start-->
                    <div class="col-lg-12">
                        <h3 class="page-header size3"><i class="icon_pencil"></i>SCHOLARSHIP FORM</h3>
                    </div>
                    <div class="form">
                        <form class="form-validate form-horizontal" id="feedback_form" method="post"  action="addscholarship.php" novalidate="novalidate">
                            <div class="form-group edit4">
                                <label for="cname" class="control-label col-lg-2 edit3">Year</label>
                                <div class="col-lg-3">
                                    <input class="form-control edit2" id="cname" name="year" minlength="5" type="text" required="">
                                </div>
                            </div>
                            <div class="form-group edit4 ">
                                <label for="cemail" class="control-label col-lg-2 edit3">Cut Off</label>
                                <div class="col-lg-3">
                                    <input class="form-control edit2" id="cemail" type="text" name="cutoff" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-default" type="button">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
        </section>
        <!-- container section end -->
        <?php include 'fragmants/script.php'; ?>


    </body>

    <!-- Mirrored from www.bylancer.com/product/byadmin/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Jan 2017 19:06:42 GMT -->
</html>
