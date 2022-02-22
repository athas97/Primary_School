<?php
session_start();
  if (!array_key_exists("login_user_id", $_SESSION)) {
  header("location: index.php");
  } 
include_once 'AppManager.php';
$pm = AppManager::getPM();
$scholarship = $pm->fetchResult("SELECT id, year FROM scholarship");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'fragmants/head.php'; ?>
        <title>STUDENT </title>
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
                    <div class="col-lg-12">
                        <h3 class="page-header size3"><i class="icon_pencil"></i>STUDENT DETAILS</h3>
                    </div>
                    <!-- page start-->
                    <form class="form-validate form-horizontal" id="feedback_form" method="post" action="addstudent.php" >
                        <div class="form-group edit4">
                            <label for="cname" class="control-label col-lg-2 edit3">Index No</label>
                            <div class="col-lg-3">
                                <input class="form-control edit2 " id="cname" name="indexno"  type="text" required="">
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="cname" class="control-label col-lg-2 edit3">First Name</label>
                            <div class="col-lg-6">
                                <input class="form-control edit2 " id="cname" name="firstname"  type="text" required="">
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="cname" class="control-label col-lg-2 edit3">Last Name</label>
                            <div class="col-lg-6">
                                <input class="form-control edit2 " id="cname" name="lastname"  type="text" required="">
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label class="control-label col-lg-2 edit3">D.O.B</label>
                            <div class="col-lg-2">
                                <input id="dp1" type="text" value="" size="16" class="form-control edit2" name="dob" required="">
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label class="col-sm-2 control-label edit3">Gender</label>
                            <div class="col-lg-2">
                                <select class="form-control edit2" name="gender" required="">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Religion  <span class="required"></span></label>
                            <div class="col-lg-2">
                                <select class="form-control edit2" name="religion" required="">
                                    <option>Muslim</option>
                                    <option>Hindu</option>
                                    <option>Christian</option>
                                    <option>Buddhist</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label class="control-label col-lg-2 edit3">Joined Date</label>
                            <div class="col-lg-2">
                                <input id="dp11" type="text" value="" size="16" class="form-control edit2" name="joindate" required="">
                            </div>
                        </div>
                        <div class="form-group edit4 ">
                            <label for="fullname" class="control-label col-lg-2 edit3">Join Grade  <span class="required"></span></label>
                            <div class="col-lg-4">
                                <input class=" form-control edit2" id="fullname" name="joingrade" type="text" required=""/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Scholarship Marks  <span class="required"></span></label>
                            <div class="col-lg-4">
                                <input class=" form-control edit2" id="fullname" name="schlrmark" type="text" />
                            </div>
                            <div class="form-group pull-left edit4">
                                <label for="fullname" class="control-label col-lg-3 edit3"> Year  <span class="required"></span></label>
                                <div class="col-lg-9">
                                    <select class="form-control edit2" name="scholarid">
                                        <?php
                                        foreach ($scholarship as $s) {
                                            ?>
                                            <option value="<?php echo $s['id']; ?>"><?php echo $s['year']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h3 class="page-header size3"><i class="icon_pencil"></i>PARENTS DETAILS</h3>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father Name <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="fathername" type="text" required=""/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father N.I.C <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="fathernic" type="text" required=""/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father D.O.B <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="dp111" name="fatherdob" type="text" required=""/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father Job <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="fatherjob" type="text"/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father Designation <span class="required"></span></label>
                            <div class="col-lg-6">
                                <select class="form-control edit2" name="fdesignation" >
                                    <option>Private sector</option>
                                    <option>Government sector</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father Educational Qualification <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="fathereduqualification" type="text"/>
                            </div>
                        </div>
                        <hr class="edit6"></hr>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Mother Name <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="mothername" type="text" required=""/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Mother N.I.C <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="mothernic" type="text" required=""/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Mother D.O.B <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="dp1v" name="motherdob" type="text" required=""/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Mother Job <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="motherjob" type="text" />
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Mother Designation <span class="required"></span></label>
                            <div class="col-lg-6">
                                <select class="form-control edit2" name="mdesignation">
                                    <option>Private sector</option>
                                    <option>Government sector</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 "style="font-size: 17px;">Mother Educational Qualification <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="mothereduqualification" type="text" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h3 class="page-header size3"><i class="icon_pencil"></i>PARENTS INCOME</h3>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Income <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="parentsincome" type="text" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h3 class="page-header size3"><i class="icon_pencil"></i>ACHIEVEMENTS</h3>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Achievements <span class="required"></span></label>
                            <div class="col-lg-6">
                                <textarea class="  edid2" id="fullname" name="achievements" type="longtext" /></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-default" type="reset">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
        </section>
        <!-- container section end -->
        <?php include 'fragmants/script.php'; ?>
    </body>
</html>
