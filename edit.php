<?php
 session_start();
  if (!array_key_exists("login_user_id", $_SESSION)) {
  header("location: index.php");
  } 

include_once 'AppManager.php';
$pm = AppManager::getPM();
$scholarship = $pm->fetchResult("SELECT id, year FROM scholarship");
$student = $pm->fetchResult("SELECT * FROM student where id=" . $_GET['id']);
$parents = $pm->fetchResult("SELECT parents_id FROM student where id=" . $_GET['id']);
$parent_id = $parents[0]['parents_id'];
$parent = $pm->fetchResult("SELECT * FROM parents where id=" . $parent_id);
$achivements = $pm->fetchResult("SELECT achievements_id FROM student where id=" . $_GET['id']);
$achive_id = $achivements[0]['achievements_id'];
$achive_res = $pm->fetchResult("SELECT name FROM achievements where id=" . $achive_id);
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
                    <form class="form-validate form-horizontal" id="feedback_form" method="post" action="updateform.php" >
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                        <div class="form-group edit4">
                            <label for="cname" class="control-label col-lg-2 edit3">Index No</label>
                            <div class="col-lg-3">
                                <input class="form-control edit2 " id="cname" name="indexno"  type="text" required="" value="<?php echo $student[0]['indexno']; ?>">
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="cname" class="control-label col-lg-2 edit3">First Name</label>
                            <div class="col-lg-6">
                                <input class="form-control edit2 " id="cname" name="firstname"  type="text" value="<?php echo $student[0]['firstname']; ?>">
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="cname" class="control-label col-lg-2 edit3">Last Name</label>
                            <div class="col-lg-6">
                                <input class="form-control edit2 " id="cname" name="lastname"  type="text" value="<?php echo $student[0]['lastname']; ?>" >
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label class="control-label col-lg-2 edit3">D.O.B</label>
                            <div class="col-lg-2">
                                <input id="dp1" type="text"  size="16" class="form-control edit2" name="dob" value="<?php echo $student[0]['dob']; ?>">
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label class="col-sm-2 control-label edit3">Gender</label>
                            <div class="col-lg-2">
                                <select class="form-control edit2" name="gender">
                                    <option value="Male" <?php
                                    if ($student[0]['gender'] == 'Male') {
                                        echo 'selected';
                                    }
                                    ?>>Male</option>
                                    <option value="Female"<?php
                                    if ($student[0]['gender'] == 'Female') {
                                        echo 'selected';
                                    }
                                    ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Religion  <span class="required"></span></label>
                            <div class="col-lg-2">
                                <select class="form-control edit2" name="religion">
                                    <option value="Muslim" <?php
                                    if ($student[0]['religion'] == 'Muslim') {
                                        echo 'selected';
                                    }
                                    ?>>Muslim</option>
                                    <option value="Hindu" <?php
                                    if ($student[0]['religion'] == 'Hindu') {
                                        echo 'selected';
                                    }
                                    ?>>Hindu</option>
                                    <option value="Christian" <?php
                                    if ($student[0]['religion'] == 'Christian') {
                                        echo 'selected';
                                    }
                                    ?>>Christian</option>
                                    <option value="Buddhist" <?php
                                    if ($student[0]['religion'] == 'Buddhist') {
                                        echo 'selected';
                                    }
                                    ?>>Buddhist</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label class="control-label col-lg-2 edit3">Joined Date</label>
                            <div class="col-lg-2">
                                <input id="dp11" type="text"  size="16" class="form-control edit2" name="joindate" value="<?php echo $student[0]['joindate']; ?>">
                            </div>
                        </div>
                        <div class="form-group edit4 ">
                            <label for="fullname" class="control-label col-lg-2 edit3">Join Grade  <span class="required"></span></label>
                            <div class="col-lg-3">
                                <input class=" form-control edit2" id="fullname" name="joingrade" type="text" value="<?php echo $student[0]['joingrade']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Scholarship Marks  <span class="required"></span></label>
                            <div class="col-lg-3">
                                <input class=" form-control edit2" id="fullname" name="schlrmark" type="text" value="<?php echo $student[0]['scholorshipmarks']; ?>"/>
                            </div>
                            <div class="form-group pull-left edit4">
                                <label for="fullname" class="control-label col-lg-3 edit3"> Year  <span class="required"></span></label>
                                <div class="col-lg-9">
                                    <select class="form-control edit2" name="scholarid">
                                        <?php
                                        foreach ($scholarship as $s) {
                                            if ($s['id'] == $student[0]['scholorship_id']) {
                                                $selectedHTML = 'selected';
                                            } else {
                                                $selectedHTML = "";
                                            }
                                            ?>
                                            <option value="<?php echo $s['id']; ?>" <?php echo $selectedHTML; ?> ><?php echo $s['year']; ?></option>
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
                                <input class=" form-control edit2" id="fullname" name="fathername" type="text" value="<?php echo $parent[0]['fathername']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father Nic <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="fathernic" type="text" value="<?php echo $parent[0]['fathernic']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father Dob <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="dp111" name="fatherdob" type="text" value="<?php echo $parent[0]['fatherdob']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father Job <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="fatherjob" type="text" value="<?php echo $parent[0]['fatherjob']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father Designation <span class="required"></span></label>
                            <div class="col-lg-6">
                                <select class="form-control edit2" name="fdesignation">
                                    <option value="Private" <?php
                                    if ($parent[0]['fdesignation'] == 'Parivate') {
                                        echo 'selected';
                                    }
                                    ?>>Private sector</option>
                                    <option value="Government" <?php
                                    if ($parent[0]['fdesignation'] == 'Government') {
                                        echo 'selected';
                                    }
                                    ?>>Government sector</option>


                                </select>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Father Educational Qualification <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="fathereduqualification" type="text" value="<?php echo $parent[0]['fathereduqualification']; ?>"/>
                            </div>
                        </div>
                        <hr class="edit6"></hr>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Mother Name <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="mothername" type="text" value="<?php echo $parent[0]['mothername']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Mother Nic <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="mothernic" type="text" value="<?php echo $parent[0]['mothernic']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Mother Dob <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="dp1v" name="motherdob" type="text" value="<?php echo $parent[0]['motherdob']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Mother Job <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="motherjob" type="text" value="<?php echo $parent[0]['motherjob']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Mother Designation <span class="required"></span></label>
                            <div class="col-lg-6">
                                <select class="form-control edit2" name="mdesignation">
                                   <option value="Private" <?php
                                    if ($parent[0]['mdesignation'] == 'Parivate') {
                                        echo 'selected';
                                    }
                                    ?>>Private sector</option>
                                    <option value="Government" <?php
                                    if ($parent[0]['mdesignation'] == 'Government') {
                                        echo 'selected';
                                    }
                                    ?>>Government sector</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 "style="font-size: 17px;">Mother Educational Qualification <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="mothereduqualification" type="text" value="<?php echo $parent[0]['mothereduqualification']; ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h3 class="page-header size3"><i class="icon_pencil"></i>PARENTS INCOME</h3>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">income <span class="required"></span></label>
                            <div class="col-lg-6">
                                <input class=" form-control edit2" id="fullname" name="parentsincome" type="text" value="<?php echo $parent[0]['parentsincome']; ?>"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h3 class="page-header size3"><i class="icon_pencil"></i>ACHIEVEMENTS</h3>
                        </div>
                        <div class="form-group edit4">
                            <label for="fullname" class="control-label col-lg-2 edit3">Achievements <span class="required"></span></label>
                            <div class="col-lg-6">
                                <textarea class="  edid2" id="fullname" name="achievements" type="longtext" /><?php echo $achive_res[0]['name']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Update</button>
                                <button class="btn btn-default" href="search.php">Cancel</button>
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
