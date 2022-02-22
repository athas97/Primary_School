<?php

//print_r($_POST);
//die();
include 'AppManager.php';
$pm = AppManager::getPM();

$username = $_POST['username'];
$password = $_POST['password'];
$occupation = $_POST['occupation'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];
$dob = $_POST['dob'];

$result = array();
if ($username == "") {
    $result['error'] = 1;
    $result['msg'] = "Enter your username";
} else if ($password == "") {
    $result['error'] = 1;
    $result['msg'] = "Enter your password";
} else {
    $sql = "SELECT id,username,occupation,city,dob,mobile, password FROM register WHERE username = '" . $username . "' AND password = '" . sha1($password) . "'";
    $row = $pm->fetchResult($sql);
    if (empty($row)) {
        $result['error'] = 1;
        $result['msg'] = "Invalid username or password";
    } else {
        $result['error'] = 0;
        $result['msg'] = "";
        session_start();
        $_SESSION['login_user'] = $row[0]['username'];
        $_SESSION['login_user_id'] = $row[0]['id'];
        $_SESSION['occupation'] = $row[0]['occupation'];
        $_SESSION['city'] = $row[0]['city'];
        $_SESSION['dob'] = $row[0]['dob'];
        $_SESSION['mobile'] = $row[0]['mobile'];
        $_SESSION['password'] = $row[0]['password'];
    }
}
echo json_encode($result);
die();
?>