<?php
print_r($_POST);
echo $_POST['id'];
$search_string = $_POST['search'];
include_once 'AppManager.php';
$pm = AppManager::getPM();
$id = $_POST['id'];
$parents = $pm->fetchResult("SELECT parents_id FROM student where id=" . $_POST['id']);
$parent_id = $parents[0]['parents_id'];
$sqla = "DELETE FROM parents WHERE id=" . $parent_id;
$pm->executeQuery($sqla);
//$parent = $pm->fetchResult("DELETE * FROM parents where id=" . $parent_id);
$sql = "DELETE FROM `student` WHERE id=" . $id;
$pm->executeQuery($sql);

//header("location:search.php?search=" . $search_string);
?>