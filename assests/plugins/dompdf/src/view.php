<?php
session_start();
if (!array_key_exists("login_user_id", $_SESSION)) {
    header("location: index.php");
}
include_once 'AppManager.php';
$pm = AppManager::getPM();
$student = $pm->fetchResult("SELECT s.id,s.indexno,s.firstname,s.`lastname`,s.`dob`,s.`gender`,s.`religion`,s.`joindate`,s.`joingrade`,s.`scholorshipmarks`,
sc.year AS `scholorship_id` FROM student s JOIN scholarship sc ON sc.id = s.`scholorship_id`;");

?>
<!DOCTYPE html>
<html lang="en">


    <head>
        <?php include 'fragmants/head.php'; ?>
        <title>VIEW </title>
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
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>INDEX NO</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>D.O.B</th>
                                <th>GENDER</th>
                                <th>RELIGION</th>
                                <th>JOINED DATE</th>
                                <th>JOINED GRADE</th>
                                <th>SCHOLARSHIP MARKS</th>
                                <th>YEAR</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($student as $s) {?>
                             <tr>
                                <td><?php echo $s['indexno']; ?></td>
                                <td><?php echo $s['firstname']; ?></td>
                                <td><?php echo $s['lastname']; ?></td>
                                <td><?php echo $s['dob']; ?></td>
                                <td><?php echo $s['gender']; ?></td>
                                <td><?php echo $s['religion']; ?></td>
                                <td><?php echo $s['joindate']; ?></td>
                                <td><?php echo $s['joingrade']; ?></td>
                                <td><?php echo $s['scholorshipmarks']; ?></td>
                                <td><?php echo $s['scholorship_id']; ?></td>
                                 
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
