<?php

//print_r($_POST);
//die();
include 'AppManager.php';
session_start();

$id = $_POST['id'];
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

$pm = AppManager::getPM();
//print_r($schlrmark);
//die();
//$pm = AppManager::getPM();


    $sql = "UPDATE student SET indexno = '$indexno',"
        . "firstname = '$firstname',"
        . "lastname = '$lastname',"
        . "dob = '$dob',"
        . "gender = '$gender',"
        . "religion = '$religion',"
        . "joindate = '$joindate',"
        . "joingrade = '$joingrade',"
        . "scholorshipmarks = '$schlrmark',"
        . "scholorship_id = '$scholarid'"
        . "WHERE id = $id";
$lastid = $pm->executeQuery($sql);


$parents = $pm->fetchResult("SELECT parents_id FROM student where id=" . $id);
$parent_id = $parents[0]['parents_id'];
//print_r($parent_id);
//die();
$achievementsa = $pm->fetchResult("SELECT achievements_id FROM student where id=" . $id);
$achievements_id = $achievementsa[0]['achievements_id'];
//print_r($achievements_id);
//die();
$sqlb = "UPDATE achievements SET name = '$achievements'"
        . "WHERE id = $achievements_id";
$pm->executeQuery($sqlb);
//print_r($sqlb);
//die();
$sqla = "UPDATE parents SET fathername = '$fathername',"
        . "fathernic = '$fathernic',"
        . "fatherdob = '$fatherdob',"
        . "fatherjob = '$fatherjob',"
        . "fdesignation = '$fdesignation',"
        . "fathereduqualification = '$fathereduqualification ',"
        . "mothername = '$mothername',"
        . "mothernic = '$mothernic',"
        . "motherdob = '$motherdob',"
        . "motherjob = '$motherjob',"
        . "mdesignation = '$mdesignation',"
        . "mothereduqualification = '$mothereduqualification',"
        . "parentsincome = '$parentsincome'"
        . "WHERE id = $parent_id";
//$pm = AppManager::getPM();
$pm->executeQuery($sqla);

header("location: search.php");
?>