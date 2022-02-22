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
        <title>USER </title>
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
                        <h3 class="page-header size3"><i class="icon_profile"></i>ADD USER</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form">
                            <form class="form-validate form-horizontal" id="frmregister" >
                                <div class="form-group edit4">
                                    <label for="cname" class="control-label col-lg-2 edit3">User Name</label>
                                    <div class="col-lg-6">
                                        <input class="form-control edit2 " id="cname" name="username"  type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group  edit4">
                                    <label for="cemail" class="control-label col-lg-2 edit3">Password</label>
                                    <div class="col-lg-6">
                                        <input class="form-control edit2 " id="cemail" type="password" name="password1" required="">
                                    </div>
                                </div>
                                <div class="form-group edit4">
                                    <label for="curl" class="control-label col-lg-2 edit3">Retype Password</label>
                                    <div class="col-lg-6">
                                        <input class="form-control edit2" id="cname" name="password2"  type="password" required="">
                                    </div>
                                </div>
                                <div class="form-group edit4">
                                    <label for="cname" class="control-label col-lg-2 edit3">Occupation</label>
                                    <div class="col-lg-6">
                                        <input class="form-control edit2" id="subject" name="occupation"  type="text" required="">
                                    </div>
                                </div>                                      
                                <div class="form-group edit4">
                                    <label for="ccomment" class="control-label col-lg-2 edit3">City</label>
                                    <div class="col-lg-6">
                                        <input class="form-control edit2" id="cname" name="city"  type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group edit4">
                                    <label class="control-label col-lg-2 edit3">D.O.B</label>
                                    <div class="col-lg-2">
                                        <input id="dp1" type="text" value="" size="16" class="form-control edit2" name="dob">
                                    </div>
                                </div>
                                <div class="form-group edit4">
                                    <label for="ccomment" class="control-label col-lg-2 edit3">Mobile</label>
                                    <div class="col-lg-3">
                                        <input class="form-control edit2" id="cname" name="mobile" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <a id="btnregister" class="btn btn-primary" type="submit">Save</a>
                                        <button class="btn btn-default" type="reset">Cancel</button>
                                        <div id="divError" style="display:none;" class="btn btn-danger" >

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

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
