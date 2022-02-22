<?php

//print_r($_POST);
//die();
include './AppManager.php';
$pm = AppManager::getPM();

$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$occupation = $_POST['occupation'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];
$dob = $_POST['dob'];
$result = array();
if ($username == "") {
    $result['error'] = 1;
    $result['msg'] = "Enter your name";
} else if ($password1 == "" || $password2 == "") {
    $result['error'] = 1;
    $result['msg'] = "Enter your password";
} else if ($password1 != $password2) {
    $result['error'] = 1;
    $result['msg'] = "Passwords do not match";
} else  {
    $sql = "SELECT COUNT(1) as c FROM register WHERE username = '$username'";
    $count = $pm->getCount($sql);
    if ($count > 0) {
        $result['error'] = 1;
        $result['msg'] = "Username already exist";
    } else  {
        $encryptPassword = sha1($password1);
        $sql = "insert into register(username, password,occupation,city,mobile,dob) values('$username','$encryptPassword','$occupation','$city','$mobile','$dob')";
        //$res = mysqli_query($conn, $sql);
        $lastInsertId = $pm->executeQuery($sql);
        if ($lastInsertId > 0) {
            $result['error'] = 0;
            $result['msg'] = "Successfully registered !!!";
        } else {
            $result['error'] = 1;
            $result['msg'] = "DB Error";
            
        }
    }
}

echo json_encode($result);
die();
?>
