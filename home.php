<?php
 session_start();
  if (!array_key_exists("login_user_id", $_SESSION)) {
  header("location: index.php");
  } 
  include_once 'AppManager.php';
$pm = AppManager::getPM();
$student = $pm->fetchResult("SELECT s.id,s.indexno,s.firstname,s.`lastname`,s.`dob`,s.`gender`,s.`religion`,s.entered_date,u.username AS entered_by_id
FROM student s JOIN register u ON u.id = s.entered_by_id ;");

?>
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from www.bylancer.com/product/byadmin/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Jan 2017 19:06:42 GMT -->
    <head>
        <?php include 'fragmants/head.php'; ?>
       
        <title>HOME </title>
    </head>

    <body >
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
                                <th>ENTERED BY</th>
                                <th>ENTERED DATE</th>
                              
                               
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
                                <td><?php echo $s['entered_by_id']; ?></td>
                                <td><?php echo $s['entered_date']; ?></td>
                              
                                 
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- page end-->
                </section>
            </section>
        
        <!-- container section end -->
        <?php include 'fragmants/script.php'; ?>
<script src="assests/plugins/spider_buttons/js/modernizr.custom.js"></script>

    </body>

   
</html>
