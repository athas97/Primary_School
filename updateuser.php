<?php

//print_r($_POST);
//die();
include 'AppManager.php';
session_start();

$id = $_POST['id'];
$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$occupation = $_POST['occupation'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];
$dob = $_POST['dob'];
$pm = AppManager::getPM();
$result = array();
if ($password1 == "" || $password2 == "") {
    $result['error'] = 1;
    $result['msg'] = "Enter your password";
} else if ($password1 != $password2) {
    $result['error'] = 1;
    $result['msg'] = "Passwords do not match";
} else {
    $encryptPassword = sha1($password1);
    $sql = "UPDATE register SET username = '$username',"
            . "password = '$encryptPassword',"
            . "occupation = '$occupation',"
            . "city = '$city',"
            . "mobile = '$mobile',"
            . "dob = '$dob'"
            . "WHERE id = $id";
    $lastid = $pm->executeQuery($sql);
}

echo json_encode($result);
die();
?>