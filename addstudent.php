<?php

//print_r($_POST);
//die();
include 'AppManager.php';
$pm = AppManager::getPM();
session_start();

$indexno = $_POST['indexno'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$religion = $_POST['religion'];
$joindate = $_POST['joindate'];
$joingrade = $_POST['joingrade'];
$schlrmark = $_POST['schlrmark'];
$scholarid = $_POST['scholarid'];
$fathername = $_POST['fathername'];
$fathernic = $_POST['fathernic'];
$fatherdob = $_POST['fatherdob'];
$fatherjob = $_POST['fatherjob'];
$fdesignation = $_POST['fdesignation'];
$fathereduqualification = $_POST['fathereduqualification'];
$mothername = $_POST['mothername'];
$mothernic = $_POST['mothernic'];
$motherdob = $_POST['motherdob'];
$motherjob = $_POST['motherjob'];
$mdesignation = $_POST['mdesignation'];
$mothereduqualification = $_POST['mothereduqualification'];
$parentsincome = $_POST['parentsincome'];
$achievements = $_POST['achievements'];
$entered_by_id = $_SESSION['login_user_id'];
$entered_date = date('Y/m/d', time());

$sqlp = "insert into parents(fathername,`fathernic`,`fatherdob`,`fatherjob`,`fdesignation`,`fathereduqualification`,`mothername`,mothernic,motherdob,motherjob,mdesignation,mothereduqualification,parentsincome)
value('$fathername','$fathernic','$fatherdob','$fatherjob','$fdesignation','$fathereduqualification','$mothername','$mothernic','$motherdob','$motherjob','$mdesignation','$mothereduqualification','$parentsincome');";
$lastid = $pm->executeQuery($sqlp);
//$sqla = "insert into achievements(name)
// value('$achievements');";
//$lastid2 = $pm->executeQuery($sqla);
$sqla = "insert into achievements(name)
value('$achievements');";
$lastid2 = $pm->executeQuery($sqla);

if ($schlrmark == '') {
    $sqls = "INSERT INTO student(indexno,`firstname`,`lastname`,`dob`,`gender`,`religion`,`joindate`,`joingrade`,`parents_id`,achievements_id,entered_by_id,entered_date) 
VALUE('$indexno','$firstname','$lastname','$dob','$gender','$religion','$joindate','$joingrade','$lastid','$lastid2','$entered_by_id','$entered_date');";
    $lastId = $pm->executeQuery($sqls);
} else {
    $sqls = "INSERT INTO student(indexno,`firstname`,`lastname`,`dob`,`gender`,`religion`,`joindate`,`joingrade`,`scholorshipmarks`,`scholorship_id`,`parents_id`,achievements_id,entered_by_id,entered_date) 
VALUE('$indexno','$firstname','$lastname','$dob','$gender','$religion','$joindate','$joingrade','$schlrmark','$scholarid','$lastid','$lastid2','$entered_by_id','$entered_date');";
    $lastId = $pm->executeQuery($sqls);
}
//$sqls="insert into parents(studentid)value('$lastId');";
//lastid = $pm->executeQuery($sqls);


header("location: student.php");
?>