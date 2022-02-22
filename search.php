<?php
 session_start();
  if (!array_key_exists("login_user_id", $_SESSION)) {
  header("location: index.php");
  } 
include './AppManager.php';
$pm = AppManager::getPM();
if (isset($_GET['search'])) {
    $search_string = $_GET['search'];
    $sql = "SELECT * FROM student WHERE indexno LIKE '%$search_string%'OR firstname LIKE '%$search_string%'OR lastname LIKE '%$search_string%';";
    $student = $pm->fetchResult($sql);
//    $sqlp = "SELECT * FROM parents WHERE fathername LIKE '%$search_string%'OR mothername LIKE '%$search_string%';";
//    $parents = $pm->fetchResult($sqlp);
    $scholarship = $pm->fetchResult("SELECT id, year,cutoff FROM scholarship");
   $parents = $pm->fetchResult("SELECT * FROM parents");
    $achievements = $pm->fetchResult("SELECT * FROM achievements");
} else {
    $search_string = "";
}
?>
<!DOCTYPE html>
<html lang="en">


    <head>
        <?php include 'fragmants/head.php'; ?>
        <title>SEARCH </title>
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
                        <h3 class="page-header"><i class="icon_search"></i> SEARCH</h3>
                    </div>
                    <form method="get" class="form-horizontal" action="">
                        <input name="search" type="search" size="80" maxlength="40" class="edit7" value='<?php echo"$search_string"; ?>' placeholder="Input Index..">
                        <button type="submit" class="btn btn-primary edit8" >search</button>
                    </form>
                    <?php
                    if (!empty($search_string) && !empty($student)) {
                        ?>

                        <table class="table table-striped table-advance table-hover" id="tb">
                            <tbody>
                                <tr>
                                    <th><i class="icon_profile"></i> Index No</th>
                                    <th><i class="icon_calendar"></i> Full Name</th>
                                    <th>Father Name</th>
                                    <th>Mother name </th>
                                    <th><i class="icon_calendar"></i> View</th>
                                    <th><i class="icon_cogs"></i> Action</th>
                                </tr>

                                <?php
                                if (!empty($student)) {
                                    foreach ($student as $s) {
                                        ?>
                                        <tr>
                                            <td><?php echo $s['indexno']; ?></td>
                                            <td><?php echo $s['firstname']; ?> <?php echo $s['lastname']; ?></td>
                                             <?php
                                                    foreach ($parents as $p) {
                                                        if ($p['id'] == $s['parents_id']) {
                                                            ?> 
                                            <td><?php echo $p['fathername']; ?></td>
                                            <td><?php echo $p['mothername']; ?></td>
                                                    <?php }else{}} ?>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $s['indexno']; ?>">View Full Details</button> 
                                                <a type="button" class="btn btn-success" href="pdftest.php?id=<?php echo $s['id']; ?>">Print</a>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-primary" href="edit.php?id=<?php echo $s['id']; ?>">Edit</a>
                                                    <a class="btn btn-danger delete"  searcid='<?php echo $s['id']; ?>' searchstring='<?php echo $search_string ?>' >Del</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Large modal -->

                                    <div class="modal fade bs-example-modal-lg<?php echo $s['indexno']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg edit11" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">FORM DETAILS</h4>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <h3 class="page-header size3">STUDENT DETAILS</h3>
                                                    </div>
                                                    <div class="edit12">
                                                        INDEX NO&nbsp&nbsp&nbsp:   <div class="edit14"> <?php echo $s['indexno']; ?>   </div>        
                                                    </div>
                                                    <div class="edit12">
                                                        FIRST NAME:          <?php if (!empty($s['firstname'])) { ?>   <div class="edit14"> <?php echo $s['firstname']; ?> </div> <?php
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="edit13">
                                                        LAST NAME:         <?php if (!empty($s['lastname'])) { ?>    <div class="edit16"> <?php echo $s['lastname']; ?></div> <?php
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                    </div>

                                                    <div class="edit12">
                                                        FULL NAME:         <?php if (!empty($s['lastname'] . $s['firstname'])) { ?>   <div class="edit14"><?php echo $s['firstname']; ?>&nbsp<?php echo $s['lastname']; ?></div> <?php
                                                        } else {
                                                            
                                                        }
                                                        ?>  
                                                    </div>

                                                    <div class="edit12">
                                                        D.O.B&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:            <?php if (!empty($s['dob'])) { ?>   <div class="edit14"> <?php echo $s['dob']; ?></div>
                                                            <?php
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="edit13">
                                                        GENDER&nbsp&nbsp&nbsp&nbsp&nbsp:                 <div class="edit16"> <?php echo $s['gender']; ?></div>
                                                    </div>
                                                    <div class="edit12">
                                                        RELIGION&nbsp&nbsp&nbsp:               <div class="edit14"> <?php echo $s['religion']; ?></div>
                                                    </div>
                                                    <div class="edit12">
                                                        JOIN GRADE:         <?php if (!empty($s['joingrade'])) { ?>      <div class="edit14"> <?php echo $s['joingrade']; ?></div>
                                                            <?php
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="edit13">
                                                        JOIN DATE&nbsp&nbsp:      <?php if (!empty($s['joindate'])) { ?>       <div class="edit16"> <?php echo $s['joindate']; ?></div>
                                                            <?php
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="edit12">
                                                        SCHOLARSHIP MARKS:     <?php if (!empty($s['scholorshipmarks'])) { ?>          <div class="edit15"> <?php echo $s['scholorshipmarks']; ?></div>
                                                            <?php
                                                        } else {
                                                            
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="edit13">
                                                        YEAR&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:            <div class="edit16">      <?php
                                                            foreach ($scholarship as $sc) {
                                                                if ($sc['id'] == $s['scholorship_id']) {
                                                                    ?> <?php if (!empty($s['scholorshipmarks'])) { ?> <?php echo $sc['year']; ?>&nbsp cutoff:[ <?php echo $sc['cutoff']; ?>] <?php
                                                                    } else {
                                                                        
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                            };
                                                            ?></div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <h3 class="page-header size3">PARENTS DETAILS</h3>
                                                    </div>
                                                    <?php
                                                    foreach ($parents as $p) {
                                                        if ($p['id'] == $s['parents_id']) {
                                                            ?>  <div class = "edit12">
                                                                FATHER'S NAME:          <?php if (!empty($p['fathername'])) { ?>      <div class="edit17"> <?php echo $p['fathername']; ?> </div>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class = "edit12">
                                                                FATHER'S NIC&nbsp&nbsp&nbsp&nbsp:        <?php if (!empty($p['fathernic'])) { ?>     <div class="edit17"> <?php echo $p['fathernic']; ?> </div>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class = "edit13">
                                                                FATHER'S D.O.B&nbsp&nbsp:         <?php if (!empty($p['fatherdob'])) { ?>    <div class="edit17"> <?php echo $p['fatherdob']; ?> </div>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class = "edit12">
                                                                FATHER'S JOB&nbsp&nbsp&nbsp:        <?php if (!empty($p['fatherjob'])) { ?>     <div class="edit17"> <?php echo $p['fatherjob']; ?> </div>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class = "edit13">
                                                                FATHER'S DESIGNATION:             <div class="edit19"> <?php echo $p['fdesignation']; ?> </div>
                                                            </div>
                                                            <div class = "edit12">
                                                                FATHER'S EDUCATION:         <?php if (!empty($p['fathereduqualification'])) { ?>    <div class="edit18"> <?php echo $p['fathereduqualification']; ?> </div>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class = "edit12">
                                                                MOTHERS'S NAME:          <?php if (!empty($p['mothername'])) { ?>    <div class="edit20"> <?php echo $p['mothername']; ?> </div>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class = "edit12">
                                                                MOTHER'S NIC&nbsp&nbsp&nbsp:            <?php if (!empty($p['mothernic'])) { ?>  <div class="edit17"> <?php echo $p['mothernic']; ?> </div>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class = "edit13">
                                                                MOTHER'S D.O.B:        <?php if (!empty($p['motherdob'])) { ?>      <div class="edit17"> <?php echo $p['motherdob']; ?> </div> <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class = "edit12">
                                                                MOTHER'S JOB&nbsp&nbsp:           <?php if (!empty($p['motherjob'])) { ?>   <div class="edit17"> <?php echo $p['motherjob']; ?> </div>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class = "edit13">
                                                                MOTHER'S DESIGNATION:             <div class="edit22"> <?php echo $p['mdesignation']; ?> </div>
                                                            </div>
                                                            <div class = "edit12">
                                                                MOTHER'S EDUCATION:         <?php if (!empty($p['mothereduqualification'])) { ?>     <div class="edit21"> <?php echo $p['mothereduqualification']; ?> </div>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <h3 class="page-header size3">PARENTS INCOME</h3>
                                                            </div>
                                                            <div class = "edit12">
                                                                INCOME:           <?php if (!empty($p['parentsincome'])) { ?>   <div class="edit23"> <?php echo $p['parentsincome']; ?> </div>
                                                                    <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            
                                                        }
                                                    };
                                                    ?>
                                                    <div class="col-lg-12">
                                                        <h3 class="page-header size3">ACHIEVEMENTS</h3>
                                                    </div>
                                                    <?php
                                                    foreach ($achievements as $a) {
                                                        if ($a['id'] == $s['achievements_id']) {
                                                            ?>
                                                            <div class = "edit24">
                                                                ACHIEVEMENTS:       <?php if (!empty($a['name'])) { ?>      <div class="edit25"> <?php echo $a['name']; ?> </div>
                                                              <?php
                                                                } else {
                                                                    
                                                                }
                                                                ?>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            
                                                        }
                                                    };
                                                    ?>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                }
                            } else {
                                
                            }
                            ?>

                            </tbody>
                        </table>
                        <?php
                    } elseif (!empty($_GET['search'])) {
                        echo' <div class = "edit9">No Record Like:</div>';
                        echo'<div class = "edit10">' . $_GET['search'] . '</div>';
                    }
                    ?>





                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
        </section>
        <!-- container section end -->
        <?php include 'fragmants/script.php'; ?>


    </body>


</html>
