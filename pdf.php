<html>
    <head>
        <link href="pdfassests/pdfcss.css" rel="stylesheet">
    </head>
    <body>
        <img src="pdfassests/2.png" style="margin-left: 50px;">
        <div style="border:1px solid black;"><div align="center"><i>Full Details Of A Student</i></div></div>
        <br>
        <?php foreach ($student as $s) { ?>
            <fieldset>
                <legend>1.STUDENT DETAILS</legend>
                <div class="pc1">Index No:&nbsp;&nbsp;&nbsp;<b><?php echo $s['indexno']; ?> </b></div>
                <div class="pc1">First Name:&nbsp;<b><?php echo $s['firstname']; ?></b> </div>
                <div class="pc1">Last Name:&nbsp;<b><?php echo $s['lastname']; ?></b></div>
                <div class="pc1">Full Name:&nbsp;<b><?php echo $s['firstname']; ?>&nbsp;<?php echo $s['lastname']; ?></b></div>
                <div class="pc1">D.O.B:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo$s['dob'] ?></b></div>
                <div class="pc1">Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $s['gender']; ?></b></div>
                <div class="pc1">Religion:&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $s['religion']; ?></b></div>
                <div class="pc1">Join Date:&nbsp;<b> <?php echo $s['joindate']; ?></b></div>
                <div class="pc1">Join Grade:&nbsp;<b><?php echo $s['joingrade']; ?></b></div>
                <div class="pc1">Scholarship Marks:&nbsp;<b><?php echo $s['scholorshipmarks']; ?></b></div>
                <?php foreach ($scholarship as $sc) {
                    if ($sc['id'] == $s['scholorship_id']) {
                        ?>
                        <div class="pc1">Year:&nbsp;<b><?php echo $sc['year']; ?></b>&nbsp; cutoff:[<b><?php echo $sc['cutoff']; ?></b>] </div>
                <?php } else {
                    
                }
            } ?>
            </fieldset>
<?php } ?>
        <?php foreach ($parent as $p){?>
        <fieldset>
            <legend>2.PARENTS DETAILS</legend>
            <div class="pc1">Father's Name:&nbsp;<b><?php echo $p['fathername']; ?></b></div>
            <div class="pc1">N.I.C:&nbsp;&nbsp;<b><?php echo $p['fathernic']; ?></b></div>
            <div class="pc1">D.O.B:&nbsp;<b><?php echo $p['fatherdob']; ?></b></div>
            <div class="pc1">Job:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $p['fatherjob']; ?></b></div>
            <div class="pc1">Designation:&nbsp;<b><?php echo $p['fdesignation']; ?></b></div>
            <div class="pc1">Educational Qualification:&nbsp;<b><?php echo $p['fathereduqualification']; ?></b></div>
            <hr>
            <div class="pc1">Mother's Name:&nbsp;<b><?php echo $p['mothername']; ?></b></div>
            <div class="pc1">N.I.C:&nbsp;&nbsp;<b><?php echo $p['mothernic']; ?></b></div>
            <div class="pc1">D.O.B:&nbsp;<b><?php echo $p['motherdob']; ?></b></div>
            <div class="pc1">Job:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $p['motherjob']; ?></b></div>
            <div class="pc1">Designation:&nbsp;<b><?php echo $p['mdesignation']; ?></b></div>
            <div class="pc1">Educational Qualification:&nbsp;<b><?php echo $p['mothereduqualification']; ?></b></div>
            <hr>
            <div class="pc1">Salary:&nbsp;<b><?php echo $p['parentsincome']; ?></b></div>
        </fieldset>
        <?php }?>
        <?php foreach ($achive_res as $a){?>
        <fieldset>
            <legend>3.ACHIEVEMENTS</legend>
            <div>Achievements:&nbsp;<b><?php echo $a['name']; ?></b></div>
        </fieldset>
        <?php } ?>
        <img width="100%" style="margin-top: 50px" src="pdfassests/pdffooter.png" >
    </body>
</html>