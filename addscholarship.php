<?php

include 'AppManager.php';

session_start();

$year = $_POST['year'];
$cutoff = $_POST['cutoff'];

$sql = "INSERT INTO scholarship(YEAR,cutoff) VALUE('$year','$cutoff')";
$pm = AppManager::getPM();
$lastId = $pm->executeQuery($sql);

header("location: scholarship.php");
?>