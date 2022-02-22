<?php
session_start();
if (!array_key_exists("login_user_id", $_SESSION)) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'fragmants/head.php'; ?>
        <title>PROFILE </title>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>

                        </div>
                    </div>
                    <div class="row">
                        <!-- profile-widget -->
                        <div class="col-lg-12">
                            <div class="profile-widget profile-widget-info">
                                <div class="panel-body">

                                    <div class="col-lg-2 col-sm-2">
                                        <h4> <?php echo $_SESSION['login_user']; ?></h4> 


                                        <h6>Administrator</h6>
                                    </div>
                                    <h1>ZAHIRA PRIMARY SCHOOL</h1>
                                    <H1 style="margin-left: 200px">STUDENT'S DATABASE</H1>
                                    <p style='margin-left: 390px'>ADMINISTRATOR PROFILE </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- page start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading tab-bg-info">
                                    <ul class="nav nav-tabs">

                                        <li>
                                            <a data-toggle="tab" href="#profile">
                                                <i class="icon-user"></i>
                                                Profile
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#edit-profile">
                                                <i class="icon-envelope"></i>
                                                Edit Profile
                                            </a>
                                        </li>
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">

                                        <!-- profile -->
                                        <div id="profile" class="tab-pane active">
                                            <section class="panel">

                                                <div class="panel-body bio-graph-info">
                                                    <h1 class="size3">Bio Graph</h1>

                                                    <div class="row">
                                                        <div class="bio-row">
                                                            <p><span class="size">User Name </span>: <?php echo $_SESSION['login_user']; ?> </p>
                                                        </div>

                                                        <div class="bio-row">
                                                            <p><span class="size">Birthday</span>: <?php echo $_SESSION['dob']; ?></p>
                                                        </div>
                                                        <div class="bio-row">
                                                            <p><span class="size">City </span>: <?php echo $_SESSION['city']; ?></p>
                                                        </div>
                                                        <div class="bio-row">
                                                            <p><span class="size">Occupation </span>: <?php echo $_SESSION['occupation']; ?></p>
                                                        </div>

                                                        <div class="bio-row">
                                                            <p><span class="size">Mobile </span>: <?php echo $_SESSION['mobile']; ?></p>
                                                        </div>

                                                    </div>

                                                </div>

                                            </section>
                                            <section>
                                                <div class="row">                                              
                                                </div>
                                            </section>
                                        </div>
                                        <!-- edit-profile -->
                                        <div id="edit-profile" class="tab-pane">
                                            <section class="panel">                                          
                                                <div class="panel-body bio-graph-info">
                                                    <h1 class="size3"> Profile Info</h1>
                                                    <form class="form-horizontal" role="form" id="frmupregister"> 
                                                        <input type="hidden" name="id" value="<?php echo $_SESSION['login_user_id']; ?> " />
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label size">User Name</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="f-name" placeholder=" " value="<?php echo $_SESSION['login_user']; ?> " name="username">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label size">New Password</label>
                                                            <div class="col-lg-6">
                                                                <input type="password" class="form-control" id="f-name" name="password1">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label size">Retype Password</label>
                                                            <div class="col-lg-6">
                                                                <input type="password" class="form-control" id="f-name" name="password2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label size">City</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="c-name" placeholder=" " value="<?php echo $_SESSION['city']; ?>" name="city">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label size">Birthday</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="dp5" placeholder=" " value="<?php echo $_SESSION['dob']; ?>" name="dob">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label size">Occupation</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="occupation" placeholder=" " value="<?php echo $_SESSION['occupation']; ?>" name="occupation">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label size">Mobile</label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="mobile" placeholder=" " value="<?php echo $_SESSION['mobile']; ?>" name="mobile">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-lg-offset-2 col-lg-10">
                                                                <button type="button" class="btn btn-primary" id="btnupregister">Save</button>
                                                                <button type="button" class="btn btn-danger">Cancel</button>
                                                                <div id="divError" style="display:none;" class="btn btn-danger" >

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->

            <!--main content end-->
        </section>
        <!-- container section end -->
        <?php include 'fragmants/script.php'; ?>


    </body>


</html>
